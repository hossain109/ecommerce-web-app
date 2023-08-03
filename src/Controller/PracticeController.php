<?php
namespace App\Controller;

use Egulias\EmailValidator\EmailParser;
use Exception;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Console\Helper\Dumper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

use function PHPUnit\Framework\throwException;

//global route and path name for this page/controller
/**
 * @Route("/categorie",name="cat/")
 */

class PracticeController extends AbstractController{
    //#[Route('/categore/{id}', requirements:['id'=>'\d+'], name:'categorie')]
    //#[Route('/categore/{id<\d+>}',defaults:['id'=>'1', 'post'=>'7'], name:'categorie')]  //by number and defaults
    //by token
    //public function categorie($id, $post){
    #[Route('/test/{token}',requirements:['token'=>'.+'], methods:['get'] , name:'test_category')]
    public function categorie($token){
        echo $token;
        //echo "Post Number: ".$post;
        return $this->render("categorie.html.twig");
    }
    #[Route('/display',requirements:['token'=>'.+'], name:'display')]
    public function display(){
    
        //echo "Post Number: ".$post;
        return $this->render("categorie.html.twig");
    }

    #[Route('/create/{token}',requirements:['token'=>'.+'],methods:['get'],name:'create')]
    public function create(Request $request){
       // dump($request);die;
        $token  = $request->attributes->get(key:'token');
        echo $token;
        return $this->render("categorie.html.twig");
    }

    //on peux definir pour certain host ou mobile
    #[Route('/mobile',methods:["get"] ,host:'mobile.com', name:'org_mobile')]
    public function organisationMobile(){
        return $this->render('ceci pour mobile host');
    }
    //stateless: true (used when want to not saved in session, cookie)
    #[Route('/localserver', name:'org_localhost', host:'http://127.0.0.1:8000', stateless:true)]
    public function organisationLocalhost(){
       // session_start();
        $_SESSION['nom']= "sorhab";
        echo $_SESSION['nom'];
       // session_destroy();
        return $this->render('categorie.html.twig');
    }
    #[Route('/orgcreate', name:'org_create')]
    public function orgCreate(){
        //return $this->redirectToRoute('cat/org_create');
    
        try{
            $url = $this->generateUrl('cat/org_edit', ['id' => 5]);
            return $this->redirect($url);
        }catch(RouteNotFoundException $ex){
            throw new Exception($ex);
        }
        return $this->render('');
        
    }
    //schemes pour secure purpose, exemeple: moyenne de payments
    #[Route('/orgedit/{id}', name:'org_edit',schemes:'http')]
    public function orgEdit($id){
        echo $id;
       return $this->render('edit.html.twig');
    }
    #[Route('/serve', name:'service_symfony',schemes:'http')]
    public function service( MailerInterface $mailer){
        dump($mailer);die;
    }

}

?>