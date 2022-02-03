<?php

namespace App\Form;

use App\Entity\StockSmartphone;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Smartphone;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

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
            ->add('state', ChoiceType::class, [
                'label' => "State",
                'choices'  => [
                    'Unknown' => null,
                    'New' => true,
                    'Used' => false,
                ],
            ])
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
