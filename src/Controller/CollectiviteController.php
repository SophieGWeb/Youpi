<?php

namespace App\Controller;

use App\Entity\Collectivite;
use App\Form\CollectiviteType;
use App\Repository\CollectiviteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/collectivite")
 */
class CollectiviteController extends AbstractController
{
    /**
     * @Route("/", name="collectivite_index", methods={"GET"})
     */
    public function index(CollectiviteRepository $collectiviteRepository): Response
    {
        return $this->render('collectivite/index.html.twig', [
            'collectivites' => $collectiviteRepository->findAll(),
        ]);
    }

   
    /**
     * @Route("/{id}", name="collectivite_show", methods={"GET"})
     */
    public function show(Collectivite $collectivite): Response
    {
        return $this->render('collectivite/show.html.twig', [
            'collectivite' => $collectivite,
            
        ]);
    }

    /**
     * @Route("/{id}/edit", name="collectivite_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Collectivite $collectivite): Response
    {
        $form = $this->createForm(CollectiviteType::class, $collectivite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('collectivite_index');
        }

        return $this->render('collectivite/edit.html.twig', [
            'collectivite' => $collectivite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="collectivite_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Collectivite $collectivite): Response
    {
        
       

        if ($this->isCsrfTokenValid('delete'.$collectivite->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($collectivite);
            $entityManager->flush();
            
            
        }
        return $this->redirectToRoute('collectivite_index');
        
    }
}
