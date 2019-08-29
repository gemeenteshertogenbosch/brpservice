<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NaamPersoonRepository")
 */
class NaamPersoon
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $geslachtsnaam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $voorletters;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $voornamen;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $voorvoegsel;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    private $inOnderzoek;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $aanhef;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $aanschrijfwijze;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gebuikInLopendeTekst;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\NatuurlijkPersoon", mappedBy="naam", cascade={"persist", "remove"})
     */
    private $natuurlijkPersoon;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Ouder", mappedBy="naam", cascade={"persist", "remove"})
     */
    private $ouder;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGeslachtsnaam(): ?string
    {
        return $this->geslachtsnaam;
    }

    public function setGeslachtsnaam(string $geslachtsnaam): self
    {
        $this->geslachtsnaam = $geslachtsnaam;

        return $this;
    }

    public function getVoorletters(): ?string
    {
        return $this->voorletters;
    }

    public function setVoorletters(string $voorletters): self
    {
        $this->voorletters = $voorletters;

        return $this;
    }

    public function getVoornamen(): ?string
    {
        return $this->voornamen;
    }

    public function setVoornamen(string $voornamen): self
    {
        $this->voornamen = $voornamen;

        return $this;
    }

    public function getVoorvoegsel(): ?string
    {
        return $this->voorvoegsel;
    }

    public function setVoorvoegsel(string $voorvoegsel): self
    {
        $this->voorvoegsel = $voorvoegsel;

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

    public function getAanhef(): ?string
    {
        return $this->aanhef;
    }

    public function setAanhef(string $aanhef): self
    {
        $this->aanhef = $aanhef;

        return $this;
    }

    public function getAanschrijfwijze(): ?string
    {
        return $this->aanschrijfwijze;
    }

    public function setAanschrijfwijze(string $aanschrijfwijze): self
    {
        $this->aanschrijfwijze = $aanschrijfwijze;

        return $this;
    }

    public function getGebuikInLopendeTekst(): ?string
    {
        return $this->gebuikInLopendeTekst;
    }

    public function setGebuikInLopendeTekst(string $gebuikInLopendeTekst): self
    {
        $this->gebuikInLopendeTekst = $gebuikInLopendeTekst;

        return $this;
    }

    public function getNatuurlijkPersoon(): ?NatuurlijkPersoon
    {
        return $this->natuurlijkPersoon;
    }

    public function setNatuurlijkPersoon(NatuurlijkPersoon $natuurlijkPersoon): self
    {
        $this->natuurlijkPersoon = $natuurlijkPersoon;

        // set the owning side of the relation if necessary
        if ($this !== $natuurlijkPersoon->getNaam()) {
            $natuurlijkPersoon->setNaam($this);
        }

        return $this;
    }

    public function getOuder(): ?Ouder
    {
        return $this->ouder;
    }

    public function setOuder(Ouder $ouder): self
    {
        $this->ouder = $ouder;

        // set the owning side of the relation if necessary
        if ($this !== $ouder->getNaam()) {
            $ouder->setNaam($this);
        }

        return $this;
    }
}
