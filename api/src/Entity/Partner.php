<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartnerRepository")
 */
class Partner
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $burgerservicenummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $geslachtsaanduiding;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\NaamPersoon", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $naam;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Geboorte", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $geboorte;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\AangaanHuwelijkPartnerschap", inversedBy="partner", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $aangaanHuwelijkPartnerschap;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NatuurlijkPersoon", inversedBy="partners")
     * @ORM\JoinColumn(nullable=false)
     */
    private $natuurlijkPersoon;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBurgerservicenummer(): ?string
    {
        return $this->burgerservicenummer;
    }

    public function setBurgerservicenummer(string $burgerservicenummer): self
    {
        $this->burgerservicenummer = $burgerservicenummer;

        return $this;
    }

    public function getGeslachtsaanduiding(): ?string
    {
        return $this->geslachtsaanduiding;
    }

    public function setGeslachtsaanduiding(string $geslachtsaanduiding): self
    {
        $this->geslachtsaanduiding = $geslachtsaanduiding;

        return $this;
    }

    public function getNaam(): ?NaamPersoon
    {
        return $this->naam;
    }

    public function setNaam(NaamPersoon $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getGeboorte(): ?Geboorte
    {
        return $this->geboorte;
    }

    public function setGeboorte(Geboorte $geboorte): self
    {
        $this->geboorte = $geboorte;

        return $this;
    }

    public function getAangaanHuwelijkPartnerschap(): ?AangaanHuwelijkPartnerschap
    {
        return $this->aangaanHuwelijkPartnerschap;
    }

    public function setAangaanHuwelijkPartnerschap(AangaanHuwelijkPartnerschap $aangaanHuwelijkPartnerschap): self
    {
        $this->aangaanHuwelijkPartnerschap = $aangaanHuwelijkPartnerschap;

        return $this;
    }

    public function getNatuurlijkPersoon(): ?NatuurlijkPersoon
    {
        return $this->natuurlijkPersoon;
    }

    public function setNatuurlijkPersoon(?NatuurlijkPersoon $natuurlijkPersoon): self
    {
        $this->natuurlijkPersoon = $natuurlijkPersoon;

        return $this;
    }
}
