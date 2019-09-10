<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VerblijfBuitenlandRepository")
 * @Gedmo\Loggable
 */
class VerblijfBuitenland
{
	/**
	 * @var \Ramsey\Uuid\UuidInterface
	 *
	 * @ORM\Id
	 * @ORM\Column(type="uuid", unique=true)
	 * @ORM\GeneratedValue(strategy="CUSTOM")
	 * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
	 */
	private $uuid;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresregel1;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresRegel2;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresRegel3;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="boolean")
     */
    private $vertrokkenOnbekendWaarheen;
    
    /**
     * @Gedmo\Versioned
     * @ORM\ManyToOne(targetEntity="App\Entity\Waardetabel")
     */
    private $land;
    
    /**
     * @Gedmo\Versioned
     * @ORM\ManyToOne(targetEntity="App\Entity\Waardetabel")
     */
    private $plaats;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Verblijfplaats", mappedBy="verblijfBuitenland", cascade={"persist", "remove"})
     */
    private $verblijfplaats;

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
    
    public function getPlaats(): ?Waardetabel
    {
    	return $this->plaats;
    }
    
    public function setPlaats(?Waardetabel $plaats): self
    {
    	$this->plaats = $plaats;
    	
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
