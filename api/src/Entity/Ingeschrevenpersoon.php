<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ApiResource(
 *      subresourceOperations={
 *          "api_ingeschrevenpersoons_kinderens_get_subresource"={
 *              "method"="GET",
 *              "path"="/ingeschrevenpersonen/{burgerservicenummer}/kinderen",
 *              "swagger_context" = {"summary"="ingeschrevenNatuurlijkPersonenKinderen", "description"="Beschrijving"}
 *          },
 *          "api_ingeschrevenpersoons_ouders_get_subresource"={
 *              "method"="GET",
 *              "path"="/ingeschrevenpersonen/{burgerservicenummer}/ouders",
 *              "swagger_context" = {"summary"="ingeschrevenNatuurlijkPersonenOuders", "description"="Beschrijving"}
 *          },
 *          "api_ingeschrevenpersoons_partners_get_subresource"={
 *              "method"="GET",
 *              "path"="/ingeschrevenpersonen/{burgerservicenummer}/partners",
 *              "swagger_context" = {"summary"="ingeschrevenNatuurlijkPersonenPartners", "description"="Beschrijving"}
 *          },
 *      },
 *     collectionOperations={
 *     		"get"={"method"="GET","path"="/ingeschrevenpersonen","swagger_context" = {"summary"="ingeschrevenNatuurlijkPersonen", "description"="Beschrijving"}},
 *     		"get_on_bsn"={
 *     			"method"="GET", 
 *     			"path"="/ingeschrevenpersonen/{burgerservicenummer}",
 *     			"requirements"={"burgerservicenummer"="\d+"}, 
 *     			"defaults"={"color"="brown"}, 
 *     			"options"={"my_option"="my_option_value"},
 *     			"swagger_context" = {"summary"="ingeschrevenNatuurlijkPersoon", "description"="Beschrijving"}
 *     		},
 *     },
 *     itemOperations={
 *     		"get"={
 *     			"method"="GET", 
 *     			"path"="/ingeschrevenpersonen/uuid/{id}",
 *     			"swagger_context" = {"summary"="ingeschrevenNatuurlijkPersoonUui", "description"="Beschrijving"}
 *     		}
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\IngeschrevenpersoonRepository")
 * @Gedmo\Loggable
 */
class Ingeschrevenpersoon
{
	/**
	 * @var \Ramsey\Uuid\UuidInterface
	 *
     * @ApiProperty(identifier=true)
	 * @ORM\Id
	 * @ORM\Column(type="uuid", unique=true)
	 * @ORM\GeneratedValue(strategy="CUSTOM")
	 * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
	 */
	private $id;
	
    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=9)
     */
    private $burgerservicenummer;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="boolean")
     */
    private $geheimhoudingPersoonsgegevens;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=7)
     */
    private $geslachtsaanduiding;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="integer", nullable=true)
     */
    private $leeftijd;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="incompleteDate",nullable=true)
     */
    private $datumEersteInschrijvingGBA;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="object")
     */
    private $kiesrecht;

    /**
     * @Gedmo\Versioned
     * @ORM\OneToOne(targetEntity="App\Entity\NaamPersoon", inversedBy="ingeschrevenpersoon", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false, referencedColumnName="uuid")
     */
    private $naam;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="underInvestigation", nullable=true)
     */
    private $inOnderzoek;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Nationaliteit", mappedBy="ingeschrevenpersoon", orphanRemoval=true)
     */
    private $nationaliteit;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Geboorte", inversedBy="ingeschrevenpersoon", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true, referencedColumnName="uuid")
     */
    private $geboorte;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\OpschortingBijhouding", inversedBy="ingeschrevenpersoon", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true, referencedColumnName="uuid")
     */
    private $opschortingBijhouding;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Overlijden", inversedBy="ingeschrevenpersoon", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true, referencedColumnName="uuid")
     */
    private $overlijden;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Verblijfplaats", inversedBy="ingeschrevenpersoon", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true, referencedColumnName="uuid")
     */
    private $verblijfplaats;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Gezagsverhouding", inversedBy="ingeschrevenpersoon", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true, referencedColumnName="uuid")
     */
    private $gezagsverhouding;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Verblijfstitel", inversedBy="ingeschrevenpersoon", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true, referencedColumnName="uuid")
     */
    private $verblijfstitel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ouder", mappedBy="ingeschrevenpersoon", orphanRemoval=true)
     * @ApiSubresource
     */
    private $ouders;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Kind", mappedBy="ingeschrevenpersoon", orphanRemoval=true)
     * @ApiSubresource
     */
    private $kinderen;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Partner", mappedBy="ingeschrevenpersoon", orphanRemoval=true)
     * @ApiSubresource
     */
    private $partners;

    public function __construct()
    {
        $this->nationaliteit = new ArrayCollection();
        $this->ouders = new ArrayCollection();
        $this->kinderen = new ArrayCollection();
        $this->partners = new ArrayCollection();
    }
    
    // On an object level we stil want to be able to gett the id
    public function getId(): ?string
    {
    	return $this->id;
    }
    
    public function getBurgerservicenummer(): ?string
    {
        return $this->burgerservicenummer;
    }

    public function setBurgerservicenummer(string $burgerservicenummer): self
    {
        $this->burgerservicenummer = $burgerservicenummer;

        return $this;
    }

    public function getGeheimhoudingPersoonsgegevens(): ?bool
    {
        return $this->geheimhoudingPersoonsgegevens;
    }

    public function setGeheimhoudingPersoonsgegevens(bool $geheimhoudingPersoonsgegevens): self
    {
        $this->geheimhoudingPersoonsgegevens = $geheimhoudingPersoonsgegevens;

        return $this;
    }

    public function getGeslachtsaanduiding(): ?string
    {
        return $this->geslachtsaanduiding;
    }

    public function setGeslachtsaanduiding(string $geslachtsaanduiding): self
    {
        $this->geslachtsaanduiding = $geslachtsaanduiding;

        return $this;
    }

    public function getLeeftijd(): ?int
    {
        return $this->leeftijd;
    }

    public function setLeeftijd(?int $leeftijd): self
    {
        $this->leeftijd = $leeftijd;

        return $this;
    }

    public function getDatumEersteInschrijvingGBA()
    {
        return $this->datumEersteInschrijvingGBA;
    }

    public function setDatumEersteInschrijvingGBA($datumEersteInschrijvingGBA): self
    {
        $this->datumEersteInschrijvingGBA = $datumEersteInschrijvingGBA;

        return $this;
    }

    public function getKiesrecht()
    {
        return $this->kiesrecht;
    }

    public function setKiesrecht($kiesrecht): self
    {
        $this->kiesrecht = $kiesrecht;

        return $this;
    }

    public function getNaam(): ?NaamPersoon
    {
        return $this->naam;
    }

    public function setNaam(NaamPersoon $naam): self
    {
        $this->naam = $naam;

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
     * @return Collection|Nationaliteit[]
     */
    public function getNationaliteit(): Collection
    {
        return $this->nationaliteit;
    }

    public function addNationaliteit(Nationaliteit $nationaliteit): self
    {
        if (!$this->nationaliteit->contains($nationaliteit)) {
            $this->nationaliteit[] = $nationaliteit;
            $nationaliteit->setNatuurlijkPersoon($this);
        }

        return $this;
    }

    public function removeNationaliteit(Nationaliteit $nationaliteit): self
    {
        if ($this->nationaliteit->contains($nationaliteit)) {
            $this->nationaliteit->removeElement($nationaliteit);
            // set the owning side to null (unless already changed)
            if ($nationaliteit->getNatuurlijkPersoon() === $this) {
                $nationaliteit->setNatuurlijkPersoon(null);
            }
        }

        return $this;
    }

    public function getGeboorte(): ?Geboorte
    {
        return $this->geboorte;
    }

    public function setGeboorte(Geboorte $geboorte): self
    {
        $this->geboorte = $geboorte;

        return $this;
    }

    public function getOpschortingBijhouding(): ?OpschortingBijhouding
    {
        return $this->opschortingBijhouding;
    }

    public function setOpschortingBijhouding(?OpschortingBijhouding $opschortingBijhouding): self
    {
        $this->opschortingBijhouding = $opschortingBijhouding;

        return $this;
    }

    public function getOverlijden(): ?Overlijden
    {
        return $this->overlijden;
    }

    public function setOverlijden(?Overlijden $overlijden): self
    {
        $this->overlijden = $overlijden;

        return $this;
    }

    public function getVerblijfplaats(): ?Verblijfplaats
    {
        return $this->verblijfplaats;
    }

    public function setVerblijfplaats(Verblijfplaats $verblijfplaats): self
    {
        $this->verblijfplaats = $verblijfplaats;

        return $this;
    }

    public function getGezagsverhouding(): ?Gezagsverhouding
    {
        return $this->gezagsverhouding;
    }

    public function setGezagsverhouding(?Gezagsverhouding $gezagsverhouding): self
    {
        $this->gezagsverhouding = $gezagsverhouding;

        return $this;
    }

    public function getVerblijfstitel(): ?Verblijfstitel
    {
        return $this->verblijfstitel;
    }

    public function setVerblijfstitel(?Verblijfstitel $verblijfstitel): self
    {
        $this->verblijfstitel = $verblijfstitel;

        return $this;
    }

    /**
     * @return Collection|Ouder[]
     */
    public function getOuders(): Collection
    {
        return $this->ouders;
    }

    public function addOuder(Ouder $ouder): self
    {
        if (!$this->ouders->contains($ouder)) {
            $this->ouders[] = $ouder;
            $ouder->setNatuurlijkPersoon($this);
        }

        return $this;
    }

    public function removeOuder(Ouder $ouder): self
    {
        if ($this->ouders->contains($ouder)) {
            $this->ouders->removeElement($ouder);
            // set the owning side to null (unless already changed)
            if ($ouder->getNatuurlijkPersoon() === $this) {
                $ouder->setNatuurlijkPersoon(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Kind[]
     */
    public function getKinderen(): Collection
    {
        return $this->kinderen;
    }

    public function addKinderen(Kind $kinderen): self
    {
        if (!$this->kinderen->contains($kinderen)) {
            $this->kinderen[] = $kinderen;
            $kinderen->setNatuurlijkPersoon($this);
        }

        return $this;
    }

    public function removeKinderen(Kind $kinderen): self
    {
        if ($this->kinderen->contains($kinderen)) {
            $this->kinderen->removeElement($kinderen);
            // set the owning side to null (unless already changed)
            if ($kinderen->getNatuurlijkPersoon() === $this) {
                $kinderen->setNatuurlijkPersoon(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Partner[]
     */
    public function getPartners(): Collection
    {
        return $this->partners;
    }

    public function addPartner(Partner $partner): self
    {
        if (!$this->partners->contains($partner)) {
            $this->partners[] = $partner;
            $partner->setNatuurlijkPersoon($this);
        }

        return $this;
    }

    public function removePartner(Partner $partner): self
    {
        if ($this->partners->contains($partner)) {
            $this->partners->removeElement($partner);
            // set the owning side to null (unless already changed)
            if ($partner->getNatuurlijkPersoon() === $this) {
                $partner->setNatuurlijkPersoon(null);
            }
        }

        return $this;
    }
}
