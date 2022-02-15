<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ColloqueController extends AbstractController
{
    #[Route('/colloque', name: 'colloque')]
    public function index(): Response
    {
        return $this->render('colloque/index.html.twig', [
            'controller_name' => 'ColloqueController',
        ]);
    }
}
