<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OpschortingBijhoudingRepository")
 * @Gedmo\Loggable
 */
class OpschortingBijhouding
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
     * @ORM\Column(type="string", length=255)
     */
    private $reden;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="incompleteDate")
     */
    private $datum;

    /**
     * @Gedmo\Versioned
     * @ORM\OneToOne(targetEntity="App\Entity\Ingeschrevenpersoon", mappedBy="opschortingBijhouding", cascade={"persist", "remove"})
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

    public function getIngeschrevenpersoon(): ?Ingeschrevenpersoon
    {
    	return $this->ingeschrevenpersoon;
    }

    public function setIngeschrevenpersoon(?Ingeschrevenpersoon $ingeschrevenpersoon): self
    {
    	$this->ingeschrevenpersoon= $ingeschrevenpersoon;

        // set (or unset) the owning side of the relation if necessary
    	$newOpschortingBijhouding = $ingeschrevenpersoon=== null ? null : $this;
    	if ($newOpschortingBijhouding !== $ingeschrevenpersoon->getOpschortingBijhouding()) {
    		$ingeschrevenpersoon->setOpschortingBijhouding($newOpschortingBijhouding);
        }

        return $this;
    }
}
