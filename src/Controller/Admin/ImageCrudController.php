<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use App\Form\ImageType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichFileType;

class ImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Image::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('imageFile', 'Image')->setFormType(VichFileType::class)->onlyOnForms(),
            ImageField::new('imageName', 'upload')->setBasePath('/images/smartphones')->hideOnForm(),
        ];
    }
    
}
