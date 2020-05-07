<?php

namespace App\Entity;

use App\Helper\CreatedAtTrait;
use App\Helper\DeletedAtTrait;
use App\Helper\UpdatedAtTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmailRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Email
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
     * @ORM\OneToMany(targetEntity="App\Entity\EmailLang", mappedBy="email")
     */
    private $emailLangs;

    public function __construct()
    {
        $this->emailLangs = new ArrayCollection();
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
     * @return Collection|EmailLang[]
     */
    public function getEmailLangs(): Collection
    {
        return $this->emailLangs;
    }

    public function addEmailLang(EmailLang $emailLang): self
    {
        if (!$this->emailLangs->contains($emailLang)) {
            $this->emailLangs[] = $emailLang;
            $emailLang->setEmail($this);
        }

        return $this;
    }

    public function removeEmailLang(EmailLang $emailLang): self
    {
        if ($this->emailLangs->contains($emailLang)) {
            $this->emailLangs->removeElement($emailLang);
            // set the owning side to null (unless already changed)
            if ($emailLang->getEmail() === $this) {
                $emailLang->setEmail(null);
            }
        }

        return $this;
    }
}
