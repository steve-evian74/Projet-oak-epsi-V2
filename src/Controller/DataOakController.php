<?php

namespace App\Controller;

use App\Entity\DataOak;
use App\Form\DataOakType;
use App\Repository\DataOakRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/data/oak")
 */
class DataOakController extends AbstractController
{

    /**
     * @Route("/", name="data_oak_index", methods={"GET"})
     */
    public function index(DataOakRepository $dataOakRepository): Response
    {
        return $this->render('data_oak/index.html.twig', [
            'data_oaks' => $dataOakRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="data_oak_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $dataOak = new DataOak();
        $form = $this->createForm(DataOakType::class, $dataOak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dataOak);
            $entityManager->flush();

            return $this->redirectToRoute('data_oak_index');
        }

        return $this->render('data_oak/new.html.twig', [
            'data_oak' => $dataOak,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="data_oak_show", methods={"GET"})
     */
    public function show(DataOak $dataOak): Response
    {
        return $this->render('data_oak/show.html.twig', [
            'data_oak' => $dataOak,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="data_oak_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DataOak $dataOak): Response
    {
        $form = $this->createForm(DataOakType::class, $dataOak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('data_oak_index');
        }

        return $this->render('data_oak/edit.html.twig', [
            'data_oak' => $dataOak,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="data_oak_delete", methods={"DELETE"})
     */
    public function delete(Request $request, DataOak $dataOak): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dataOak->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dataOak);
            $entityManager->flush();
        }

        return $this->redirectToRoute('data_oak_index');
    }
}
