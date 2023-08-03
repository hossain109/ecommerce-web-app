<?php
namespace App\Controller;

use App\Entity\Produits;
use App\Entity\Search;
use App\Form\SearchType;
use Repository\ProduitsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController{
    
   //#[Route('/search', methods:['post','get'],name:'search_form')]
    public function searchForm(Request $request){

        $searchText = new Search();

          $form = $this->createForm(SearchType::class,$searchText);

        return $this->render('form/search.html.twig',['form'=>$form->createView()]);
    }

    #[Route('/search-result', name:'search_result')]
    public function searchResult(Request $request,ManagerRegistry $doctrine){

        $search = new Search();

        $form = $this->createForm(SearchType::class, $search);

        $form->handleRequest($request);
        
    if($request->isMethod('POST')){
        if($form->isValid() && $form->isSubmitted()){
            //recupere form data
            $searchVlaue = $form->getData();
            //recupere produit nom
            $produitNom = $searchVlaue->getText();

            $produits = $doctrine->getRepository(Produits::class)->findBy(['nom'=>$produitNom]);
        }
    }else{
        throw $this->createNotFoundException("La page n\'existe pas.");
    }
        return $this->render('form/searchresult.html.twig',['produits'=>$produits]);
    }

}
?>