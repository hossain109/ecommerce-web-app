<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use SebastianBergmann\RecursionContext\Context;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController{

      #[Route('contact', name:'contact_us')]
      public function contact(Request $request){

            $contact = new Contact();

            $form = $this->createForm(ContactType::class,$contact);

            return $this->render('form/contact.html.twig',['form'=>$form]);
      }
      #[Route('contact/action',name:'contact_action')]
      public function contactAction(Request $request, EntityManagerInterface $entitymanager){
            $contact = new Contact();

            $form = $this->createForm(ContactType::class,$contact);

            $form->handleRequest($request);
            //dump($contact);die;
            if($form->isSubmitted() && $form->isValid()){

                 // dump($contact);die;
                 // $contact->createdAt(new DateTime());

                  $contact =  $form->getData();

                  $entitymanager->persist($contact);

                  $entitymanager->flush();

                  $this->addFlash('send', "Nous avons reçu votre message nous vous contactos sous 3 heure.");
            }

            return $this->redirectToRoute('contact_us');
      }
}