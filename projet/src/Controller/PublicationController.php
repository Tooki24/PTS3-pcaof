<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PublicationRepository;

class PublicationController extends AbstractController
{
    #[Route('/publications', name: 'publications')]
    public function index(PublicationRepository $publicationRepository): Response
    {
        return $this->render('publication/index.html.twig', [
            'controller_name' => 'PublicationController',
            'publications' => $publicationRepository->dateDesc()
        ]);
    }

    #[Route('/publication/detail/{slug}', name: 'details_publication')]
    public function details_publi(PublicationRepository $publicationRepository, string $slug): Response
    {
        return $this->render('publication/details_publication.html.twig', [
            'controller_name' => 'PublicationController',
            'publication' => $publicationRepository->findOneBy(['slug' => $slug]),
        ]);
    }
}
