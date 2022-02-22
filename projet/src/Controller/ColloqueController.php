<?php

namespace App\Controller;

use App\Repository\ColloqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ColloqueController extends AbstractController
{
    #[Route('/colloques', name: 'colloques')]
    public function index(ColloqueRepository $colloqueRepository): Response
    {
        return $this->render('colloque/index.html.twig', [
            'controller_name' => 'ColloqueController',
            'colloquesAsc'=> $colloqueRepository->dateAsc(),
            'colloquesDesc'=> $colloqueRepository->dateDesc(),
        ]);
    }

    #[Route('/colloques/{slug}', name: 'details_colloque')]
    public function details(ColloqueRepository $colloqueRepository,string $slug): Response
    {
        return $this->render('colloque/details_colloque.html.twig', [
            'controller_name' => 'ColloqueController',
            'colloque' => $colloqueRepository->findOneBy(['slug' => $slug]),
        ]);
    }
}
