<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KindRepository")
 */
class Kind
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $leeftijd;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    private $inOnderzoek;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\NatuurlijkPersoon", inversedBy="kinderen")
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

    public function getLeeftijd(): ?int
    {
        return $this->leeftijd;
    }

    public function setLeeftijd(?int $leeftijd): self
    {
        $this->leeftijd = $leeftijd;

        return $this;
    }

    public function getInOnderzoek()
    {
        return $this->inOnderzoek;
    }

    public function setInOnderzoek($inOnderzoek): self
    {
        $this->inOnderzoek = $inOnderzoek;

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
