<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OpschortingBijhoudingRepository")
 */
class OpschortingBijhouding
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
    private $reden;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    private $datum;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\NatuurlijkPersoon", mappedBy="opschortingBijhouding", cascade={"persist", "remove"})
     */
    private $natuurlijkPersoon;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReden(): ?string
    {
        return $this->reden;
    }

    public function setReden(string $reden): self
    {
        $this->reden = $reden;

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

    public function getNatuurlijkPersoon(): ?NatuurlijkPersoon
    {
        return $this->natuurlijkPersoon;
    }

    public function setNatuurlijkPersoon(?NatuurlijkPersoon $natuurlijkPersoon): self
    {
        $this->natuurlijkPersoon = $natuurlijkPersoon;

        // set (or unset) the owning side of the relation if necessary
        $newOpschortingBijhouding = $natuurlijkPersoon === null ? null : $this;
        if ($newOpschortingBijhouding !== $natuurlijkPersoon->getOpschortingBijhouding()) {
            $natuurlijkPersoon->setOpschortingBijhouding($newOpschortingBijhouding);
        }

        return $this;
    }
}
