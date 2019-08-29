<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\NatuurlijkPersoonRepository")
 */
class NatuurlijkPersoon
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $burgerservicenummer;

    /**
     * @ORM\Column(type="boolean")
     */
    private $geheimhoudingPersoonsgegevens;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $geslachtsaanduiding;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $leeftijd;

    /**
     * @ORM\Column(type="object")
     */
    private $datumEersteInschrijvingGBA;

    /**
     * @ORM\Column(type="object")
     */
    private $kiesrecht;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\NaamPersoon", inversedBy="natuurlijkPersoon", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $naam;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    private $inOnderzoek;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Nationaliteit", mappedBy="natuurlijkPersoon", orphanRemoval=true)
     */
    private $nationaliteit;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Geboorte", inversedBy="natuurlijkPersoon", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $geboorte;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\OpschortingBijhouding", inversedBy="natuurlijkPersoon", cascade={"persist", "remove"})
     */
    private $opschortingBijhouding;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Overlijden", inversedBy="natuurlijkPersoon", cascade={"persist", "remove"})
     */
    private $overlijden;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Verblijfplaats", inversedBy="natuurlijkPersoon", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $verblijfplaats;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Gezagsverhouding", inversedBy="verblijfstitel", cascade={"persist", "remove"})
     */
    private $gezagsverhouding;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Verblijfstitel", inversedBy="natuurlijkPersoon", cascade={"persist", "remove"})
     */
    private $verblijfstitel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ouder", mappedBy="natuurlijkPersoon", orphanRemoval=true)
     */
    private $ouders;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Kind", mappedBy="natuurlijkPersoon", orphanRemoval=true)
     */
    private $kinderen;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Partner", mappedBy="natuurlijkPersoon", orphanRemoval=true)
     */
    private $partners;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reisdocument", mappedBy="natuurlijkPersoon", orphanRemoval=true)
     */
    private $reisdocumenten;

    public function __construct()
    {
        $this->nationaliteit = new ArrayCollection();
        $this->ouders = new ArrayCollection();
        $this->kinderen = new ArrayCollection();
        $this->partners = new ArrayCollection();
        $this->reisdocumenten = new ArrayCollection();
    }

    public function getId(): ?int
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

    /**
     * @return Collection|Reisdocument[]
     */
    public function getReisdocumenten(): Collection
    {
        return $this->reisdocumenten;
    }

    public function addReisdocumenten(Reisdocument $reisdocumenten): self
    {
        if (!$this->reisdocumenten->contains($reisdocumenten)) {
            $this->reisdocumenten[] = $reisdocumenten;
            $reisdocumenten->setNatuurlijkPersoon($this);
        }

        return $this;
    }

    public function removeReisdocumenten(Reisdocument $reisdocumenten): self
    {
        if ($this->reisdocumenten->contains($reisdocumenten)) {
            $this->reisdocumenten->removeElement($reisdocumenten);
            // set the owning side to null (unless already changed)
            if ($reisdocumenten->getNatuurlijkPersoon() === $this) {
                $reisdocumenten->setNatuurlijkPersoon(null);
            }
        }

        return $this;
    }
}
