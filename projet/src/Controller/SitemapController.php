<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\ColloqueRepository;
use App\Repository\PublicationRepository;
use App\Repository\RevueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SitemapController extends AbstractController
{
    /**
     * @Route ("/sitemap.xml", name="sitemap", defaults={"_format"="xml"})
     */
    public function index(
        Request $request,
        ColloqueRepository $colloqueRepository,
        PublicationRepository $publicationRepository,
        RevueRepository $revueRepository,
        ArticleRepository $articleRepository
    ): Response
    {
        $hostname = $request->getSchemeAndHttpHost();

        $urls = [];

        $urls[] = ['loc'    => $this->generateUrl('home')];
        $urls[] = ['loc'    => $this->generateUrl('colloques')];
        $urls[] = ['loc'    => $this->generateUrl('publications')];
        $urls[] = ['loc'    => $this->generateUrl('revues')];
        $urls[] = ['loc'    => $this->generateUrl('adherants')];
        $urls[] = ['loc'    => $this->generateUrl('contact')];

        foreach ($colloqueRepository->findAll() as $colloque)
        {
            $urls[] = [
                'loc'       => $this->generateUrl('details_colloque', ['slug' => $colloque->getSlug()])
            ];
        }
        foreach ($publicationRepository->findAll() as $publication){
            $urls[] = [
                'loc'       => $this->generateUrl('details_publication', ['slug' => $publication->getSlug()]),
                'lastmod'   => $publication->getDatePubli()->format('Y-m-d')
            ];
        }
        foreach ($revueRepository->findAll() as $revue){
            $urls[] = [
                'loc'       => $this->generateUrl('detail_revue', ['slug' => $revue->getSlug()]),
                'lastmod'   => $revue->getDatePubli()->format('Y-m-d')
            ];
        }
        foreach ($articleRepository->findAll() as $article){
            $urls[] = [
                'loc'       => $this->generateUrl('details_article', ['slug' => $article->getSlug()]),
                'lastmod'   => $article->getDatePubli()->format('Y-m-d')
            ];
        }

        $reponse = new Response(
            $this->renderView('sitemap/index.html.twig', [
                'urls'      => $urls,
                'hostname'  => $hostname,
            ]),200
        );

        $reponse->headers->set('Content-type', 'text/xml');

        return $reponse;
    }
}
