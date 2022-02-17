<?php

namespace App\Controller\Admin;

use App\Entity\Revue;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FileField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class RevueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Revue::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            SlugField::new('slug')->setTargetFieldName('title'),
            TextField::new('theme'),
            TextField::new('resume'),
            DateTimeField::new('datePubli')->onlyOnIndex(),
            AssociationField::new('colloques'),
            AssociationField::new('articles'),
            TextField::new('imageFile')->setFormtype(VichImageType::class)->hideOnIndex(),
            ImageField::new('imageName')->setBasePath('/uploads/revue/image')->onlyOnIndex(),
            booleanField::new('onLine'),

        ];
    }

}
