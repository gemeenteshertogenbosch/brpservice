<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VerblijfstitelRepository")
 */
class Verblijfstitel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Waardetabel")
     */
    private $aanduiding;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    private $datumEinde;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    private $datumIngang;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    private $inOnderzoek;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\NatuurlijkPersoon", mappedBy="verblijfstitel", cascade={"persist", "remove"})
     */
    private $natuurlijkPersoon;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAanduiding(): ?Waardetabel
    {
        return $this->aanduiding;
    }

    public function setAanduiding(?Waardetabel $aanduiding): self
    {
        $this->aanduiding = $aanduiding;

        return $this;
    }

    public function getDatumEinde()
    {
        return $this->datumEinde;
    }

    public function setDatumEinde($datumEinde): self
    {
        $this->datumEinde = $datumEinde;

        return $this;
    }

    public function getDatumIngang()
    {
        return $this->datumIngang;
    }

    public function setDatumIngang($datumIngang): self
    {
        $this->datumIngang = $datumIngang;

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

    public function getNatuurlijkPersoon(): ?NatuurlijkPersoon
    {
        return $this->natuurlijkPersoon;
    }

    public function setNatuurlijkPersoon(?NatuurlijkPersoon $natuurlijkPersoon): self
    {
        $this->natuurlijkPersoon = $natuurlijkPersoon;

        // set (or unset) the owning side of the relation if necessary
        $newVerblijfstitel = $natuurlijkPersoon === null ? null : $this;
        if ($newVerblijfstitel !== $natuurlijkPersoon->getVerblijfstitel()) {
            $natuurlijkPersoon->setVerblijfstitel($newVerblijfstitel);
        }

        return $this;
    }
}
