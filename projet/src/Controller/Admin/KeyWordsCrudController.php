<?php

namespace App\Controller\Admin;

use App\Entity\KeyWords;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;


class KeyWordsCrudController extends AbstractCrudController{

    public function configureCrud(Crud $crud): Crud
    {
    return $crud
        ->setPageTitle('index', 'Mots Clés')
        ;
    }

    public static function getEntityFqcn(): string
    {
        return KeyWords::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('word', 'Mot(s)-clé(s)'),
        ];
    }

}
