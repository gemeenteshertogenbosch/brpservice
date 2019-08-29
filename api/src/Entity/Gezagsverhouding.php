<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GezagsverhoudingRepository")
 */
class Gezagsverhouding
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $indicatieCurateleRegister;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $indicatieGezagMinderjarige;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    private $inOnderzoek;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\NatuurlijkPersoon", mappedBy="gezagsverhouding", cascade={"persist", "remove"})
     */
    private $natuurlijkPersoon;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNatuurlijkPersoon(): ?NatuurlijkPersoon
    {
    	return $this->natuurlijkPersoon;
    }

    public function setNatuurlijkPersoon(?NatuurlijkPersoon $natuurlijkPersoon): self
    {
    	$this->natuurlijkPersoon= $natuurlijkPersoon;

        // set (or unset) the owning side of the relation if necessary
    	$newGezagsverhouding = $natuurlijkPersoon=== null ? null : $this;
    	if ($newGezagsverhouding !== $natuurlijkPersoon->getGezagsverhouding()) {
    		$natuurlijkPersoon->setGezagsverhouding($newGezagsverhouding);
        }

        return $this;
    }
}
