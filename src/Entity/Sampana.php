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
     * @ORM\OneToMany(targetEntity=SampanaKristiana::class, mappedBy="sampana")
     */
    private $sampanaKristianas;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sokajy;

    public function __construct()
    {
        $this->toeranas = new ArrayCollection();
        $this->sampanaKristianas = new ArrayCollection();
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

    /**
     * @return Collection|SampanaKristiana[]
     */
    public function getSampanaKristianas(): Collection
    {
        return $this->sampanaKristianas;
    }

    public function addSampanaKristiana(SampanaKristiana $sampanaKristiana): self
    {
        if (!$this->sampanaKristianas->contains($sampanaKristiana)) {
            $this->sampanaKristianas[] = $sampanaKristiana;
            $sampanaKristiana->setSampana($this);
        }

        return $this;
    }

    public function removeSampanaKristiana(SampanaKristiana $sampanaKristiana): self
    {
        if ($this->sampanaKristianas->contains($sampanaKristiana)) {
            $this->sampanaKristianas->removeElement($sampanaKristiana);
            // set the owning side to null (unless already changed)
            if ($sampanaKristiana->getSampana() === $this) {
                $sampanaKristiana->setSampana(null);
            }
        }

        return $this;
    }

    public function getSokajy(): ?string
    {
        return $this->sokajy;
    }

    public function setSokajy(string $sokajy): self
    {
        $this->sokajy = $sokajy;

        return $this;
    }

}
