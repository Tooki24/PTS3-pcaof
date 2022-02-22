<?php

namespace App\Controller;

use App\Repository\ColloqueRepository;
use App\Repository\PersonRepository;
use App\Repository\PublicationRepository;
use App\Repository\RevueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(PublicationRepository $publicationRepository,
                          RevueRepository $revueRepository,
                          ColloqueRepository $colloqueRepository): Response
    {
    $revue = $revueRepository->lastOne();
    $colloque = $colloqueRepository->lastOne();
        return $this->render('home/index.html.twig', [
            'publications' => $publicationRepository->lastTree(),
            'revue' => $revue,
            'colloque' => $colloque
        ]);
    }
}
