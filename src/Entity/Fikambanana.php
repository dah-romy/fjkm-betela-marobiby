<?php

namespace App\Entity;

use App\Repository\FikambananaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FikambananaRepository::class)
 */
class Fikambanana
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $anarana;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fanafohizana;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $faneva;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $toerana = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnarana(): ?string
    {
        return $this->anarana;
    }

    public function setAnarana(string $anarana): self
    {
        $this->anarana = $anarana;

        return $this;
    }

    public function getFanafohizana(): ?string
    {
        return $this->fanafohizana;
    }

    public function setFanafohizana(?string $fanafohizana): self
    {
        $this->fanafohizana = $fanafohizana;

        return $this;
    }

    public function getFaneva(): ?string
    {
        return $this->faneva;
    }

    public function setFaneva(?string $faneva): self
    {
        $this->faneva = $faneva;

        return $this;
    }

    public function getToerana(): ?array
    {
        return $this->toerana;
    }

    public function setToerana(?array $toerana): self
    {
        $this->toerana = $toerana;

        return $this;
    }
}
