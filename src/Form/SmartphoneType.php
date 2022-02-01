<?php

namespace App\Form;

use App\Entity\Image;
use App\Entity\Marque;
use App\Entity\Smartphone;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SmartphoneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Marque', EntityType::class, [
                'class' => Marque::class,
                'choice_label' => 'name'
            ])
            ->add('Model')
            ->add('Name')
            ->add('description')
            ->add('images', FileType::class, [
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Smartphone::class,
        ]);
    }
}
