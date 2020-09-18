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
     * @ORM\OneToOne(targetEntity=SampanaKristiana::class, mappedBy="toerana", cascade={"persist", "remove"})
     */
    private $sampanaKristiana;

    public function __construct()
    {
        $this->sampanas = new ArrayCollection();
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

    public function getSampanaKristiana(): ?SampanaKristiana
    {
        return $this->sampanaKristiana;
    }

    public function setSampanaKristiana(?SampanaKristiana $sampanaKristiana): self
    {
        $this->sampanaKristiana = $sampanaKristiana;

        // set (or unset) the owning side of the relation if necessary
        $newToerana = null === $sampanaKristiana ? null : $this;
        if ($sampanaKristiana->getToerana() !== $newToerana) {
            $sampanaKristiana->setToerana($newToerana);
        }

        return $this;
    }

}
