<?php


namespace App\Controller;
use App\Entity\DataOak;
use App\Form\DataOakType;
use App\Repository\DataOakRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{


    /**
     * @Route("/", name="index", methods={"GET"})
     *
     */
    public function index(DataOakRepository $dataOakRepository): Response
    {

        return $this->render('index.html.twig', ['data_oaks' => $dataOakRepository->findAll()  ]);
    }
}