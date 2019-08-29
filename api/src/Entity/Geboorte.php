<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GeboorteRepository")
 */
class Geboorte
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
     * @ORM\Column(type="object", nullable=true)
     */
    private $land;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    private $plaats;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    private $inOnderzoek;

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
}
