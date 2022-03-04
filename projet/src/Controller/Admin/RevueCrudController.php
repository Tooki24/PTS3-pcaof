<?php

namespace App\Controller\Admin;

use App\Entity\Revue;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FileField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;



class RevueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Revue::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),
            SlugField::new('slug')->setTargetFieldName('title')
                                    ->setTemplatePath('admin/field_custom.html.twig'),
            TextEditorField::new('resume', 'Résumé'),
            DateTimeField::new('datePubli', 'Date publi')->onlyOnIndex(),
            TextField::new('theme', 'Thème'),
            AssociationField::new('colloques'),
            AssociationField::new('articles'),
            TextField::new('imageFile')->setFormtype(VichImageType::class)->setLabel('Images')->hideOnIndex(),
            ImageField::new('imageName', 'Image')->setBasePath('/uploads/revue/image')->onlyOnIndex(),
            booleanField::new('onLine', 'En ligne'),

        ];
    }

}
