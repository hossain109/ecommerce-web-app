<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Media;
use App\Entity\Produits;
use App\Entity\Souscategorie;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

//all categorie for display menu
class CategoriesController extends AbstractController{
    //categorie menu include like embeded controller
    public function menu(ManagerRegistry $doctrine){

        $categories = $doctrine->getRepository(Categories::class)->findAll();
    
        return $this->render('/menu/menu.html.twig',['categories'=>$categories]);
    }
    //display produit by categorie
    #[Route("categorie/{categorie}/{page?1}/{nbre?8}",requirements:['id'=>'\d+'],name:"categorie_produit")]
    public function categorieProduuits($categorie,$page,$nbre, ManagerRegistry $doctrine){
        $isPaginated=false;
        //cherche tous sous categorie par categorie
        $souscategories = $doctrine->getRepository(Souscategorie::class)->findBy(['categorie'=>$categorie]);
        //$nbre = 4;
        $countProduit =count($doctrine->getRepository(Produits::class)->findBy(['categorie'=>$categorie]));
     
        //si produit n'existe pas
     
        $nbPage = ceil($countProduit/$nbre);
        if($nbPage>1)
        $isPaginated = true;

        $produits = $doctrine->getRepository(Produits::class)->findBy(['categorie' => $categorie],[],$nbre,($page-1)*$nbre);

        //if(!$produits){return $this->redirectToRoute('product');}
        $categorie = $doctrine->getRepository(Categories::class)->find($categorie);
        //dump($categorieImage);die;
        return $this->render('produit/produit-categorie.html.twig',['produits'=>$produits, 'categorie'=>$categorie,'souscategories'=>$souscategories,'isPaginated'=>$isPaginated,'nbre'=>$nbre,'nbPage'=>$nbPage,'page'=>$page]);
    }

    //createion sous-categorie menu
   // #[Route("categorie/{categorie}/{page?1}/{nbre?8}")]
   // public function sousmenu($categorie, ManagerRegistry $doctrine){

    //    $souscategories = $doctrine->getRepository(Souscategorie::class)->findBy(['categorie'=>$categorie]);
     //   return $this->render('menu/sousmenu.html.twig',['souscategories'=>$souscategories]);
   // }
}

?>