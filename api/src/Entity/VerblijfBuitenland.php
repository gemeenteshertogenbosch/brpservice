<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VerblijfBuitenlandRepository")
 */
class VerblijfBuitenland
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresregel1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresRegel2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresRegel3;

    /**
     * @ORM\Column(type="boolean")
     */
    private $vertrokkenOnbekendWaarheen;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Waardetabel")
     */
    private $land;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Verblijfplaats", mappedBy="verblijfBuitenland", cascade={"persist", "remove"})
     */
    private $verblijfplaats;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresregel1(): ?string
    {
        return $this->adresregel1;
    }

    public function setAdresregel1(?string $adresregel1): self
    {
        $this->adresregel1 = $adresregel1;

        return $this;
    }

    public function getAdresRegel2(): ?string
    {
        return $this->adresRegel2;
    }

    public function setAdresRegel2(?string $adresRegel2): self
    {
        $this->adresRegel2 = $adresRegel2;

        return $this;
    }

    public function getAdresRegel3(): ?string
    {
        return $this->adresRegel3;
    }

    public function setAdresRegel3(?string $adresRegel3): self
    {
        $this->adresRegel3 = $adresRegel3;

        return $this;
    }

    public function getVertrokkenOnbekendWaarheen(): ?bool
    {
        return $this->vertrokkenOnbekendWaarheen;
    }

    public function setVertrokkenOnbekendWaarheen(bool $vertrokkenOnbekendWaarheen): self
    {
        $this->vertrokkenOnbekendWaarheen = $vertrokkenOnbekendWaarheen;

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

    public function getVerblijfplaats(): ?Verblijfplaats
    {
        return $this->verblijfplaats;
    }

    public function setVerblijfplaats(?Verblijfplaats $verblijfplaats): self
    {
        $this->verblijfplaats = $verblijfplaats;

        // set (or unset) the owning side of the relation if necessary
        $newVerblijfBuitenland = $verblijfplaats === null ? null : $this;
        if ($newVerblijfBuitenland !== $verblijfplaats->getVerblijfBuitenland()) {
            $verblijfplaats->setVerblijfBuitenland($newVerblijfBuitenland);
        }

        return $this;
    }
}
