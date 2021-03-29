<?php

namespace App\Entity;

use App\Repository\RecordICORepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecordICORepository::class)
 */
class RecordICO
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $of;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $dv;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ico;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $pf;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $time_created;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOf(): ?string
    {
        return $this->of;
    }

    public function setOf(?string $of): self
    {
        $this->of = $of;

        return $this;
    }

    public function getDv(): ?string
    {
        return $this->dv;
    }

    public function setDv(?string $dv): self
    {
        $this->dv = $dv;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getIco(): ?int
    {
        return $this->ico;
    }

    public function setIco(?int $ico): self
    {
        $this->ico = $ico;

        return $this;
    }

    public function getPf(): ?string
    {
        return $this->pf;
    }

    public function setPf(?string $pf): self
    {
        $this->pf = $pf;

        return $this;
    }

    public function getTimeCreated(): ?\DateTimeInterface
    {
        return $this->time_created;
    }

    public function setTimeCreated(?\DateTimeInterface $time_created): self
    {
        $this->time_created = $time_created;

        return $this;
    }
}
