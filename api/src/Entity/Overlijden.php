<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OverlijdenRepository")
 */
class Overlijden
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $indicatieOverleden;

    /**
     * @ORM\Column(type="object")
     */
    private $datum;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    private $land;

    /**
     * @ORM\Column(type="object")
     */
    private $plaats;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    private $inOnderzoek;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\NatuurlijkPersoon", mappedBy="overlijden", cascade={"persist", "remove"})
     */
    private $natuurlijkPersoon;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIndicatieOverleden(): ?bool
    {
        return $this->indicatieOverleden;
    }

    public function setIndicatieOverleden(bool $indicatieOverleden): self
    {
        $this->indicatieOverleden = $indicatieOverleden;

        return $this;
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

    public function getLand()
    {
        return $this->land;
    }

    public function setLand($land): self
    {
        $this->land = $land;

        return $this;
    }

    public function getPlaats()
    {
        return $this->plaats;
    }

    public function setPlaats($plaats): self
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

    public function getNatuurlijkPersoon(): ?NatuurlijkPersoon
    {
        return $this->natuurlijkPersoon;
    }

    public function setNatuurlijkPersoon(?NatuurlijkPersoon $natuurlijkPersoon): self
    {
        $this->natuurlijkPersoon = $natuurlijkPersoon;

        // set (or unset) the owning side of the relation if necessary
        $newOverlijden = $natuurlijkPersoon === null ? null : $this;
        if ($newOverlijden !== $natuurlijkPersoon->getOverlijden()) {
            $natuurlijkPersoon->setOverlijden($newOverlijden);
        }

        return $this;
    }
}
