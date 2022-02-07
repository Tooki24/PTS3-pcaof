<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Colloque;
use App\Entity\Intervention;
use App\Entity\KeyWords;
use App\Entity\Person;
use App\Entity\Publication;
use App\Entity\Revue;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administration PCAOF');
    }

    public function configureMenuItems(): iterable
    {
        //TODO ajouter des jolies icones pour chaques categories
        //yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Les membres', 'fa_secret fa-user', Person::class);
        yield MenuItem::linkToCrud('Publications', 'fa-file', Publication::class);
        yield MenuItem::linkToCrud('Colloques', 'fa-file', Colloque::class);
        yield MenuItem::linkToCrud('Revue', 'fa-file', Revue::class);
        yield MenuItem::linkToCrud('Article', 'fa-file', Article::class);
        yield MenuItem::linkToCrud('Interventions', 'fa-file', Intervention::class);
        yield MenuItem::linkToCrud('KeyWords', 'fa-file', KeyWords::class);
    }
}
