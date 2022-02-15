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
            TextField::new('name'),
            SlugField::new('slug')->setTargetFieldName('name'),
            DateField::new('dateD'),
            DateField::new('dateF'),
            TextField::new('lieu'),
            TextField::new('description'),
            TextField::new('theme'),
            //AssociationField::new('revue')->renderAsNativeWidget(),
            TextField::new('planningPdfFile')->setFormtype(VichFileType::class)->hideOnIndex(),
            BooleanField::new('isPcaof'),
            BooleanField::new('onLine'),
        ];
    }

}
