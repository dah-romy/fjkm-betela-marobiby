<?php

namespace App\Entity;

use App\Entity\Toerana;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\SampanaRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=SampanaRepository::class)
 */
class Sampana
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
     * @ORM\ManyToMany(targetEntity=Toerana::class, mappedBy="sampanas")
     */
    private $toeranas;

    /**
     * @ORM\OneToOne(targetEntity=SampanaKristiana::class, mappedBy="sampana", cascade={"persist", "remove"})
     */
    private $sampanaKristiana;

    public function __construct()
    {
        $this->toeranas = new ArrayCollection();
    }

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

    /**
     * @return Collection|Toerana[]
     */
    public function getToeranas(): Collection
    {
        return $this->toeranas;
    }

    public function addToerana(Toerana $toerana): self
    {
        if (!$this->toeranas->contains($toerana)) {
            $this->toeranas[] = $toerana;
            $toerana->addSampana($this);
        }

        return $this;
    }

    public function removeToerana(Toerana $toerana): self
    {
        if ($this->toeranas->contains($toerana)) {
            $this->toeranas->removeElement($toerana);
            $toerana->removeSampana($this);
        }

        return $this;
    }

    public function getSampanaKristiana(): ?SampanaKristiana
    {
        return $this->sampanaKristiana;
    }

    public function setSampanaKristiana(?SampanaKristiana $sampanaKristiana): self
    {
        $this->sampanaKristiana = $sampanaKristiana;

        // set (or unset) the owning side of the relation if necessary
        $newSampana = null === $sampanaKristiana ? null : $this;
        if ($sampanaKristiana->getSampana() !== $newSampana) {
            $sampanaKristiana->setSampana($newSampana);
        }

        return $this;
    }
}
