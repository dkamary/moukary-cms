<?php

namespace App\Entity;

use App\Helper\CreatedAtTrait;
use App\Helper\DeletedAtTrait;
use App\Helper\UpdatedAtTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(
 *      name="product",
 *      indexes={
 *          @ORM\Index(name="IDX_product_name", columns={"name"})
 *      }
 * )
 */
class Product
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Post")
     * @ORM\JoinColumn(nullable=false)
     */
    private $post;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Post")
     */
    private $brand;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=13, nullable=true, unique=true)
     */
    private $aen13;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $width;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $height;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $length;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $volume;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $quantityMin;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $quantityMax;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isNew;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isFeatured;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isPromotion;

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
     * @ORM\OneToMany(targetEntity="App\Entity\ProductShipping", mappedBy="product")
     */
    private $productShippings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductPrice", mappedBy="product")
     */
    private $productPrices;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductStock", mappedBy="product")
     */
    private $productStocks;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductPromotion", mappedBy="product")
     */
    private $productPromotions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductComment", mappedBy="product")
     */
    private $productComments;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Post")
     */
    private $image;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    public function __construct()
    {
        $this->productShippings = new ArrayCollection();
        $this->productPrices = new ArrayCollection();
        $this->productStocks = new ArrayCollection();
        $this->productPromotions = new ArrayCollection();
        $this->productComments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(?Post $post): self
    {
        $this->post = $post;

        return $this;
    }

    public function getBrand(): ?Post
    {
        return $this->brand;
    }

    public function setBrand(?Post $brand): self
    {
        $this->brand = $brand;

        return $this;
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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getAen13(): ?string
    {
        return $this->aen13;
    }

    public function setAen13(?string $aen13): self
    {
        $this->aen13 = $aen13;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(?int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function setLength(?int $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getVolume(): ?int
    {
        return $this->volume;
    }

    public function setVolume(?int $volume): self
    {
        $this->volume = $volume;

        return $this;
    }

    public function getQuantityMin(): ?int
    {
        return $this->quantityMin;
    }

    public function setQuantityMin(?int $quantityMin): self
    {
        $this->quantityMin = $quantityMin;

        return $this;
    }

    public function getQuantityMax(): ?int
    {
        return $this->quantityMax;
    }

    public function setQuantityMax(?int $quantityMax): self
    {
        $this->quantityMax = $quantityMax;

        return $this;
    }

    public function getIsNew(): ?bool
    {
        return $this->isNew;
    }

    public function setIsNew(?bool $isNew): self
    {
        $this->isNew = $isNew;

        return $this;
    }

    public function getIsFeatured(): ?bool
    {
        return $this->isFeatured;
    }

    public function setIsFeatured(?bool $isFeatured): self
    {
        $this->isFeatured = $isFeatured;

        return $this;
    }

    public function getIsPromotion(): ?bool
    {
        return $this->isPromotion;
    }

    public function setIsPromotion(?bool $isPromotion): self
    {
        $this->isPromotion = $isPromotion;

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

    /**
     * @return Collection|ProductShipping[]
     */
    public function getProductShippings(): Collection
    {
        return $this->productShippings;
    }

    public function addProductShipping(ProductShipping $productShipping): self
    {
        if (!$this->productShippings->contains($productShipping)) {
            $this->productShippings[] = $productShipping;
            $productShipping->setProduct($this);
        }

        return $this;
    }

    public function removeProductShipping(ProductShipping $productShipping): self
    {
        if ($this->productShippings->contains($productShipping)) {
            $this->productShippings->removeElement($productShipping);
            // set the owning side to null (unless already changed)
            if ($productShipping->getProduct() === $this) {
                $productShipping->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ProductPrice[]
     */
    public function getProductPrices(): Collection
    {
        return $this->productPrices;
    }

    public function addProductPrice(ProductPrice $productPrice): self
    {
        if (!$this->productPrices->contains($productPrice)) {
            $this->productPrices[] = $productPrice;
            $productPrice->setProduct($this);
        }

        return $this;
    }

    public function removeProductPrice(ProductPrice $productPrice): self
    {
        if ($this->productPrices->contains($productPrice)) {
            $this->productPrices->removeElement($productPrice);
            // set the owning side to null (unless already changed)
            if ($productPrice->getProduct() === $this) {
                $productPrice->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ProductStock[]
     */
    public function getProductStocks(): Collection
    {
        return $this->productStocks;
    }

    public function addProductStock(ProductStock $productStock): self
    {
        if (!$this->productStocks->contains($productStock)) {
            $this->productStocks[] = $productStock;
            $productStock->setProduct($this);
        }

        return $this;
    }

    public function removeProductStock(ProductStock $productStock): self
    {
        if ($this->productStocks->contains($productStock)) {
            $this->productStocks->removeElement($productStock);
            // set the owning side to null (unless already changed)
            if ($productStock->getProduct() === $this) {
                $productStock->setProduct(null);
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
            $productPromotion->setProduct($this);
        }

        return $this;
    }

    public function removeProductPromotion(ProductPromotion $productPromotion): self
    {
        if ($this->productPromotions->contains($productPromotion)) {
            $this->productPromotions->removeElement($productPromotion);
            // set the owning side to null (unless already changed)
            if ($productPromotion->getProduct() === $this) {
                $productPromotion->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ProductComment[]
     */
    public function getProductComments(): Collection
    {
        return $this->productComments;
    }

    public function addProductComment(ProductComment $productComment): self
    {
        if (!$this->productComments->contains($productComment)) {
            $this->productComments[] = $productComment;
            $productComment->setProduct($this);
        }

        return $this;
    }

    public function removeProductComment(ProductComment $productComment): self
    {
        if ($this->productComments->contains($productComment)) {
            $this->productComments->removeElement($productComment);
            // set the owning side to null (unless already changed)
            if ($productComment->getProduct() === $this) {
                $productComment->setProduct(null);
            }
        }

        return $this;
    }

    public function getImage(): ?Post
    {
        return $this->image;
    }

    public function setImage(?Post $image): self
    {
        $this->image = $image;

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
