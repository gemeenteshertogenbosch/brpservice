<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OuderRepository")
 * @ApiResource(
 *     collectionOperations={"get"={"method"="GET","path"="/ingeschrevenpersonen/{burgerservicenummer}/ouders.{_format}","swagger_context" = {"summary"="ingeschrevenNatuurlijkPersoonOuders", "description"="Beschrijving"}}},
 *     itemOperations={"get"={"method"="GET","path"="/ingeschrevenpersonen/{burgerservicenummer}/ouders/{uuid}.{_format}","swagger_context" = {"summary"="ingeschrevenNatuurlijkPersoonOuderUuid", "description"="Beschrijving"}}}
 * )
 * @Gedmo\Loggable
 */
class Ouder
{
	/**
	 * @var \Ramsey\Uuid\UuidInterface
	 *
     * @Groups({"read", "write"})
     * @ApiProperty(identifier=true)
	 * @ORM\Id
	 * @ORM\Column(type="uuid", unique=true)
	 * @ORM\GeneratedValue(strategy="CUSTOM")
	 * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
	 */
	private $uuid;

    /**
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255)
     */
    private $burgerservicenummer;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=7)
     */
    private $geslachtsaanduiding;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=7)
     */
    private $ouderAanduiding;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="incompleteDate", nullable=true)
     */
    private $datumIngangFamilierechtelijkeBetreking;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\OneToOne(targetEntity="App\Entity\NaamPersoon", inversedBy="ouder", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false, referencedColumnName="uuid")
     */
    private $naam;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\Column(type="underInvestigation", nullable=true)
     */
    private $inOnderzoek;

    /**
     * @Groups({"read", "write"})
     * @Gedmo\Versioned
     * @ORM\OneToOne(targetEntity="App\Entity\Geboorte", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false, referencedColumnName="uuid")
     */
    private $geboorte;

    /**
     * @Gedmo\Versioned
     * @ORM\ManyToOne(targetEntity="App\Entity\Ingeschrevenpersoon", inversedBy="ouders")
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

    public function getBurgerservicenummer(): ?string
    {
        return $this->burgerservicenummer;
    }

    public function setBurgerservicenummer(string $burgerservicenummer): self
    {
        $this->burgerservicenummer = $burgerservicenummer;

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

    public function getOuderAanduiding(): ?string
    {
        return $this->ouderAanduiding;
    }

    public function setOuderAanduiding(string $ouderAanduiding): self
    {
        $this->ouderAanduiding = $ouderAanduiding;

        return $this;
    }

    public function getDatumIngangFamilierechtelijkeBetreking()
    {
        return $this->datumIngangFamilierechtelijkeBetreking;
    }

    public function setDatumIngangFamilierechtelijkeBetreking($datumIngangFamilierechtelijkeBetreking): self
    {
        $this->datumIngangFamilierechtelijkeBetreking = $datumIngangFamilierechtelijkeBetreking;

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

    public function getGeboorte(): ?Geboorte
    {
        return $this->geboorte;
    }

    public function setGeboorte(Geboorte $geboorte): self
    {
        $this->geboorte = $geboorte;

        return $this;
    }

    public function getIngeschrevenpersoon(): ?Ingeschrevenpersoon
    {
    	return $this->ingeschrevenpersoon;
    }

    public function setIngeschrevenpersoon(?Ingeschrevenpersoon $ingeschrevenpersoon): self
    {
    	$this->ingeschrevenpersoon = $ingeschrevenpersoon;

        return $this;
    }
}
