<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotificationRepository")
 */
class Notification
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CommandStatus", inversedBy="notifications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commandStatus;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Email")
     * @ORM\JoinColumn(nullable=false)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sender;

    /**
     * @ORM\Column(type="smallint", options={"unsigned":true})
     */
    private $receiverId;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasBill;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasShip;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommandStatus(): ?CommandStatus
    {
        return $this->commandStatus;
    }

    public function setCommandStatus(?CommandStatus $commandStatus): self
    {
        $this->commandStatus = $commandStatus;

        return $this;
    }

    public function getEmail(): ?Email
    {
        return $this->email;
    }

    public function setEmail(?Email $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSender(): ?string
    {
        return $this->sender;
    }

    public function setSender(string $sender): self
    {
        $this->sender = $sender;

        return $this;
    }

    public function getReceiverId(): ?int
    {
        return $this->receiverId;
    }

    public function setReceiverId(int $receiverId): self
    {
        $this->receiverId = $receiverId;

        return $this;
    }

    public function getHasBill(): ?bool
    {
        return $this->hasBill;
    }

    public function setHasBill(?bool $hasBill): self
    {
        $this->hasBill = $hasBill;

        return $this;
    }

    public function getHasShip(): ?bool
    {
        return $this->hasShip;
    }

    public function setHasShip(?bool $hasShip): self
    {
        $this->hasShip = $hasShip;

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
