<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use App\Repository\StockSmartphoneRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;



/**
 * 
 * @ApiFilter(PropertyFilter::class,
 *      arguments={
 *           "parameterName": "properties",
 *           "overrideDefaultProperties": false,
 *           "whitelist": {"id", "color", "rom", "ram", "price"}
 *      }
 * )
 * 
 * @ApiResource(
 *      attributes={
 *                 "order"={"id": "DESC"}
 *      }
 * )
 * @ORM\Entity(repositoryClass=StockSmartphoneRepository::class)
 */
class StockSmartphone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $color;

    /**
     * @ORM\Column(type="integer")
     */
    private $rom;

    /**
     * @ORM\Column(type="integer")
     */
    private $ram;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=Smartphone::class, inversedBy="stockSmartphones")
     */
    private $smartphone;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $imei;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $sn;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getRom(): ?int
    {
        return $this->rom;
    }

    public function setRom(int $ROM): self
    {
        $this->rom = $ROM;

        return $this;
    }

    public function getRam(): ?int
    {
        return $this->ram;
    }

    public function setRam(int $RAM): self
    {
        $this->ram = $RAM;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getSmartphone(): ?Smartphone
    {
        return $this->smartphone;
    }

    public function setSmartphone(?Smartphone $Smartphone): self
    {
        $this->smartphone = $Smartphone;

        return $this;
    }

    public function getImei(): ?string
    {
        return $this->imei;
    }

    public function setImei(string $imei): self
    {
        $this->imei = $imei;

        return $this;
    }

    public function getSn(): ?string
    {
        return $this->sn;
    }

    public function setSn(?string $sn): self
    {
        $this->sn = $sn;

        return $this;
    }
}
