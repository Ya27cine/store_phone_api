<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\SmartphoneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      attributes={
 *                 "order"={"id": "DESC"},
 *                 "formats"={"json", "jsonld"}
 *      }
 * )
 * @ORM\Entity(repositoryClass=SmartphoneRepository::class)
 */
class Smartphone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // /**
    //  * @ORM\Column(type="string", length=255)
    //  */
    // private $Marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Model;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Image::class, cascade={"persist"})
     * @ORM\JoinTable()
     * @ApiSubresource()
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity=StockSmartphone::class, mappedBy="smartphone")
     * @ApiSubresource()
     */
    private $stockSmartphones;

    /**
     * @ORM\ManyToOne(targetEntity=Marque::class, inversedBy="smartphones")
     */
    private $Marque;

    public function __construct()
    {
        $this->stockSmartphones = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->Model;
    }

    public function setModel(string $Model): self
    {
        $this->Model = $Model;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|StockSmartphone[]
     */
    public function getStockSmartphones(): Collection
    {
        return $this->stockSmartphones;
    }

    public function addStockSmartphone(StockSmartphone $stockSmartphone): self
    {
        if (!$this->stockSmartphones->contains($stockSmartphone)) {
            $this->stockSmartphones[] = $stockSmartphone;
            $stockSmartphone->setSmartphone($this);
        }

        return $this;
    }

    public function removeStockSmartphone(StockSmartphone $stockSmartphone): self
    {
        if ($this->stockSmartphones->removeElement($stockSmartphone)) {
            // set the owning side to null (unless already changed)
            if ($stockSmartphone->getSmartphone() === $this) {
                $stockSmartphone->setSmartphone(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        $this->images->removeElement($image);

        return $this;
    }

    public function __toString()
    {
        return $this->getMarque()." - ".$this->getName();
    }

    public function getMarque(): ?Marque
    {
        return $this->Marque;
    }

    public function setMarque(?Marque $Marque): self
    {
        $this->Marque = $Marque;

        return $this;
    }
}
