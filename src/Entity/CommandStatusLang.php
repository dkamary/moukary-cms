<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandStatusLangRepository")
 * @ORM\Table(
 *      name="command_status_lang",
 *      indexes={
 *          @ORM\Index(name="IDX_command_status_label", columns={"label"})
 *      }
 * )
 */
class CommandStatusLang
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CommandStatus", inversedBy="commandStatusLangs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commandStatus;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Language")
     * @ORM\JoinColumn(nullable=false)
     */
    private $language;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $label;

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

    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }
}
