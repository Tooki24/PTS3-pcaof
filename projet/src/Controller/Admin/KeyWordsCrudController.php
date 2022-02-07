<?php

namespace App\Controller\Admin;

use App\Entity\KeyWords;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class KeyWordsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return KeyWords::class;
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
