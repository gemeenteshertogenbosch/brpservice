<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartnerRepository")
 * @ApiResource(
 *     collectionOperations={},
 *     itemOperations={"get"={"method"="GET","path"="/ingeschrevenpersonen/{burgerservicenummer}/partners/{uuid}.{_format}","swagger_context" = {"summary"="ingeschrevenNatuurlijkPersoonPartnerUuid", "description"="Beschrijving"}}}
 * )
 * @ApiResource
 * @Gedmo\Loggable
 */
class Partner
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
     * @ORM\Column(type="string", length=9)
     */
    private $burgerservicenummer;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255)
     */
    private $geslachtsaanduiding;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\NaamPersoon", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false, referencedColumnName="uuid")
     */
    private $naam;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Geboorte", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false, referencedColumnName="uuid")
     */
    private $geboorte;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\AangaanHuwelijkPartnerschap", inversedBy="partner", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false, referencedColumnName="uuid")
     */
    private $aangaanHuwelijkPartnerschap;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ingeschrevenpersoon", inversedBy="partners")
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

    public function getNaam(): ?NaamPersoon
    {
        return $this->naam;
    }

    public function setNaam(NaamPersoon $naam): self
    {
        $this->naam = $naam;

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

    public function getAangaanHuwelijkPartnerschap(): ?AangaanHuwelijkPartnerschap
    {
        return $this->aangaanHuwelijkPartnerschap;
    }

    public function setAangaanHuwelijkPartnerschap(AangaanHuwelijkPartnerschap $aangaanHuwelijkPartnerschap): self
    {
        $this->aangaanHuwelijkPartnerschap = $aangaanHuwelijkPartnerschap;

        return $this;
    }

    public function getIngeschrevenpersoon(): ?Ingeschrevenpersoon
    {
    	return $this->ingeschrevenpersoon;
    }

    public function setIngeschrevenpersoon(?Ingeschrevenpersoon $ingeschrevenpersoon): self
    {
    	$this->ingeschrevenpersoon= $ingeschrevenpersoon;

        return $this;
    }
}
