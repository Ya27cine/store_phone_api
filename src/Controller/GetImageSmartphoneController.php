<?php 

namespace App\Controller;

use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;

class GetImageSmartphoneController  extends AbstractController{


    protected $targetDirectory;

    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    /**
     * @Route("upload/images/{name}")
     */

     public function hi($name){

        try {
            $fileImage =  new File($this->targetDirectory.'/'.$name);

           
            //$publicResourcesFolderPath = $this->targetDirectory;

             return new BinaryFileResponse($fileImage);
           // return new Response($publicResourcesFolderPath);

        } catch (\Throwable $th) {
           // $post->setImage(  );
        }

     }

} 










?>