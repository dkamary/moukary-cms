<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VatLangRepository")
 * @ORM\Table(
 *      name="vat_lang",
 *      indexes={
 *          @ORM\Index(name="IDX_vat_lang_label", columns={"label"})
 *      }
 * )
 */
class VatLang
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="smallint", options={"unsigned": true})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Vat", inversedBy="vatLangs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Language")
     */
    private $language;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $label;

    public function getId(): ?int
    {
        return $this->id;
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

    public function setLabel(?string $label): self
    {
        $this->label = $label;

        return $this;
    }
}
