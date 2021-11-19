<?php

namespace App\Controller\Admin;

use App\Entity\StockSmartphone;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class StockSmartphoneCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StockSmartphone::class;
    }

    
    public function configureFields(string $pageName): iterable
    {

        if(Crud::PAGE_NEW === $pageName){
            return [
                IdField::new('id')->hideOnForm(),
                TextField::new('color'),
                AssociationField::new('smartphone') ->setFormTypeOptions([
                    'by_reference' => false,
                ]),
                NumberField::new('rom'),
                NumberField::new('quantity'),
                NumberField::new('price'),
            ];
        }

        return [
            IdField::new('id')->hideOnForm(),
          //  ImageField::new('smartphone.images.url', 'Photo')->setBasePath('/images/smartphones')->hideOnForm(),
            TextField::new('smartphone.marque', 'Marque'),
            TextField::new('smartphone.name', 'Name'),
            TextField::new('color'),
            NumberField::new('rom'),
            NumberField::new('quantity'),
            NumberField::new('price'),
        ];
    }
    
}
