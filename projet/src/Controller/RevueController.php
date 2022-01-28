<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RevueController extends AbstractController
{
    #[Route('/revue', name: 'revue')]
    public function index(): Response
    {
        return $this->render('revue/index.html.twig', [
            'controller_name' => 'RevueController',
        ]);
    }
}
