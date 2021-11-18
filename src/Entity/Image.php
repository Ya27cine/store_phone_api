<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\UploadImageActionController;
use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ApiResource(
 *          attributes={
 *              "formats"={"json", "jsonld", "form"={"multipart/form-data"}}
 *          },
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
 * @Vich\Uploadable()
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @Vich\UploadableField(mapping="smartphones", fileNameProperty="url")
     * @Assert\NotNull
     */
    private $file;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $alt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
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


    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }
}
