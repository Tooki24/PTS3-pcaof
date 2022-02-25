<?php

namespace App\Controller\Admin;

use App\Entity\Person;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FileField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Form\Type\VichFileType;


class PersonCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Person::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel(''),
            TextField::new('name', 'Nom'),
            TextField::new('firstName', 'Prénom'),
            booleanField::new('isOffice', 'Membre PCAoF'),
            FormField::addPanel('à completer seulement le membres fais partie bureau de PCAOF'),//TODO faire verifier l'orthographe
            TextField::new('role'),
            TextField::new('photoFile')->setFormtype(VichImageType::class)->hideOnIndex(),

        ];


    }


    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
