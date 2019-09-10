<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NaamPersoonRepository")
 * @Gedmo\Loggable
 */
class NaamPersoon
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
    private $geslachtsnaam;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255)
     */
    private $voorletters;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255)
     */
    private $voornamen;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255)
     */
    private $voorvoegsel;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="underInvestigation", nullable=true)
     */
    private $inOnderzoek;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255)
     */
    private $aanhef;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255)
     */
    private $aanschrijfwijze;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255)
     */
    private $gebuikInLopendeTekst;

    /**
     * @Gedmo\Versioned
     * @ORM\OneToOne(targetEntity="App\Entity\Ingeschrevenpersoon", mappedBy="naam", cascade={"persist", "remove"})
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

    public function getGeslachtsnaam(): ?string
    {
        return $this->geslachtsnaam;
    }

    public function setGeslachtsnaam(string $geslachtsnaam): self
    {
        $this->geslachtsnaam = $geslachtsnaam;

        return $this;
    }

    public function getVoorletters(): ?string
    {
        return $this->voorletters;
    }

    public function setVoorletters(string $voorletters): self
    {
        $this->voorletters = $voorletters;

        return $this;
    }

    public function getVoornamen(): ?string
    {
        return $this->voornamen;
    }

    public function setVoornamen(string $voornamen): self
    {
        $this->voornamen = $voornamen;

        return $this;
    }

    public function getVoorvoegsel(): ?string
    {
        return $this->voorvoegsel;
    }

    public function setVoorvoegsel(string $voorvoegsel): self
    {
        $this->voorvoegsel = $voorvoegsel;

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

    public function getAanhef(): ?string
    {
        return $this->aanhef;
    }

    public function setAanhef(string $aanhef): self
    {
        $this->aanhef = $aanhef;

        return $this;
    }

    public function getAanschrijfwijze(): ?string
    {
        return $this->aanschrijfwijze;
    }

    public function setAanschrijfwijze(string $aanschrijfwijze): self
    {
        $this->aanschrijfwijze = $aanschrijfwijze;

        return $this;
    }

    public function getGebuikInLopendeTekst(): ?string
    {
        return $this->gebuikInLopendeTekst;
    }

    public function setGebuikInLopendeTekst(string $gebuikInLopendeTekst): self
    {
        $this->gebuikInLopendeTekst = $gebuikInLopendeTekst;

        return $this;
    }

    public function getIngeschrevenpersoon(): ?Ingeschrevenpersoon
    {
    	return $this->ingeschrevenpersoon ;
    }

    public function setIngeschrevenpersoon(Ingeschrevenpersoon $ingeschrevenpersoon): self
    {
    	$this->ingeschrevenpersoon = $ingeschrevenpersoon;

        // set the owning side of the relation if necessary
    	if ($this !== $ingeschrevenpersoon->getNaam()) {
    		$ingeschrevenpersoon->setNaam($this);
        }

        return $this;
    }
}
