<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ReisdocumentRepository")
 * @Gedmo\Loggable
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
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255)
     */
    private $aanduidingInhoudingOfVermissing;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="string", length=255)
     */
    private $reisdocumentnummer;
    
    // On an object level we stil want to be able to gett the id
    public function getId(): ?string
    {
    	return $this->uuid;
    }
    
    public function getUuid(): ?string
    {
    	return $this->uuid;
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
