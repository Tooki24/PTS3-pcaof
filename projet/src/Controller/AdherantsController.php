<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdherantsController extends AbstractController
{
    #[Route('/adherants', name: 'adherants')]
    public function index(): Response
    {
        return $this->render('adherants/index.html.twig', [
        ]);
    }
}
