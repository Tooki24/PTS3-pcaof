<?php

namespace App\Controller\Admin;

use App\Entity\Revue;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RevueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Revue::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
