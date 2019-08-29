<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ReisdocumentRepository")
 */
class Reisdocument
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $aanduidingInhoudingOfVermissing;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reisdocumentnummer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAanduidingInhoudingOfVermissing(): ?string
    {
        return $this->aanduidingInhoudingOfVermissing;
    }

    public function setAanduidingInhoudingOfVermissing(string $aanduidingInhoudingOfVermissing): self
    {
        $this->aanduidingInhoudingOfVermissing = $aanduidingInhoudingOfVermissing;

        return $this;
    }

    public function getReisdocumentnummer(): ?string
    {
        return $this->reisdocumentnummer;
    }

    public function setReisdocumentnummer(string $reisdocumentnummer): self
    {
        $this->reisdocumentnummer = $reisdocumentnummer;

        return $this;
    }
}
