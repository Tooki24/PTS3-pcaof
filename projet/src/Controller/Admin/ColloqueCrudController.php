<?php

namespace App\Controller\Admin;

use App\Entity\Colloque;
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
            SlugField::new('slug')->setTargetFieldName('name'),
            DateField::new('dateD','Date de debut'),
            DateField::new('dateF','Date de fin'),
            TextField::new('place','Lieu'),
            TextField::new('description','Description'),
            TextField::new('theme','Theme'),
            //AssociationField::new('revue')->renderAsNativeWidget(),
            TextField::new('planningPdfFile','Le planning au format PDF')->setFormtype(VichFileType::class),
            AssociationField::new('keyWords','Mot(s)-clé(s)'),
            BooleanField::new('isPcaof','Colloque organisée pas PCAOF'),
            BooleanField::new('onLine','En ligne'),
        ];
    }

}
