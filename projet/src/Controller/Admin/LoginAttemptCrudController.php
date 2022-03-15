<?php

namespace App\Controller\Admin;

use App\Entity\LoginAttempt;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class LoginAttemptCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LoginAttempt::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Tentative de connexion')
            -> setDefaultSort(['date' => 'DESC'])
            ;
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // ...
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_INDEX, Action::EDIT)
            ;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('username', 'login'),
            TextField::new('ipAddress', 'Adresse IP'),
            DateTimeField::new('date', 'Date de tentative')
        ];
    }

}
