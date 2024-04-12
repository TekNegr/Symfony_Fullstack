<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;



class MainController extends AbstractController
{
    //Lance l'application et envoie a la page login si personne est connecté 
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        if(!isset($_SESSION)){
            session_start();
        }

        if(isset($_SESSION['user'])){
            return $this->render('main/index.html.twig', [
                'controller_name' => 'MainController',
            ]);
        }

        else if (isset($_SESSION) && !isset($_SESSION['user'])){
            return $this->redirectToRoute('login_page');
        }
    }

    #[Route('/login', name:'login_page')]
    public function loginPage(): Response{
        //$error = $authenticationUtils->getLastAuthenticationError();
        //$lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('main/login.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/signup', name:'signup_page')]
    public function signupPage(): Response{
        return $this->render('main/signup.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
