<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PersonRepository;
use App\Repository\ArticleRepository;

class PersonController extends AbstractController
{
    #[Route('/person/{lastName}_{firstName}', name: 'details_person')]
    public function index(PersonRepository $personRepository,ArticleRepository $articleRepository, string $lastName, string $firstName): Response
    {
        $person = $personRepository->findOneBy(['name'=>$lastName,'firstName'=>$firstName]);
        return $this->render('person/index.html.twig', [
            'person' => $person,
            'publications' => $person->getPublications(),
            //'articles' => $personRepository->,
        ]);
    }
}
