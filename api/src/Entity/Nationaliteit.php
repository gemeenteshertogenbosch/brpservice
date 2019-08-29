<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NationaliteitRepository")
 */
class Nationaliteit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NatuurlijkPersoon", inversedBy="nationaliteit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $natuurlijkPersoon;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNatuurlijkPersoon(): ?NatuurlijkPersoon
    {
        return $this->natuurlijkPersoon;
    }

    public function setNatuurlijkPersoon(?NatuurlijkPersoon $natuurlijkPersoon): self
    {
        $this->natuurlijkPersoon = $natuurlijkPersoon;

        return $this;
    }
}
