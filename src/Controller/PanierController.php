<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Entity\Tva;
use App\Repository\ProduitsRepository;
use App\Service\PdfService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController{

    #[Route("panier/index", name:"panier_index")]
    public function index(Request $request, ProduitsRepository $repository){

        $session = $request->getSession();
        //$session->remove("panier");
        $panier = $session->get("panier",[]);
   
        //recupere les produits 
        $datapanier = [];
        $totalHT = 0;
       // dump($panier);
        //cherche produit par raaport produit id dans le panier
        foreach ($panier as $id => $quantite) {
            $produit = $repository->find($id);
            //dump($produit);die;
            $datapanier [] = [
                "produit"=>$produit,
                "quantite"=>$quantite
            ];
            $totalHT += $produit->getPrix()*$quantite;
                 
        }
    
        return $this->render("panier/index.html.twig", ["datapanier"=>$datapanier,"total"=>$totalHT]);
    }
    //ajouter panier par lien, formulaire de presentation, formulaire de panier
    #[Route('/panier/{id}',requirements:['id'=>'\d+'], name:'ajout_panier')]
    public function ajoutpanier($id,Request $request){      
    //on recupere le panier actual
     $session = $request->getSession();
     $panier = $session->get("panier",[]);
     //$id = $produit->getId();
    
     if(array_key_exists($id,$panier)){
        if($request->query->get('qte')!=null){
        $panier[$id]=$request->query->get('qte');
        //add flash message modification
        $this->addFlash("success", "modification à été fait avec success");
        }
     }else{
        //ajouter
            if($request->query->get ('qte') !=null){
                $panier[$id]=$request->query->get ('qte');
            }
            else{
                $panier[$id]=1;
            }
      //add flash bag ajouter
      $this->addFlash("add","ajouter avec success");
    }
      $session->set("panier",$panier);

        return $this->redirectToRoute("panier_index");
    }

    //panier produit supreme
    #[Route('panier/supreme/{id}',name:'produit_panier_supreme')]
    public function sumpreme($id,Request $request){
        $session = $request->getSession();
        $panier = $session->get("panier");
        unset($panier[$id]);
        $session->set("panier",$panier);
        //add flash supreme
        $this->addFlash("delete","supreme avec sucess");
        return $this->redirectToRoute("panier_index");
    }

    public function itemscount(Request $request,ProduitsRepository $repository,ManagerRegistry $doctrine){
        $totalTTC = 0;
        $session = $request->getSession();
        $panier = $session->get("panier",[]);
        if(!empty($panier)){
        $items = count($panier);

        foreach($panier as $id=>$quantite){
            $produit = $repository->find($id);
            if($produit){
            $tva =$doctrine->getRepository(Tva::class)->find($produit->getTva()) ;
        
            $totalTTC += ($produit->getPrix()*$quantite)*$tva->getMultiplicate();
        }
        }
        }else{$items=0;}

        return $this->render("panier/paniercount.html.twig",['items'=>$items,'totalTTC'=>$totalTTC]);
        
    }

    //livraison
    #[Route('/livraison', name:'livraison_produit')]
    public function livraison(){
        return $this->render('panier/livraison.html.twig');
    }
    //valid for pdf
    #[Route('valider/command',name:'valider_command')]
    public function validcommand(Request $request,ProduitsRepository $repository){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $value = $_POST;
        //on recupere le panier actual
        $session = $request->getSession();
        $panier = $session->get("panier",[]);
        //recupere les produits 
        $datapanier = [];
        $totalHT = 0;
        //cherche produit par raaport produit id dans le panier
        foreach ($panier as $id => $quantite) {
            $produit = $repository->find($id);
            //dump($produit);die;
            $datapanier [] = [
                "produit"=>$produit,
                "quantite"=>$quantite
            ];
            $totalHT += $produit->getPrix()*$quantite;      
            }
        }
      return $this->render('panier/pdf.html.twig',['post'=>$value,"datapanier"=>$datapanier,"total"=>$totalHT]);
 
    }
    // #[Route('generate/command',name:'generate_pdf')]
    // public function generatePdf(Request $request,PdfService $pdf,ProduitsRepository $repository){
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         $value = $_POST;
    //     //recupere les produits 
    //     $datapanier = [];
    //     $totalHT = 0;
    //    // dump($panier);
    //     //cherche produit par raaport produit id dans le panier
    //     $session = $request->getSession();
    //     $panier = $session->get("panier",[]);
    //     foreach ($panier as $id => $quantite) {
    //         $produit = $repository->find($id);
    //         //dump($produit);die;
    //         $datapanier [] = [
    //             "produit"=>$produit,
    //             "quantite"=>$quantite
    //         ];
    //         $totalHT += $produit->getPrix()*$quantite;      
    //         }
    //     }
    //     $this->render('panier/pdf.html.twig',['post'=>$value,"datapanier"=>$datapanier,"total"=>$totalHT]);

    // }

    //valid for pdf
    // #[Route('valider/command',name:'valider_command')]
    // public function validcommand(PdfService $pdf){
     
    //   $html = $this->render('panier/livraison.html.twig');
    //   $pdf->showPdfFile($html);
    // }


}
?>