<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
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
     * @Groups({"read", "write"})
	 * @ORM\Id
	 * @ORM\Column(type="uuid", unique=true)
	 * @ORM\GeneratedValue(strategy="CUSTOM")
	 * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
	 */
	private $uuid;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255)
     */
    private $geslachtsnaam;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255)
     */
    private $voorletters;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255)
     */
    private $voornamen;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255)
     */
    private $voorvoegsel;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="underInvestigation", nullable=true)
     */
    private $inOnderzoek;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255)
     */
    private $aanhef;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255)
     */
    private $aanschrijfwijze;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255)
     */
    private $gebuikInLopendeTekst;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ingeschrevenpersoon", mappedBy="naam")
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
            $ingeschrevenpersonen->setNaam($this);
        }

        return $this;
    }

    public function removeIngeschrevenpersonen(Ingeschrevenpersoon $ingeschrevenpersonen): self
    {
        if ($this->ingeschrevenpersonen->contains($ingeschrevenpersonen)) {
            $this->ingeschrevenpersonen->removeElement($ingeschrevenpersonen);
            // set the owning side to null (unless already changed)
            if ($ingeschrevenpersonen->getNaam() === $this) {
                $ingeschrevenpersonen->setNaam(null);
            }
        }

        return $this;
    }
}
