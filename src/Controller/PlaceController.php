<?php

namespace App\Controller;

use App\Entity\Place;
use App\Form\PlaceFormType;
use Doctrine\ORM\EntityManager;
use App\Repository\PlaceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlaceController extends AbstractController
{
    /**
     * @Route("/dispo", name="dispo")
     */
    public function index(PlaceRepository $placeRepository)
    {
        $place =$placeRepository->findAll();

        return $this->render('place/index.html.twig', [
            'place' => $place,
        ]);
    }
    /**
     * @Route("/place", name="place")
     */
    public function add(Request $request, EntityManagerInterface $entityManager){
        $place = new Place();
        //je generer le formulaire des places
        $form=$this->createForm(PlaceFormType::class, $place);
        //je recupere les données du form
        $form->handleRequest($request);

        //si les données sont valides on peut enregistrer
        if($form->isSubmitted()&& $form->isValid()){
            // je procede a l'enregistrement
            $place->setDateDebut( new \DateTime);
            
            $place->setDateFin( new \DateTime);
            
            $entityManager->persist($place);
            //j'enregistre les donénes en bdd
            $entityManager->flush();
            
            return $this->redirectToRoute('dispo',[
                'id' =>$place->getId()
            ]);
        }
        return $this ->render('place/index.html.twig',[
            'form_place'=>$form->createView()
        ]);
    }
}
