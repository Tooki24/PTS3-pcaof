<?php

namespace App\Form;

use App\Entity\Colloque;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ColloqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateD')
            ->add('dateF')
            ->add('nom')
            ->add('lieu')
            ->add('description')
            ->add('people')
            ->add('revues')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Colloque::class,
        ]);
    }
}
