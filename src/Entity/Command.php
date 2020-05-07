<?php

namespace App\Entity;

use App\Helper\CreatedAtTrait;
use App\Helper\DeletedAtTrait;
use App\Helper\UpdatedAtTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Command
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
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="commands")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=50, nullable=true, unique=true)
     */
    private $sessionId;

    /**
     * @ORM\Column(type="string", length=50, nullable=true, unique=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $subTotalVatExc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $subTotalVatInc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $totalVat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reductionLabel;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $reduction;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Shipping")
     */
    private $shipping;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $shippingLabel;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $shippingValue;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $totalVatInc;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CommandStatus")
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Address")
     */
    private $billingAddress;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Address")
     */
    private $shippingAddress;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CommandDetail", mappedBy="command")
     */
    private $commandDetails;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deletedAt;

    public function __construct()
    {
        $this->commandDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }

    public function setSessionId(?string $sessionId): self
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getSubTotalVatExc(): ?float
    {
        return $this->subTotalVatExc;
    }

    public function setSubTotalVatExc(?float $subTotalVatExc): self
    {
        $this->subTotalVatExc = $subTotalVatExc;

        return $this;
    }

    public function getSubTotalVatInc(): ?float
    {
        return $this->subTotalVatInc;
    }

    public function setSubTotalVatInc(?float $subTotalVatInc): self
    {
        $this->subTotalVatInc = $subTotalVatInc;

        return $this;
    }

    public function getTotalVat(): ?float
    {
        return $this->totalVat;
    }

    public function setTotalVat(?float $totalVat): self
    {
        $this->totalVat = $totalVat;

        return $this;
    }

    public function getReductionLabel(): ?string
    {
        return $this->reductionLabel;
    }

    public function setReductionLabel(?string $reductionLabel): self
    {
        $this->reductionLabel = $reductionLabel;

        return $this;
    }

    public function getReduction(): ?float
    {
        return $this->reduction;
    }

    public function setReduction(?float $reduction): self
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getShipping(): ?Shipping
    {
        return $this->shipping;
    }

    public function setShipping(?Shipping $shipping): self
    {
        $this->shipping = $shipping;

        return $this;
    }

    public function getShippingLabel(): ?string
    {
        return $this->shippingLabel;
    }

    public function setShippingLabel(?string $shippingLabel): self
    {
        $this->shippingLabel = $shippingLabel;

        return $this;
    }

    public function getShippingValue(): ?float
    {
        return $this->shippingValue;
    }

    public function setShippingValue(?float $shippingValue): self
    {
        $this->shippingValue = $shippingValue;

        return $this;
    }

    public function getTotalVatInc(): ?float
    {
        return $this->totalVatInc;
    }

    public function setTotalVatInc(?float $totalVatInc): self
    {
        $this->totalVatInc = $totalVatInc;

        return $this;
    }

    public function getStatus(): ?CommandStatus
    {
        return $this->status;
    }

    public function setStatus(?CommandStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getBillingAddress(): ?Address
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(?Address $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    public function getShippingAddress(): ?Address
    {
        return $this->shippingAddress;
    }

    public function setShippingAddress(?Address $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;

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
     * @return Collection|CommandDetail[]
     */
    public function getCommandDetails(): Collection
    {
        return $this->commandDetails;
    }

    public function addCommandDetail(CommandDetail $commandDetail): self
    {
        if (!$this->commandDetails->contains($commandDetail)) {
            $this->commandDetails[] = $commandDetail;
            $commandDetail->setCommand($this);
        }

        return $this;
    }

    public function removeCommandDetail(CommandDetail $commandDetail): self
    {
        if ($this->commandDetails->contains($commandDetail)) {
            $this->commandDetails->removeElement($commandDetail);
            // set the owning side to null (unless already changed)
            if ($commandDetail->getCommand() === $this) {
                $commandDetail->setCommand(null);
            }
        }

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
}
