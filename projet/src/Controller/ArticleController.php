<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;

class ArticleController extends AbstractController
{
    #[Route('/article/{slug}', name: 'details_article')]
    public function index(ArticleRepository $articleRepository, string $slug): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'article' => $articleRepository->findOneBy(['slug' => $slug]),
        ]);
    }
}
