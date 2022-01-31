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
            SlugField::new('slug')->setTargetFieldName('title'),
            TextEditorField::new('resume'),
            TextField::new('imageFile')->setFormtype(VichImageType::class)->hideOnIndex(),
            ImageField::new('imageName')->setBasePath('/uploads/publication/image')->onlyOnIndex(),
            TextField::new('pdfFile')->setFormtype(VichFileType::class)->hideOnIndex(),
            AssociationField::new('people'),
            AssociationField::new('keyWords'),
            DateTimeField::new('datePubli')->onlyOnIndex(),

        ];
    }

    public function configureCrud (Crud $crud): Crud
    {
        return $crud
        -> setDefaultSort(['datePubli' => 'DESC']);
    }
}
