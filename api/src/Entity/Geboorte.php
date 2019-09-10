<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GeboorteRepository")
 * @Gedmo\Loggable
 */
class Geboorte
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
     * @todo nullable moet hier wel vanaf
     * @Gedmo\Versioned
     * @ORM\ManyToOne(targetEntity="App\Entity\Waardetabel")
     * @ORM\JoinColumn(nullable=true)
     */
    private $land;
    
    /**
     * @todo nullable moet hier wel vanaf
     * @Gedmo\Versioned
     * @ORM\ManyToOne(targetEntity="App\Entity\Waardetabel")
     * @ORM\JoinColumn(nullable=true)
     */
    private $plaats;
    
    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="incompleteDate",nullable=true)
     */
    private $datum;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="underInvestigation", nullable=true)
     */
    private $inOnderzoek;
    
    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Ingeschrevenpersoon", mappedBy="overlijden", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $ingeschrevenpersoon;    
    
    // On an object level we stil want to be able to gett the id
    public function getId(): ?string
    {
    	return $this->uuid;
    }
    
    public function getUuid(): ?string
    {
    	return $this->uuid;
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
    
    public function getIngeschrevenpersoon(): ?Ingeschrevenpersoon
    {
    	return $this->ingeschrevenpersoon;
    }
    
    public function setIngeschrevenpersoon(?Ingeschrevenpersoon $ingeschrevenpersoon): self
    {
    	$this->ingeschrevenpersoon = $ingeschrevenpersoon;
    	
    	// set (or unset) the owning side of the relation if necessary
    	$newGeboorte = $ingeschrevenpersoon === null ? null : $this;
    	if ($newGeboorte!== $ingeschrevenpersoon->getGeboorte()) {
    		$ingeschrevenpersoon->setGeboorte($newGeboorte);
    	}
    	
    	return $this;
    }
}
