<?php
namespace App\Controller;

use App\Entity\Souscription;
use App\Form\SouscriptionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SouscriptionController extends AbstractController{

    //#[Route('/souscrire', methods:['get','post'],name:'form_souscription')]
    function souscrire(){

        $souscrireForm = new Souscription();

        $form = $this->createForm(SouscriptionType::class,$souscrireForm);

        return $this->render('form/souscription.html.twig',['form'=>$form->createView()]);
    }
    #[Route("/soucription",name:"souscription_action")]
    function souscription_action(Request $request, EntityManagerInterface $entityManager){

        $sousriptipn = new Souscription();

        $form = $this->createForm(SouscriptionType::class,$sousriptipn);

        $form->handleRequest($request);

        if($request->isMethod("POST")){
            if($form->isSubmitted() && $form->isValid()){

                $souscriptMail = $form->getData();

                $entityManager->persist($souscriptMail);

                $entityManager->flush();

                $this->addFlash('add', "vous souscription a été fait avec success");
            }
        }
        return $this->redirectToRoute("product");
    }
}

?>