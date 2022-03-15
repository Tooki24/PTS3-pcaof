<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Colloque;
use App\Entity\Intervention;
use App\Entity\KeyWords;
use App\Entity\Person;
use App\Entity\Publication;
use App\Entity\Revue;
use App\Entity\Admin;
use App\Repository\ArticleRepository;
use App\Repository\ColloqueRepository;
use App\Repository\PersonRepository;
use App\Repository\PublicationRepository;
use App\Repository\RevueRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use Symfony\Component\Security\Core\User\UserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;



class DashboardController extends AbstractDashboardController
{
    protected $revueRepository;
    protected $articleRepository;
    protected $colloqueRepository;
    protected $publicationRepository;
    protected  $personRepository;

    public function __construct(
                                RevueRepository $revueRepository,
                                ArticleRepository $articleRepository,
                                ColloqueRepository $colloqueRepository,
                                PublicationRepository $publicationRepository,
                                PersonRepository $personRepository
    )
    {
        $this->revueRepository = $revueRepository;
        $this->articleRepository = $articleRepository;
        $this->colloqueRepository = $colloqueRepository;
        $this->publicationRepository = $publicationRepository;
        $this->personRepository = $personRepository;
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {


        return $this->render('admin/dashboard.html.twig', [
            'countAllRevue' => $this->revueRepository->countAll(),
            'countAllArticle' => $this->articleRepository->countAll(),
            'countAllColloque' => $this->colloqueRepository->countAll(),
            'countAllPublication' => $this->publicationRepository->countAll(),
            'persons' => $this->personRepository->findAll()
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img src="img/logo/logoColor.png"> PCAoF <span class="text-small text-center">Admin</span>')
            ->setFaviconPath('img/favicon/favicon-32x32.png')
            ;
    }

    public function configureAssets() : Assets{
        return Assets::new()
            ->addCssFile('css/easyAdmin.css');
    }

    public function configureMenuItems(): iterable
    {
        //TODO ajouter des jolies icones pour chaques categories
        //yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Colloques', 'fa fa-solid fa-calendar', Colloque::class);
        yield MenuItem::linkToCrud('Revue', 'fa fa-file', Revue::class);
        yield MenuItem::linkToCrud('Article', 'fa fa-solid fa-newspaper', Article::class);
        yield MenuItem::linkToCrud('Publications', 'fa fa-file', Publication::class);
        yield MenuItem::linkToCrud('Auteurs', 'fa fa_secret fa-user', Person::class);
        yield MenuItem::linkToCrud('KeyWords', 'fa fa-file', KeyWords::class);
        yield MenuItem::linkToCrud('Paramètre','fa fa-solid fa-gear', Admin::class);
    }

    public function configureUserMenu(UserInterface $user) : UserMenu{
        return parent::configureUserMenu($user)
            ->setName($user->getUsername())
            ->setGravatarEmail('https://img.icons8.com/external-dreamstale-lineal-dreamstale/32/000000/external-avatar-avatars-dreamstale-lineal-dreamstale-3.png')
            ->displayUserAvatar(true);
    }
}
