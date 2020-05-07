<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShippingRepository")
 */
class Shipping
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="smallint", options={"unsigned":true})
     */
    private $id;

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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ShippingLang", mappedBy="shipping")
     */
    private $shippingLangs;

    public function __construct()
    {
        $this->shippingLangs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|ShippingLang[]
     */
    public function getShippingLangs(): Collection
    {
        return $this->shippingLangs;
    }

    public function addShippingLang(ShippingLang $shippingLang): self
    {
        if (!$this->shippingLangs->contains($shippingLang)) {
            $this->shippingLangs[] = $shippingLang;
            $shippingLang->setShipping($this);
        }

        return $this;
    }

    public function removeShippingLang(ShippingLang $shippingLang): self
    {
        if ($this->shippingLangs->contains($shippingLang)) {
            $this->shippingLangs->removeElement($shippingLang);
            // set the owning side to null (unless already changed)
            if ($shippingLang->getShipping() === $this) {
                $shippingLang->setShipping(null);
            }
        }

        return $this;
    }
}
