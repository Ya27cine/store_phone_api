<?php 

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Smartphone;
use App\Repository\ImageRepository;
use App\Repository\SmartphoneRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\AST\NewObjectExpression;
use Exception;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;

class GetImageSmartphoneController  extends AbstractController{


    protected $targetDirectory;
    private $em;

    public function __construct($targetDirectory )
    {
        $this->targetDirectory = $targetDirectory;
    }


    /**
     * @Route("api/images/data/{id}")
     */

     public function loadingimage($id, SmartphoneRepository $smartphoneRepository){

        try {

         $obj   = new Smartphone();
         $obj = $smartphoneRepository->find($id);
            // take index 0, smartphone has one image .
         $imageName = $obj->getImages()[0]->getImageName();
         $fileImage =  new File($this->targetDirectory.'/'. $imageName );

         return new BinaryFileResponse($fileImage);

        } catch (\Throwable $error) {
           return new Response(null, 400);
          
        }
      return new Response(null, 200);
     }

	/**
	 * 
	 * @return mixed
	 */
	function getEm() {
		return $this->em;
	}
	
	/**
	 * 
	 * @param mixed $em 
	 * @return GetImageSmartphoneController
	 */
	function setEm($em): self {
		$this->em = $em;
		return $this;
	}
} 










?>