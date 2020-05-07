<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PromotionRepository")
 * @ORM\Table(
 *      name="promotion",
 *      indexes={
 *          @ORM\Index(name="IDX_promotion_start_at", columns={"start_at"}),
 *          @ORM\Index(name="IDX_promotion_end_at", columns={"end_at"}),
 *          @ORM\Index(name="IDX_promotion_dates", columns={"start_at", "end_at"})
 *      }
 * )
 */
class Promotion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="smallint", options={"unsigned":true})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Post")
     * @ORM\JoinColumn(nullable=false)
     */
    private $post;

    /**
     * @ORM\Column(type="smallint", options={"unsigned":true})
     */
    private $typeId;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $percent;

    /**
     * @ORM\Column(type="smallint", nullable=true, options={"unsigned":true})
     */
    private $count;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $amountVatExc;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product")
     */
    private $offered;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $endAt;

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
     * @ORM\OneToMany(targetEntity="App\Entity\PromotionLang", mappedBy="promotion")
     */
    private $promotionLangs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductPromotion", mappedBy="promotion")
     */
    private $productPromotions;

    public function __construct()
    {
        $this->promotionLangs = new ArrayCollection();
        $this->productPromotions = new ArrayCollection();
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

    public function getTypeId(): ?int
    {
        return $this->typeId;
    }

    public function setTypeId(int $typeId): self
    {
        $this->typeId = $typeId;

        return $this;
    }

    public function getPercent(): ?float
    {
        return $this->percent;
    }

    public function setPercent(?float $percent): self
    {
        $this->percent = $percent;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(?int $count): self
    {
        $this->count = $count;

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

    public function getOffered(): ?Product
    {
        return $this->offered;
    }

    public function setOffered(?Product $offered): self
    {
        $this->offered = $offered;

        return $this;
    }

    public function getStartAt(): ?\DateTimeInterface
    {
        return $this->startAt;
    }

    public function setStartAt(\DateTimeInterface $startAt): self
    {
        $this->startAt = $startAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->endAt;
    }

    public function setEndAt(\DateTimeInterface $endAt): self
    {
        $this->endAt = $endAt;

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
     * @return Collection|PromotionLang[]
     */
    public function getPromotionLangs(): Collection
    {
        return $this->promotionLangs;
    }

    public function addPromotionLang(PromotionLang $promotionLang): self
    {
        if (!$this->promotionLangs->contains($promotionLang)) {
            $this->promotionLangs[] = $promotionLang;
            $promotionLang->setPromotion($this);
        }

        return $this;
    }

    public function removePromotionLang(PromotionLang $promotionLang): self
    {
        if ($this->promotionLangs->contains($promotionLang)) {
            $this->promotionLangs->removeElement($promotionLang);
            // set the owning side to null (unless already changed)
            if ($promotionLang->getPromotion() === $this) {
                $promotionLang->setPromotion(null);
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
            $productPromotion->setPromotion($this);
        }

        return $this;
    }

    public function removeProductPromotion(ProductPromotion $productPromotion): self
    {
        if ($this->productPromotions->contains($productPromotion)) {
            $this->productPromotions->removeElement($productPromotion);
            // set the owning side to null (unless already changed)
            if ($productPromotion->getPromotion() === $this) {
                $productPromotion->setPromotion(null);
            }
        }

        return $this;
    }
}
