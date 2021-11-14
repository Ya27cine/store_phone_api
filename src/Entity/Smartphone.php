<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SmartphoneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
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

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Marque;

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
     * @ORM\OneToMany(targetEntity=StockSmartphone::class, mappedBy="Smartphone")
     */
    private $stockSmartphones;

    public function __construct()
    {
        $this->stockSmartphones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->Marque;
    }

    public function setMarque(string $Marque): self
    {
        $this->Marque = $Marque;

        return $this;
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
}
