<?php

namespace App\Form;

use App\Entity\StockSmartphone;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Smartphone;

class StockSmartphoneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('color')
            ->add('rom')
            ->add('ram')
            ->add('year')
            ->add('price')
            ->add('quantity')
            ->add('status')
            ->add('imei')
            ->add('sn')
            // ->add('smartphone', EntityType::class, [
            //     'data_class' => Smartphone::class,
            //     'choice_label' => 'name'
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StockSmartphone::class,
        ]);
    }
}
