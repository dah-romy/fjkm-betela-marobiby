<?php

namespace App\Entity;

use App\Repository\ToeranaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ToeranaRepository::class)
 */
class Toerana
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
     * @ORM\ManyToMany(targetEntity=Sampana::class, inversedBy="toeranas")
     */
    private $sampanas;

    /**
     * @ORM\OneToMany(targetEntity=SampanaKristiana::class, mappedBy="toerana")
     */
    private $sampanaKristianas;

    public function __construct()
    {
        $this->sampanas = new ArrayCollection();
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

    /**
     * @return Collection|Sampana[]
     */
    public function getSampanas(): Collection
    {
        return $this->sampanas;
    }

    public function addSampana(Sampana $sampana): self
    {
        if (!$this->sampanas->contains($sampana)) {
            $this->sampanas[] = $sampana;
        }

        return $this;
    }

    public function removeSampana(Sampana $sampana): self
    {
        if ($this->sampanas->contains($sampana)) {
            $this->sampanas->removeElement($sampana);
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
            $sampanaKristiana->setToerana($this);
        }

        return $this;
    }

    public function removeSampanaKristiana(SampanaKristiana $sampanaKristiana): self
    {
        if ($this->sampanaKristianas->contains($sampanaKristiana)) {
            $this->sampanaKristianas->removeElement($sampanaKristiana);
            // set the owning side to null (unless already changed)
            if ($sampanaKristiana->getToerana() === $this) {
                $sampanaKristiana->setToerana(null);
            }
        }

        return $this;
    }
}
