<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VerblijfplaatsRepository")
 * @Gedmo\Loggable
 */
class Verblijfplaats
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $aanduidingBijHuisnummer;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $funtieAdres;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $huisletter;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="integer", nullable=true)
     */
    private $huisnummer;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $huisnummertoevoeging;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $identificatiecodeNummeraanduiding;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $identificatiecodeVerblijfplaats;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="boolean")
     */
    private $indentificatieVestigingVanuitBuitenland  = false;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $locatiebeschrijving;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $naamOpenbareRuimte;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $postcode;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $straatnaam;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="boolean")
     */
    private $vanuitVertrokkenOnbekendWaarheen = false;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $woonplaatsnaam;

    /**
     * @Groups({"read", "write"})
     * @ORM\Column(type="object", nullable=true)
     */
    private $datumAanvangAdreshouding;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="incompleteDate", nullable=true)
     */
    private $datumIngangGeldigheid;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="incompleteDate", nullable=true)
     */
    private $datumInschrijvingInGemeente;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="incompleteDate", nullable=true)
     */
    private $datumVestigingInNederland;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="incompleteDate", nullable=true)
     */
    private $gemeenteVanInschrijving;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\ManyToOne(targetEntity="App\Entity\Waardetabel")
     */
    private $landVanwaarIngeschreven;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\OneToOne(targetEntity="App\Entity\VerblijfBuitenland", inversedBy="verblijfplaats", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true, referencedColumnName="uuid")
     */
    private $verblijfBuitenland;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="underInvestigation", nullable=true)
     */
    private $inOnderzoek;

    /**
     * @Gedmo\Versioned
     * @ORM\OneToOne(targetEntity="App\Entity\Ingeschrevenpersoon", mappedBy="verblijfplaats", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
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

    public function getAanduidingBijHuisnummer(): ?string
    {
        return $this->aanduidingBijHuisnummer;
    }

    public function setAanduidingBijHuisnummer(?string $aanduidingBijHuisnummer): self
    {
        $this->aanduidingBijHuisnummer = $aanduidingBijHuisnummer;

        return $this;
    }

    public function getFuntieAdres(): ?string
    {
        return $this->funtieAdres;
    }

    public function setFuntieAdres(?string $funtieAdres): self
    {
        $this->funtieAdres = $funtieAdres;

        return $this;
    }

    public function getHuisletter(): ?string
    {
        return $this->huisletter;
    }

    public function setHuisletter(?string $huisletter): self
    {
        $this->huisletter = $huisletter;

        return $this;
    }

    public function getHuisnummer(): ?int
    {
        return $this->huisnummer;
    }

    public function setHuisnummer(?int $huisnummer): self
    {
        $this->huisnummer = $huisnummer;

        return $this;
    }

    public function getHuisnummertoevoeging(): ?string
    {
        return $this->huisnummertoevoeging;
    }

    public function setHuisnummertoevoeging(?string $huisnummertoevoeging): self
    {
        $this->huisnummertoevoeging = $huisnummertoevoeging;

        return $this;
    }

    public function getIdentificatiecodeNummeraanduiding(): ?string
    {
        return $this->identificatiecodeNummeraanduiding;
    }

    public function setIdentificatiecodeNummeraanduiding(?string $identificatiecodeNummeraanduiding): self
    {
        $this->identificatiecodeNummeraanduiding = $identificatiecodeNummeraanduiding;

        return $this;
    }

    public function getIdentificatiecodeVerblijfplaats(): ?string
    {
        return $this->identificatiecodeVerblijfplaats;
    }

    public function setIdentificatiecodeVerblijfplaats(?string $identificatiecodeVerblijfplaats): self
    {
        $this->identificatiecodeVerblijfplaats = $identificatiecodeVerblijfplaats;

        return $this;
    }

    public function getIndentificatieVestigingVanuitBuitenland(): ?bool
    {
        return $this->indentificatieVestigingVanuitBuitenland;
    }

    public function setIndentificatieVestigingVanuitBuitenland(bool $indentificatieVestigingVanuitBuitenland): self
    {
        $this->indentificatieVestigingVanuitBuitenland = $indentificatieVestigingVanuitBuitenland;

        return $this;
    }

    public function getLocatiebeschrijving(): ?string
    {
        return $this->locatiebeschrijving;
    }

    public function setLocatiebeschrijving(?string $locatiebeschrijving): self
    {
        $this->locatiebeschrijving = $locatiebeschrijving;

        return $this;
    }

    public function getNaamOpenbareRuimte(): ?string
    {
        return $this->naamOpenbareRuimte;
    }

    public function setNaamOpenbareRuimte(?string $naamOpenbareRuimte): self
    {
        $this->naamOpenbareRuimte = $naamOpenbareRuimte;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(?string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getStraatnaam(): ?string
    {
        return $this->straatnaam;
    }

    public function setStraatnaam(?string $straatnaam): self
    {
        $this->straatnaam = $straatnaam;

        return $this;
    }

    public function getVanuitVertrokkenOnbekendWaarheen(): ?bool
    {
        return $this->vanuitVertrokkenOnbekendWaarheen;
    }

    public function setVanuitVertrokkenOnbekendWaarheen(bool $vanuitVertrokkenOnbekendWaarheen): self
    {
        $this->vanuitVertrokkenOnbekendWaarheen = $vanuitVertrokkenOnbekendWaarheen;

        return $this;
    }

    public function getWoonplaatsnaam(): ?string
    {
        return $this->woonplaatsnaam;
    }

    public function setWoonplaatsnaam(?string $woonplaatsnaam): self
    {
        $this->woonplaatsnaam = $woonplaatsnaam;

        return $this;
    }

    public function getDatumAanvangAdreshouding()
    {
        return $this->datumAanvangAdreshouding;
    }

    public function setDatumAanvangAdreshouding($datumAanvangAdreshouding): self
    {
        $this->datumAanvangAdreshouding = $datumAanvangAdreshouding;

        return $this;
    }

    public function getDatumIngangGeldigheid()
    {
        return $this->datumIngangGeldigheid;
    }

    public function setDatumIngangGeldigheid($datumIngangGeldigheid): self
    {
        $this->datumIngangGeldigheid = $datumIngangGeldigheid;

        return $this;
    }

    public function getDatumInschrijvingInGemeente()
    {
        return $this->datumInschrijvingInGemeente;
    }

    public function setDatumInschrijvingInGemeente($datumInschrijvingInGemeente): self
    {
        $this->datumInschrijvingInGemeente = $datumInschrijvingInGemeente;

        return $this;
    }

    public function getDatumVestigingInNederland()
    {
        return $this->datumVestigingInNederland;
    }

    public function setDatumVestigingInNederland($datumVestigingInNederland): self
    {
        $this->datumVestigingInNederland = $datumVestigingInNederland;

        return $this;
    }

    public function getGemeenteVanInschrijving(): ?Waardetabel
    {
        return $this->gemeenteVanInschrijving;
    }

    public function setGemeenteVanInschrijving(?Waardetabel $gemeenteVanInschrijving): self
    {
        $this->gemeenteVanInschrijving = $gemeenteVanInschrijving;

        return $this;
    }

    public function getLandVanwaarIngeschreven(): ?Waardetabel
    {
        return $this->landVanwaarIngeschreven;
    }

    public function setLandVanwaarIngeschreven(?Waardetabel $landVanwaarIngeschreven): self
    {
        $this->landVanwaarIngeschreven = $landVanwaarIngeschreven;

        return $this;
    }

    public function getVerblijfBuitenland(): ?VerblijfBuitenland
    {
        return $this->verblijfBuitenland;
    }

    public function setVerblijfBuitenland(?VerblijfBuitenland $verblijfBuitenland): self
    {
        $this->verblijfBuitenland = $verblijfBuitenland;

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

    public function setIngeschrevenpersoon(Ingeschrevenpersoon$ingeschrevenpersoon): self
    {
    	$this->ingeschrevenpersoon= $ingeschrevenpersoon;

        // set the owning side of the relation if necessary
    	if ($this !== $ingeschrevenpersoon->getVerblijfplaats()) {
    		$ingeschrevenpersoon->setVerblijfplaats($this);
        }

        return $this;
    }
}
