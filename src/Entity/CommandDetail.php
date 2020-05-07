<?php

namespace App\Entity;

use App\Helper\CreatedAtTrait;
use App\Helper\DeletedAtTrait;
use App\Helper\UpdatedAtTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandDetailRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class CommandDetail
{
    use CreatedAtTrait;
    use UpdatedAtTrait;
    use DeletedAtTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Command", inversedBy="commandDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $command;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $priceVatExc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $priceVatInc;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Vat")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $vatPercent;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $amountVatExc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $amountVatInc;

    /**
     * @ORM\Column(type="smallint", nullable=true, options={"unsigned":true})
     */
    private $quantity;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommand(): ?Command
    {
        return $this->command;
    }

    public function setCommand(?Command $command): self
    {
        $this->command = $command;

        return $this;
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

    public function getVat(): ?Vat
    {
        return $this->vat;
    }

    public function setVat(?Vat $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    public function getVatPercent(): ?float
    {
        return $this->vatPercent;
    }

    public function setVatPercent(?float $vatPercent): self
    {
        $this->vatPercent = $vatPercent;

        return $this;
    }

    public function getAmountVatExc(): ?float
    {
        return $this->amountVatExc;
    }

    public function setAmountVatExc(?float $amountVatExc): self
    {
        $this->amountVatExc = $amountVatExc;

        return $this;
    }

    public function getAmountVatInc(): ?float
    {
        return $this->amountVatInc;
    }

    public function setAmountVatInc(?float $amountVatInc): self
    {
        $this->amountVatInc = $amountVatInc;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?\DateTimeInterface $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }
}
