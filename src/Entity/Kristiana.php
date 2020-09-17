<?php

namespace App\Entity;

use App\Repository\KristianaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KristianaRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Kristiana
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $kaody;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $anarana;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $fanampiny;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $finday;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mailaka;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $asa;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datyNandraisana;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $sokajy;

    /**
     * @ORM\Column(type="boolean")
     */
    private $mpandray;

    /**
     * @ORM\Column(type="boolean")
     */
    private $maty;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $adiresy;

    public function __construct()
    {
        $this->mpikambanas = new ArrayCollection();
        $this->adidys = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKaody(): ?string
    {
        return $this->kaody;
    }

    /**
    * @ORM\PrePersist
    */
    public function setKaody()
    {
        $this->kaody = $this->getSokajy()."-".$this->getId();
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

    public function getFanampiny(): ?string
    {
        return $this->fanampiny;
    }

    public function setFanampiny(string $fanampiny): self
    {
        $this->fanampiny = $fanampiny;

        return $this;
    }

    public function getFinday(): ?string
    {
        return $this->finday;
    }

    public function setFinday(?string $finday): self
    {
        $this->finday = $finday;

        return $this;
    }

    public function getMailaka(): ?string
    {
        return $this->mailaka;
    }

    public function setMailaka(?string $mailaka): self
    {
        $this->mailaka = $mailaka;

        return $this;
    }

    public function getAsa(): ?string
    {
        return $this->asa;
    }

    public function setAsa(?string $asa): self
    {
        $this->asa = $asa;

        return $this;
    }

    public function getDatyNandraisana(): ?\DateTimeInterface
    {
        return $this->datyNandraisana;
    }

    public function setDatyNandraisana(?\DateTimeInterface $datyNandraisana): self
    {
        $this->datyNandraisana = $datyNandraisana;

        return $this;
    }

    public function getSokajy(): ?string
    {
        return $this->sokajy;
    }

    public function setSokajy(?string $sokajy): self
    {
        $this->sokajy = $sokajy;

        return $this;
    }

    public function getMpandray(): ?bool
    {
        return $this->mpandray;
    }

    public function setMpandray(bool $mpandray): self
    {
        $this->mpandray = $mpandray;

        return $this;
    }

    public function getMaty(): ?bool
    {
        return $this->maty;
    }

    public function setMaty(bool $maty): self
    {
        $this->maty = $maty;

        return $this;
    }

    public function getAdiresy(): ?string
    {
        return $this->adiresy;
    }

    public function setAdiresy(?string $adiresy): self
    {
        $this->adiresy = $adiresy;

        return $this;
    }

}
