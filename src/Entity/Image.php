<?php

namespace App\Entity;

use Symfony\Component\HttpFoundation\File\File;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\UploadImageActionController;
use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Entity\Smartphone;


use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ApiResource(
 *          attributes={
 *              "formats"={"json", "jsonld", "form"={"multipart/form-data"}}
 *          },
 *          normalizationContext={"groups"={"read"}},
 *          collectionOperations={
 *                      "get",
 *                      "post"={
 *                              "method"="POST", 
 *                              "path"="/images",
 *                              "controller"=UploadImageActionController::class,
 *                               "defaults"={"_api_receive"=false}
 *                      }
 *          }
 * )
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 * @Vich\Uploadable
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("read")
     */
    private $id;


    /**
     * @Vich\UploadableField(mapping="smartphones", fileNameProperty="imageName")
     * @Assert\NotNull
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageName;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $alt;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(?string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }


	/**
	 * 
	 * @return mixed
	 */
	function getImageName() {
		return $this->imageName;
	}
	
	/**
	 * 
	 * @param mixed $imageName 
	 * @return Image
	 */
	function setImageName($imageName): self {
		$this->imageName = $imageName;
		return $this;
	}


    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

    }

    public function getImageFile()
    {
        return $this->imageFile;
    }
	/**
	 * 
	 * @return mixed
	 */
	function getSmartphone() {
		return $this->smartphone;
	}
	
	/**
	 * 
	 * @param mixed $smartphone 
	 * @return Image
	 */
	function setSmartphone($smartphone): self {
		$this->smartphone = $smartphone;
		return $this;
	}
}
