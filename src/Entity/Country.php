<?php

namespace App\Entity;

use App\Helper\CreatedAtTrait;
use App\Helper\DeletedAtTrait;
use App\Helper\UpdatedAtTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CountryRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Country
{
    use CreatedAtTrait;
    use UpdatedAtTrait;
    use DeletedAtTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="smallint", options={"unsigned":true})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150, unique=true)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Language", inversedBy="countries")
     */
    private $language;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Currency", inversedBy="countries")
     */
    private $currency;

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
     * @ORM\OneToMany(targetEntity="App\Entity\City", mappedBy="country")
     */
    private $cities;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductPromotion", mappedBy="country")
     */
    private $productPromotions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ShippingCountry", mappedBy="country")
     */
    private $shippingCountries;

    public function __construct()
    {
        $this->cities = new ArrayCollection();
        $this->productPromotions = new ArrayCollection();
        $this->shippingCountries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

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
     * @return Collection|City[]
     */
    public function getCities(): Collection
    {
        return $this->cities;
    }

    public function addCity(City $city): self
    {
        if (!$this->cities->contains($city)) {
            $this->cities[] = $city;
            $city->setCountry($this);
        }

        return $this;
    }

    public function removeCity(City $city): self
    {
        if ($this->cities->contains($city)) {
            $this->cities->removeElement($city);
            // set the owning side to null (unless already changed)
            if ($city->getCountry() === $this) {
                $city->setCountry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ProductPromotion[]
     */
    public function getProductPromotions(): Collection
    {
        return $this->productPromotions;
    }

    public function addProductPromotion(ProductPromotion $productPromotion): self
    {
        if (!$this->productPromotions->contains($productPromotion)) {
            $this->productPromotions[] = $productPromotion;
            $productPromotion->setCountry($this);
        }

        return $this;
    }

    public function removeProductPromotion(ProductPromotion $productPromotion): self
    {
        if ($this->productPromotions->contains($productPromotion)) {
            $this->productPromotions->removeElement($productPromotion);
            // set the owning side to null (unless already changed)
            if ($productPromotion->getCountry() === $this) {
                $productPromotion->setCountry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ShippingCountry[]
     */
    public function getShippingCountries(): Collection
    {
        return $this->shippingCountries;
    }

    public function addShippingCountry(ShippingCountry $shippingCountry): self
    {
        if (!$this->shippingCountries->contains($shippingCountry)) {
            $this->shippingCountries[] = $shippingCountry;
            $shippingCountry->setCountry($this);
        }

        return $this;
    }

    public function removeShippingCountry(ShippingCountry $shippingCountry): self
    {
        if ($this->shippingCountries->contains($shippingCountry)) {
            $this->shippingCountries->removeElement($shippingCountry);
            // set the owning side to null (unless already changed)
            if ($shippingCountry->getCountry() === $this) {
                $shippingCountry->setCountry(null);
            }
        }

        return $this;
    }
}
