<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    #[Route('/mentions-legales', name: 'about')]
    public function index(): Response
    {
        return $this->render('about/mentions-legales.html.twig');
    }

    #[Route('/association', name: 'association')]
    public function association(): Response
    {
        return $this->render('about/association.html.twig');
    }
}
