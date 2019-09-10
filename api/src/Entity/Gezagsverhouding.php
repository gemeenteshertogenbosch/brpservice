<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GezagsverhoudingRepository")
 * @Gedmo\Loggable
 */
class Gezagsverhouding
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
     * @ORM\Column(type="boolean")
     */
    private $indicatieCurateleRegister;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $indicatieGezagMinderjarige;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="underInvestigation", nullable=true)
     */
    private $inOnderzoek;

    /**
     * @Gedmo\Versioned
     * @ORM\OneToOne(targetEntity="App\Entity\Ingeschrevenpersoon", mappedBy="gezagsverhouding", cascade={"persist", "remove"})
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

    public function getIndicatieCurateleRegister(): ?bool
    {
        return $this->indicatieCurateleRegister;
    }

    public function setIndicatieCurateleRegister(bool $indicatieCurateleRegister): self
    {
        $this->indicatieCurateleRegister = $indicatieCurateleRegister;

        return $this;
    }

    public function getIndicatieGezagMinderjarige(): ?string
    {
        return $this->indicatieGezagMinderjarige;
    }

    public function setIndicatieGezagMinderjarige(?string $indicatieGezagMinderjarige): self
    {
        $this->indicatieGezagMinderjarige = $indicatieGezagMinderjarige;

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
    	$newGezagsverhouding = $ingeschrevenpersoon=== null ? null : $this;
    	if ($newGezagsverhouding !== $ingeschrevenpersoon->getGezagsverhouding()) {
    		$ingeschrevenpersoon->setGezagsverhouding($newGezagsverhouding);
        }

        return $this;
    }
}
