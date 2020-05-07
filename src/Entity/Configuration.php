<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConfigurationRepository")
 */
class Configuration
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="smallint", options={"unsigned":true})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $siteName;

    /**
     * @ORM\Column(type="string", length=512, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adminEmail;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Language")
     */
    private $language;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $formatFacture;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $referenceFacture;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $formatLivraison;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $referenceLivraison;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Currency")
     */
    private $currency;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSiteName(): ?string
    {
        return $this->siteName;
    }

    public function setSiteName(?string $siteName): self
    {
        $this->siteName = $siteName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAdminEmail(): ?string
    {
        return $this->adminEmail;
    }

    public function setAdminEmail(?string $adminEmail): self
    {
        $this->adminEmail = $adminEmail;

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

    public function getFormatFacture(): ?string
    {
        return $this->formatFacture;
    }

    public function setFormatFacture(?string $formatFacture): self
    {
        $this->formatFacture = $formatFacture;

        return $this;
    }

    public function getReferenceFacture(): ?string
    {
        return $this->referenceFacture;
    }

    public function setReferenceFacture(?string $referenceFacture): self
    {
        $this->referenceFacture = $referenceFacture;

        return $this;
    }

    public function getFormatLivraison(): ?string
    {
        return $this->formatLivraison;
    }

    public function setFormatLivraison(?string $formatLivraison): self
    {
        $this->formatLivraison = $formatLivraison;

        return $this;
    }

    public function getReferenceLivraison(): ?string
    {
        return $this->referenceLivraison;
    }

    public function setReferenceLivraison(?string $referenceLivraison): self
    {
        $this->referenceLivraison = $referenceLivraison;

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
}
