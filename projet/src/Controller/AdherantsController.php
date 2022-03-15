<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PersonRepository;

class AdherantsController extends AbstractController
{
    #[Route('/devenir-adherants', name: 'adherants')]
    public function index(): Response
    {
        return $this->render('adherants/index.html.twig', [
        ]);
    }

    #[Route('/bureau', name: 'bureau')]
    public function bureau(PersonRepository $personRepository): Response
    {
        return $this->render('adherants/bureau.html.twig', [
            'persons'=>$personRepository->findAll(),
        ]);
    }
}


