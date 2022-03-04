<?php

namespace App\Controller\Admin;

use App\Entity\Publication;
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

class PublicationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Publication::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            SlugField::new('slug')->setTargetFieldName('title')->setTemplatePath('admin/field_custom.html.twig'),
            TextEditorField::new('resume', 'Résumé'),
            TextField::new('imageFile', 'Image')->setFormtype(VichImageType::class)->hideOnIndex(),
            ImageField::new('imageName', 'Image')->setBasePath('/uploads/publication/image')->onlyOnIndex(),
            TextField::new('pdfFile', 'L\'article Au format PDF')->setFormtype(VichFileType::class)->hideOnIndex(),
            TextField::new('pdfName', 'PDF')->onlyOnIndex(),
            AssociationField::new('people', 'Auteur'),
            //TODO créé un obtion pour créé un nouvelle entitér depuis le crud de la Publication
            AssociationField::new('keyWords', 'Mot(s)-clé(s)'),
            BooleanField::new('onLine', 'En ligne'),
            DateTimeField::new('datePubli')->onlyOnIndex(),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['datePubli' => 'DESC']);
    }
}
