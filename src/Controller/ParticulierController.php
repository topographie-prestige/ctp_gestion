<?php

namespace App\Controller;

use App\Entity\Particulier;
use App\Form\ParticulierType;
use App\Repository\ParticulierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/particulier")
 */
class ParticulierController extends AbstractController
{
    /**
     * @Route("/", name="particulier_index", methods="GET")
     */
    public function index(ParticulierRepository $particulierRepository): Response
    {
        return $this->render('particulier/index.html.twig', ['particuliers' => $particulierRepository->findAll()]);
    }

    /**
     * @Route("/new", name="particulier_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $particulier = new Particulier();
        $form = $this->createForm(ParticulierType::class, $particulier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($particulier);
            $em->flush();

            return $this->redirectToRoute('particulier_index');
        }

        return $this->render('particulier/new.html.twig', [
            'particulier' => $particulier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="particulier_show", methods="GET")
     */
    public function show(Particulier $particulier): Response
    {
        return $this->render('particulier/show.html.twig', ['particulier' => $particulier]);
    }

    /**
     * @Route("/{id}/edit", name="particulier_edit", methods="GET|POST")
     */
    public function edit(Request $request, Particulier $particulier): Response
    {
        $form = $this->createForm(ParticulierType::class, $particulier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('particulier_edit', ['id' => $particulier->getId()]);
        }

        return $this->render('particulier/edit.html.twig', [
            'particulier' => $particulier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="particulier_delete", methods="DELETE")
     */
    public function delete(Request $request, Particulier $particulier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$particulier->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($particulier);
            $em->flush();
        }

        return $this->redirectToRoute('particulier_index');
    }
}
