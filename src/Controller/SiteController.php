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
     * @Route("/profil", name="profil")
     */
    public function profil()
    {
        return $this->render('site/profil.html.twig');

    }
}
