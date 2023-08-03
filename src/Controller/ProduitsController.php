<?php

// src/Controller/BlogController.php
namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Produits;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProduitsController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index()
    {
      return $this->render("produit/accueil.html.twig");
    }

    #[Route('/allproduct', name: 'all_product')]
    public function allproduit(ManagerRegistry $doctrine)
    {

      $produits = $doctrine->getRepository(Produits::class)->findAll();
      //dump($produits);die;
      $categories = $doctrine->getRepository(Categories::class)->findAll();

      return $this->render("produit/produit.html.twig",['produits'=>$produits,'categories'=>$categories]);

    }

    #[Route('presentation/{id}', name:'produit_presentation',requirements: ['id' => '\d+'])]

    public function produitPresentation($id,ManagerRegistry $doctrine){

      $produit = $doctrine->getRepository(Produits::class)->find($id);

      if(!$produit){
        // add flash message proudit n'existe pas
        $this->addFlash("error", "Le produit vous saisie n'existe plus");
        
        return $this->redirectToRoute("product");
      }
      //dump($produit);die;

      return $this->render('produit/presentation.html.twig',['id'=>$id,'produit'=>$produit]);
    }
}