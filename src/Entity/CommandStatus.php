<?php

namespace App\Entity;

use App\Helper\CreatedAtTrait;
use App\Helper\DeletedAtTrait;
use App\Helper\UpdatedAtTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandStatusRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class CommandStatus
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
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $textColor;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $bgColor;

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
     * @ORM\OneToMany(targetEntity="App\Entity\CommandStatusLang", mappedBy="commandStatus")
     */
    private $commandStatusLangs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Notification", mappedBy="commandStatus")
     */
    private $notifications;

    public function __construct()
    {
        $this->commandStatusLangs = new ArrayCollection();
        $this->notifications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTextColor(): ?string
    {
        return $this->textColor;
    }

    public function setTextColor(?string $textColor): self
    {
        $this->textColor = $textColor;

        return $this;
    }

    public function getBgColor(): ?string
    {
        return $this->bgColor;
    }

    public function setBgColor(?string $bgColor): self
    {
        $this->bgColor = $bgColor;

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
     * @return Collection|CommandStatusLang[]
     */
    public function getCommandStatusLangs(): Collection
    {
        return $this->commandStatusLangs;
    }

    public function addCommandStatusLang(CommandStatusLang $commandStatusLang): self
    {
        if (!$this->commandStatusLangs->contains($commandStatusLang)) {
            $this->commandStatusLangs[] = $commandStatusLang;
            $commandStatusLang->setCommandStatus($this);
        }

        return $this;
    }

    public function removeCommandStatusLang(CommandStatusLang $commandStatusLang): self
    {
        if ($this->commandStatusLangs->contains($commandStatusLang)) {
            $this->commandStatusLangs->removeElement($commandStatusLang);
            // set the owning side to null (unless already changed)
            if ($commandStatusLang->getCommandStatus() === $this) {
                $commandStatusLang->setCommandStatus(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Notification[]
     */
    public function getNotifications(): Collection
    {
        return $this->notifications;
    }

    public function addNotification(Notification $notification): self
    {
        if (!$this->notifications->contains($notification)) {
            $this->notifications[] = $notification;
            $notification->setCommandStatus($this);
        }

        return $this;
    }

    public function removeNotification(Notification $notification): self
    {
        if ($this->notifications->contains($notification)) {
            $this->notifications->removeElement($notification);
            // set the owning side to null (unless already changed)
            if ($notification->getCommandStatus() === $this) {
                $notification->setCommandStatus(null);
            }
        }

        return $this;
    }
}
