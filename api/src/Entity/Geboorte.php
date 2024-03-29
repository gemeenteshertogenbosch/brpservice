<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
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
     * @Groups({"read", "write"})
	 * @ORM\Id
	 * @ORM\Column(type="uuid", unique=true)
	 * @ORM\GeneratedValue(strategy="CUSTOM")
	 * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
	 */
	private $uuid;

    /**
     * @todo nullable moet hier wel vanaf
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\ManyToOne(targetEntity="App\Entity\Waardetabel")
     * @ORM\JoinColumn(nullable=true)
     */
    private $land;
    
    /**
     * @todo nullable moet hier wel vanaf
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\ManyToOne(targetEntity="App\Entity\Waardetabel")
     * @ORM\JoinColumn(nullable=true)
     */
    private $plaats;
    
    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="incompleteDate",nullable=true)
     */
    private $datum;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="underInvestigation", nullable=true)
     */
    private $inOnderzoek;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ingeschrevenpersoon", mappedBy="geboorte")
     */
    private $ingeschrevenpersonen;

    public function __construct()
    {
        $this->ingeschrevenpersonen = new ArrayCollection();
    }
    
    
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

    /**
     * @return Collection|Ingeschrevenpersoon[]
     */
    public function getIngeschrevenpersonen(): Collection
    {
        return $this->ingeschrevenpersonen;
    }

    public function addIngeschrevenpersonen(Ingeschrevenpersoon $ingeschrevenpersonen): self
    {
        if (!$this->ingeschrevenpersonen->contains($ingeschrevenpersonen)) {
            $this->ingeschrevenpersonen[] = $ingeschrevenpersonen;
            $ingeschrevenpersonen->setGeboorte($this);
        }

        return $this;
    }

    public function removeIngeschrevenpersonen(Ingeschrevenpersoon $ingeschrevenpersonen): self
    {
        if ($this->ingeschrevenpersonen->contains($ingeschrevenpersonen)) {
            $this->ingeschrevenpersonen->removeElement($ingeschrevenpersonen);
            // set the owning side to null (unless already changed)
            if ($ingeschrevenpersonen->getGeboorte() === $this) {
                $ingeschrevenpersonen->setGeboorte(null);
            }
        }

        return $this;
    }
}
