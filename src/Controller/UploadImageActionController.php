<?php

namespace App\Controller;

use ApiPlatform\Core\Validator\Exception\ValidationException;
use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Entity\Image;
use App\Form\ImageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class UploadImageActionController 
{
    private $formfactory;
    private $em;
    private $validator;


    public function __construct(
            FormFactoryInterface $formFactoryInterface,
            EntityManagerInterface $em,
            ValidatorInterface $validatorInterface)
    {
        $this->formfactory = $formFactoryInterface;
        $this->em = $em;
        $this->validator = $validatorInterface;
    }

    public function __invoke(Request $request)
    {
        $image = new Image();

        $form = $this->formfactory->create(ImageType::class, $image);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid() ){
        
            $this->em->persist($image);
            $this->em->flush();

            return $image;
        }

        throw  new ValidationException(
            $this->validator->validate($image)
        );


    }
    
}
