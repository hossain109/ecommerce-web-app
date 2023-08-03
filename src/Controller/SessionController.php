<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SessionController extends AbstractController{
    //compter session utilisateur
    #[Route("/session", name:"session")]
    public function sessionTest(Request $request){
        //creer session
       $mysession =  $request->getSession();

       if($mysession->has("nombreVisite")){
         $nombreViste = $mysession->get("nombreVisite")+1;
       }else{
        $nombreViste = 1;
       }
       //dump($nombreViste);die;
       $mysession->set('nombreVisite',$nombreViste);
        return $this->render("session.html.twig",['nombreVisite'=>$nombreViste]);
    }
    //affiche todos liste par stoker dans une variabe session
    #[Route("/session/todos", name:"session_todos")]
    public function todos(Request $request){

        $mysession = $request->getSession();

        if(!$mysession->has("todos")){
            $todos = [
                "name"=>"Sohrab",
                "prenom"=>"Mohamamd",
                "age"=>36,
            ];
        //mettez dans le varialbe session
        $mysession->set('todos',$todos);
        //ajouter une flash 
        $this->addFlash(type:"info", message:"Todos liste viens d'etre inistialise");
        }


        return $this->render("session.html.twig");
    }

    //prefix
  

   //ajouter les element dans le todso
   //ajouter valuer par default par ? ou bien dans le route:defaults:defaults:["cle"=>"city","valeur"=>"noakhali"]
   #[Route("/session/add/{cle?city}/{valeur?noakhali}",name:"session_todos_ajout")]
   public function  ajouterTodos(Request $request,$cle,$valeur){

    $mysession = $request->getSession();
    // verifie si le variable existe ajoute
    if($mysession->has('todos')){
        //si oui 
        //verifier on a deja todos meme nom
       $todos =  $mysession->get('todos');
       if(isset($todos[$cle])){
        $this->addFlash(type:"error", message:"Todos id deja existe dans la liste");
       }else{
        //si non ajouter todos dans la liste et afficher un message ajouter avec success
        $todos[$cle]= $valeur;
        $mysession->set('todos',$todos);
        $this->addFlash(type:"success", message:"Todos de id name ajouter avec success");
       }
    
    }else{
    //si non afficher une erreur retourenr liset todos
    $this->addFlash(type:"error", message:"Todos liste n'est pas encore inistialise");
    }

    return $this->redirectToRoute('session_todos');
   }

   //mis a jour todos

    //suprime todo
   #[Route("/session/delete/{cle}",name:"session_todos_delete")]
   public function  deleteTodos(Request $request,$cle){

    $mysession = $request->getSession();
    //si toodos exits
    if($mysession->has('todos')){
      $todos = $mysession->get('todos');
      //si le cle n'existe plus que je veux suprimer
      if(!isset($todos[$cle])){
        $this->addFlash(type:"error", message:"Todos liste n'est pas encore inistialise");
      }
      //si la cle existe que je veux suprimer
      else{
        unset($todos[$cle]);
        $mysession->set('todos',$todos);
        $this->addFlash(type:"success", message:"Todos de id a ete suprimer avec success");
      }

    }
    //si todos n'existe plus
    else{
        $this->addFlash(type:"error", message:"Todos liste n'est pas encore inistialise");
    }

        return $this->redirectToRoute('session_todos');
   }
   //update todos
   #[Route("/session/update/{cle}/{value}",name:"session_todos_update")]
   public function  updateTodos(Request $request,$cle,$value){

    $mysession = $request->getSession();
    //si todos existe
    if($mysession->has('todos')){
      $todos =  $mysession->get('todos');
      //si le cle n'existe plus que je veux suprimer
      if(!isset($todos[$cle])){
        $this->addFlash(type:"error", message:"Todos liste n'est pas encore inistialise");
      }
      //si la cle existe que je veux suprimer
      else{
        $todos[$cle]=$value;
        $mysession->set('todos',$todos);
        $this->addFlash(type:"success", message:"Todos de id a ete ajouter avec success");
      }

    }
    //si todos n'existe plus
    else{
        $this->addFlash(type:"error", message:"Todos liste n'est pas encore inistialise");
    }

    return $this->redirectToRoute('session_todos');
   }

   //reset todos
   #[Route("/session/reset",name:"session_reset")]
   public function  resetTodos(Request $request){

    $mysession = $request->getSession();

    $mysession->remove('todos');

        return $this->redirectToRoute('session_todos');
   }


   //dehors de template comment implement 
   //requirements:["entier1"=>"\d+", "entier2"=>"\d+"]
   #[Route('multiply/{entier1<\d+>}/{entier2<\d+>}',name:"multi")]
   public function multiplication($entier1,$entier2){
      $result = $entier1*$entier2;
      return new Response("<h1>Result: $result</h1>");
   }
/*
   #[Route('{mavar}', name:"maVariable")]
    public function displayRoute($mavar){
      return new Response(
        "<html>
        <body>
        <span>$mavar</span>
        </body>
        </html>"
        
      );
    }
*/
    #[Route('/array',name:"display_array")]
    public function display_array(){
       $persons = [
        ["name"=>"sohrab", "age"=>37, "ville"=>"paris"],
        ["name"=>"tapia", "age"=>26, "ville"=>"noakhali"],
        ["name"=>"inaya", "age"=>1, "ville"=>"saint-denis"],
       ];
       return $this->render('test.html.twig',["persons"=>$persons]);
    }

    //sans route parceque c'est embeded rendering 
    public function message(){

      return $this->render('embed.html.twig', [
        "messagehelo"=>"Say Hello "
      ]);
    }
}

?>