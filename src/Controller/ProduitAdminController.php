<?php

namespace App\Controller;

use App\Entity\Media;
use App\Entity\Produits;
use App\Entity\Souscategorie;
use App\Form\MediaType;
use App\Form\ProduitType;
use App\Form\SouscategorieType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\String\Slugger\SluggerInterface;

#[
    Route('/admin')
    ]
class ProduitAdminController extends AbstractController{
    //
      #[Route("/addproduit",methods:['get','post'],name:'admin_addproduit')]
      public function addAdminProduit(Request $request, ManagerRegistry $doctrine){

            $produits = new Produits();

            $form = $this->createForm(ProduitType::class,$produits);

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                $produit= $form->getData();
                if($produit){
                    $manager = $doctrine->getManager();

                    $manager->persist($produit);

                    $manager->flush();

                    $this->addFlash("success", "Produit ajoter avec success");
                }
            }

            return $this->render('pageAdmin/produitAdmin.html.twig',['form'=>$form->createView()]);
      }
      //add produit image
      #[Route("/addMedia",methods:['get','post'],name:'admin_addMedia')]
      public function addAdminMedia(Request $request, SluggerInterface $slugger, ManagerRegistry $doctrine){

            $media = new Media();
            $form = $this->createForm(MediaType::class, $media);
            $form->handleRequest($request);
            
            if ($form->isSubmitted() && $form->isValid()) {
                $imageProduit = $form->get('path')->getData();
                  
                // this condition is needed because the 'brochure' field is not required
                // so the PDF file must be processed only when a file is uploaded
                if ($imageProduit) {
                    $originalFilename = pathinfo($imageProduit->getClientOriginalName(), PATHINFO_FILENAME);
                    // this is needed to safely include the file name as part of the URL
                    $safeFilename = $slugger->slug($originalFilename);
                    $newFilename = $safeFilename.'-'.uniqid().'.'.$imageProduit->guessExtension();
                    
                    // Move the file to the directory where brochures are stored
                    try {
                        $imageProduit->move(
                            $this->getParameter('product_image_directory'),
                            $newFilename
                        );
                    } catch (FileException $e) {
                        // ... handle exception if something happens during file upload
                    }
    
                    // updates the 'brochureFilename' property to store the PDF file name
                    // instead of its contents
                    //dump(`images/{$newFilename}`);die;
                    $media->setPath("images/".$newFilename);
                    //dump($media->getPath());die;
                }

                $manager = $doctrine->getManager();
                //dump($media);die;
                $manager->persist($media);

                $manager->flush();
                //affiche une message success
                if($newFilename){
                  $message = " à été avec success";
                }else{
                  $message = "a été mis a jour success";
                }

            }
            return $this->render('pageAdmin/mediaAdmin.html.twig',['form'=>$form->createView()]);
      }
      //add souscategorie
      #[Route('/souscategorie', methods:['get','post'], name:'admin_souscategorie')]
      public function addsouscategorie(Request $request,ManagerRegistry $doctrine){
        
        $souscategorie = new Souscategorie();

        $form = $this->createForm(SouscategorieType::class,$souscategorie);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $souscategorie = $form->getData();

            if($souscategorie){

                $manager = $doctrine->getManager();

                $manager->persist($souscategorie);
    
                $manager->flush();

                $this->addFlash('success','souscategorie ajouter avec success');
            }

        }

       return $this->render('pageAdmin/souscategorieAdmin.html.twig', ['form'=>$form->createView()]);
      }
}