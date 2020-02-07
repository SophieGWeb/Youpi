<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    
    /**
     * @Route("/",name="home")
     */
    public function home()
    {
        return $this->render('site/home.html.twig',[
            'title'=>"Bienvenue sur le site Youpi"
        ]);
    }
    /**
     * @Route("/site/dispo", name="site_show")
     */
    public function show()
    {
        return $this->render('site/show.html.twig');

    }
    /**
     * @Route("/login", name="login")
     */
    public function login()
    {
        return $this->render('site/login.html.twig');

    }
    /**
     * @Route("/profil", name="profil")
     */
    public function profil()
    {
        return $this->render('site/profil.html.twig');

    }
}
