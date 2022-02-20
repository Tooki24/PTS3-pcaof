<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName',TextType::class, [
                'label' => 'Votre Nom',
                'attr' => [
                    'placeholder' => 'Dupont Pierre',
                    'autocomplete' => 'on'
                ]
            ])
            ->add('email',EmailType::class, [
                'label' => 'Votre Email',
                'attr' => [
                    'placeholder' => 'dupont.pierre@gmail.com',
                    'autocomplete' => 'on'
                ]
            ])
            ->add('subject', TextType::class, [
                'label' => 'Objet',
                'attr' => [
                    'placeholder' => 'Subject',
                    'autocomplete' => 'on'
                ]
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
                    'rows' => 5,
                    'autocomplete' => 'on'

                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
