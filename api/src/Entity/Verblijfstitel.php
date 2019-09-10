<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VerblijfstitelRepository")
 * @Gedmo\Loggable
 */
class Verblijfstitel
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Waardetabel")
     */
    private $aanduiding;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="incompleteDate")
     */
    private $datumEinde;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="incompleteDate")
     */
    private $datumIngang;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="underInvestigation", nullable=true)
     */
    private $inOnderzoek;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Ingeschrevenpersoon", mappedBy="verblijfstitel", cascade={"persist", "remove"})
     */
    private $ingeschrevenpersoon;
    
    
    // On an object level we stil want to be able to gett the id
    public function getId(): ?string
    {
    	return $this->id;
    }
    
    public function getUuid(): ?string
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

    public function getIngeschrevenpersoon(): ?Ingeschrevenpersoon
    {
    	return $this->ingeschrevenpersoon;
    }

    public function setIngeschrevenpersoon(?Ingeschrevenpersoon $ingeschrevenpersoon): self
    {
    	$this->ingeschrevenpersoon= $ingeschrevenpersoon;

        // set (or unset) the owning side of the relation if necessary
    	$newVerblijfstitel = $ingeschrevenpersoon=== null ? null : $this;
    	if ($newVerblijfstitel !== $ingeschrevenpersoon->getVerblijfstitel()) {
    		$ingeschrevenpersoon->setVerblijfstitel($newVerblijfstitel);
        }

        return $this;
    }
}
