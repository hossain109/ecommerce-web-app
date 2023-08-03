<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\SecurityBundle\Security;

class CompteController extends AbstractController
{

    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            
            $entityManager->persist($user);
            $entityManager->flush();
           
            

            return $this->redirectToRoute('panier_index');
        }

        return $this->render('compte/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
     {
        // get the login error if there is one
       $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        //var_dump($lastUsername);die;
        //redirect to route
    //     var_dump($lastUsername);
    //    if($lastUsername){
    //        $this->redirectToRoute('livraison_produit');
    //     }

         return $this->render('compte/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
         ]);
     }

     #[Route('/logout', name: 'app_logout')]
     public function logout(Security $security): never
     {
       throw new \Exception('Don\'t forget to activate logout in security.yaml');
      
            
     }

     #[Route('contacts/messages', name:'conact_message')]
     public function contactMessage(ManagerRegistry $doctrine){

        $contacts = $doctrine->getRepository(Contact::class)->findAll();

        return $this->render('contactMessage.html.twig',['contacts'=>$contacts]);
     }
}
