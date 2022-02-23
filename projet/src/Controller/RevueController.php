<?php

namespace App\Controller;

use App\Entity\Revue;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RevueRepository;
use App\Repository\PersonRepository;
use App\Repository\ArticleRepository;

class RevueController extends AbstractController
{
    #[Route('/revues', name: 'revues')]
    public function index(RevueRepository $revueRepository): Response
    {
        return $this->render('revue/index.html.twig', [
            'controller_name' => 'RevueController',
            'revues' => $revueRepository->revuesOnLine(),
        ]);
    }

    #[Route('/revues/details/{slug}', name: 'detail_revue')]
    public function list_articles(ArticleRepository $articleRepository,RevueRepository $revueRepository, string $slug): Response
    {
        $revue = $revueRepository->findOneBy(['slug' => $slug]);

        $articles = $revue->getArticles();
        $colloques = $revue->getColloques();

        foreach ($articles as $article)
            if(!$article->getOnLine())
                $articles->removeElement($article);

        foreach ($colloques as $colloque)
            if(!$colloque->getOnLine())
                $colloques->removeElement($colloque);


        return $this->render('revue/listeArticles.html.twig', [
            'controller_name' => 'RevueController',
            'revue' => $revue,
            'colloques'=> $colloques,
            'articles' => $articles,
        ]);
    }


}
