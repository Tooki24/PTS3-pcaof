<?php

namespace App\Controller\Admin;

use App\Entity\Colloque;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FileField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class ColloqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Colloque::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name','Nom'),
            SlugField::new('slug')->setTargetFieldName('name')->setTemplatePath('admin/field_custom.html.twig'),
            TextareaField::new('description','Description'),
            DateField::new('dateD','Date Debut'),
            DateField::new('dateF','Date Fin'),
            TextField::new('place','Lieu'),
            TextField::new('theme','Thème'),
            TextField::new('planningPdfFile','Le planning au format PDF')->setFormtype(VichFileType::class)->hideOnIndex(),
            TextField::new('planningPdfName','PDF')->onlyOnIndex(),
            AssociationField::new('keyWords','Mot(s)-clé(s)'),
            BooleanField::new('isPcaof','Par PCAoF'),
            BooleanField::new('onLine','En ligne'),
        ];
    }

}
