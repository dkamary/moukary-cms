<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductPriceRepository")
 * @ORM\Table(
 *      name="product_price",
 *      indexes={
 *          @ORM\Index(name="IDX_product_price_status", columns={"status"})
 *      }
 * )
 */
class ProductPrice
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="productPrices")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Currency")
     * @ORM\JoinColumn(nullable=false)
     */
    private $currency;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Vat")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $priceVatExc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $priceVatInc;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    public function setCurrency(?Currency $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getVat(): ?Vat
    {
        return $this->vat;
    }

    public function setVat(?Vat $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    public function getPriceVatExc(): ?float
    {
        return $this->priceVatExc;
    }

    public function setPriceVatExc(?float $priceVatExc): self
    {
        $this->priceVatExc = $priceVatExc;

        return $this;
    }

    public function getPriceVatInc(): ?float
    {
        return $this->priceVatInc;
    }

    public function setPriceVatInc(?float $priceVatInc): self
    {
        $this->priceVatInc = $priceVatInc;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
