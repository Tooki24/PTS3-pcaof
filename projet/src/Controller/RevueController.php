<?php

namespace App\Controller;

use App\Entity\Revue;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RevueRepository;

class RevueController extends AbstractController
{
    #[Route('/revues', name: 'revues')]
    public function index(RevueRepository $revueRepository): Response
    {
        return $this->render('revue/index.html.twig', [
            'controller_name' => 'RevueController',
            'revues' => $revueRepository->findAll(),

            // récupérer le nombre d'articles pour chaque revue

        ]);
    }

    #[Route('/revues/liste_articles/{idRevue}', name: 'liste_articles')]
    public function list_articles(RevueRepository $revueRepository, int $idRevue): Response
    {
        $revue = $revueRepository->find($idRevue);
        return $this->render('revue/index.html.twig', [
            'controller_name' => 'RevueController',
            'revue' => $revue,
            'articles'=>$revue->getArticles(),
        ]);
    }
}
