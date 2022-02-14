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
            TextField::new('title'),
            SlugField::new('slug')->setTargetFieldName('title'),
            TextField::new('resume'),
            TextField::new('imageFile')->setFormtype(VichImageType::class)->hideOnIndex(),
            ImageField::new('imageName')->setBasePath('/uploads/publication/image')->onlyOnIndex(),
            TextField::new('pdfFile')->setFormtype(VichImageType::class)->hideOnIndex(),
            AssociationField::new('people'),
            AssociationField::new('revue'),
            BooleanField::new('Online'),

            DateTimeField::new('datePubli')->onlyOnIndex()
        ];
    }

    public function configureCrud(crud $crud): Crud
    {
        return $crud
            -> setDefaultSort(['revue' => 'DESC']);
    }

}
