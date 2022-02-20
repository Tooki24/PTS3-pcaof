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
            SlugField::new('slug')->setTargetFieldName('title'),
            TextField::new('resume'),
            TextField::new('imageFile')->setFormtype(VichImageType::class)->hideOnIndex(),
            ImageField::new('imageName')->setBasePath('/uploads/publication/image')->onlyOnIndex(),
            TextField::new('pdfFile')->setFormtype(VichFileType::class),
            TextField::new('pdfName')->onlyOnIndex(),
            AssociationField::new('people'),
            //TODO créé un obtion pour créé un nouvelle entitér depuis le crud de la Publication
            AssociationField::new('keyWords'),
            BooleanField::new('onLine'),
            DateTimeField::new('datePubli')->onlyOnIndex(),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['datePubli' => 'DESC']);
    }
}
