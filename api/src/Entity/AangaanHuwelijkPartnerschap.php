<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AangaanHuwelijkPartnerschapRepository")
 */
class AangaanHuwelijkPartnerschap
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="object")
     */
    private $datum;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Waardetabel")
     */
    private $land;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Waardetabel")
     */
    private $plaats;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    private $inOnderzoek;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Partner", mappedBy="aangaanHuwelijkPartnerschap", cascade={"persist", "remove"})
     */
    private $partner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatum()
    {
        return $this->datum;
    }

    public function setDatum($datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getLand(): ?Waardetabel
    {
        return $this->land;
    }

    public function setLand(?Waardetabel $land): self
    {
        $this->land = $land;

        return $this;
    }

    public function getPlaats(): ?Waardetabel
    {
        return $this->plaats;
    }

    public function setPlaats(?Waardetabel $plaats): self
    {
        $this->plaats = $plaats;

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

    public function getPartner(): ?Partner
    {
        return $this->partner;
    }

    public function setPartner(Partner $partner): self
    {
        $this->partner = $partner;

        // set the owning side of the relation if necessary
        if ($this !== $partner->getAangaanHuwelijkPartnerschap()) {
            $partner->setAangaanHuwelijkPartnerschap($this);
        }

        return $this;
    }
}
