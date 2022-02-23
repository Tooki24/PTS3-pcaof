<?php

namespace App\Controller\Admin;

use App\Entity\Article;
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

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title','Titre'),
            SlugField::new('slug')->setTargetFieldName('title'),
            TextField::new('resume','Résumé'),
            TextField::new('imageFile','Image d\'illustration')->setFormtype(VichImageType::class)->hideOnIndex(),
            ImageField::new('imageName','Image d\'illustration')->setBasePath('/uploads/article/image')->onlyOnIndex(),
            TextField::new('pdfFile','L\'article Au format PDF')->setFormtype(VichImageType::class),
            TextField::new('pdfName','Le PDF')->onlyOnIndex(),
            AssociationField::new('people','le(s) Auteur(s)de l\'article' ),
            AssociationField::new('revue','La revue de l\'article'),
            BooleanField::new('Online','En ligne'),
            DateTimeField::new('datePubli','date de création/modification')->onlyOnIndex()
        ];
    }

    public function configureCrud(crud $crud): Crud
    {
        return $crud
            -> setDefaultSort(['revue' => 'DESC']);
    }

}
