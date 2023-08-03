<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Entity\Souscategorie;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class SouscategorieController  extends AbstractController{

    //  #[Route("/", name:"sous_categorie_index")]
    //embeded controller pour souscategorie menu
      public function index(ManagerRegistry $doctrine){

            $souscategories = $doctrine->getRepository(Souscategorie::class)->findAll();

            return $this->render('menu/sousmenu.html.twig',['souscategories'=>$souscategories]);
      }
      //display produit par sous categorie
      #[Route("souscategorie/{souscategorie}/{page?1}/{nbre?4}",requirements:['souscategorie'=>'\d+'],name:"souscategorie_produit")]
      public function souscategorie($souscategorie,$page,$nbre,ManagerRegistry $doctrine){
      $isPaginated =false;
        //$nbre = 8;
        $countProduit =count($doctrine->getRepository(Produits::class)->findBy(['souscategorie'=>$souscategorie]));
        //si produit n'existe pas
        $nbPage = ceil($countProduit/$nbre);
        if($nbPage>1)
        $isPaginated = true;
        $produits = $doctrine->getRepository(Produits::class)->findBy(['souscategorie' => $souscategorie],[],$nbre,($page-1)*$nbre);
        //if(!$produits){return $this->redirectToRoute('product');}
        //souscategorie offset pour pagination
        $souscategorie = $doctrine->getRepository(Souscategorie::class)->find($souscategorie);

        //tous souscategoires pour par rapport categorie(sousmenu)
        $categorie = $souscategorie->getCategorie();
        $souscategories = $doctrine->getRepository(Souscategorie::class)->findBy(['categorie'=>$categorie]);
      

        return $this->render('produit/produit-souscategorie.html.twig',['produits'=>$produits,'souscategories'=>$souscategories ,'souscategorie'=>$souscategorie,'isPaginated'=>$isPaginated,'nbre'=>$nbre,'nbPage'=>$nbPage,'page'=>$page]);
      }
}