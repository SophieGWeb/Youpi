<?php

namespace App\Controller;

use App\Entity\Planning;
use App\Form\PlanningType;
use App\Repository\PlanningRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/planning")
 */
class PlanningController extends AbstractController
{
    /**
     * @Route("/", name="planning_index", methods={"GET"})
     */
    public function index(PlanningRepository $planningRepository): Response
    {
        return $this->render('planning/index.html.twig', [
            'plannings' => $planningRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="planning_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $planning = new Planning();
        $form = $this->createForm(PlanningType::class, $planning);
        $form->handleRequest($request);
        $collectivite = $this->getUser();
        //si les données sont valides on peut enregistrer
        if ($form->isSubmitted() && $form->isValid()) {
            $planning->setCollectivite($collectivite);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($planning);
            $entityManager->flush();

            return $this->redirectToRoute('planning_index');
        }

        return $this->render('planning/new.html.twig', [
            'planning' => $planning,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="planning_show", methods={"GET"})
     */
    public function show(Planning $planning): Response
    {
        return $this->render('planning/show.html.twig', [
            'planning' => $planning,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="planning_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Planning $planning): Response
    {
        $form = $this->createForm(PlanningType::class, $planning);
        $form->handleRequest($request);

     

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('planning_index');
        }

        return $this->render('planning/edit.html.twig', [
            'planning' => $planning,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="planning_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Planning $planning): Response
    {
        if ($this->isCsrfTokenValid('delete'.$planning->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($planning);
            $entityManager->flush();
        }

        return $this->redirectToRoute('planning_index');
    }
}
