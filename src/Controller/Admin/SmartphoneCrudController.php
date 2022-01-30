<?php

namespace App\Controller\Admin;

use App\Entity\Smartphone;
use App\Form\ImageType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Vich\UploaderBundle\Form\Type\VichFileType;

class SmartphoneCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Smartphone::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),


          //  AssociationField::new( 'images.imageFile')->setQueryBuilder(),
           // ImageField::new('images[0].imageName', 'upload')->setBasePath('/images/smartphones')->hideOnForm(),
            
            TextField::new('model'),
            TextField::new('marque'),
            TextField::new('name'),
            TextareaField::new('description'),
        ];
    }
    
}






