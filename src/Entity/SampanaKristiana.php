<?php

namespace App\Entity;

use App\Repository\SampanaKristianaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SampanaKristianaRepository::class)
 */
class SampanaKristiana
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Kristiana::class, inversedBy="sampanaKristianas")
     */
    private $kristiana;

    /**
     * @ORM\OneToOne(targetEntity=Sampana::class, inversedBy="sampanaKristiana", cascade={"persist", "remove"})
     */
    private $sampana;

    /**
     * @ORM\OneToOne(targetEntity=Toerana::class, inversedBy="sampanaKristiana", cascade={"persist", "remove"})
     */
    private $toerana;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKristiana(): ?Kristiana
    {
        return $this->kristiana;
    }

    public function setKristiana(?Kristiana $kristiana): self
    {
        $this->kristiana = $kristiana;

        return $this;
    }

    public function getSampana(): ?Sampana
    {
        return $this->sampana;
    }

    public function setSampana(?Sampana $sampana): self
    {
        $this->sampana = $sampana;

        return $this;
    }

    public function getToerana(): ?Toerana
    {
        return $this->toerana;
    }

    public function setToerana(?Toerana $toerana): self
    {
        $this->toerana = $toerana;

        return $this;
    }
}
