<?php

namespace App\Entity;

use App\Repository\RecordRepository;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=RecordRepository::class)
 */
class Record
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ico;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pf;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ojm;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $jmn;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $p_dph;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $p_cedr;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_created;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $record_name;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPf(): ?int
    {
        return $this->pf;
    }

    public function setPf(?int $pf): self
    {
        $this->pf = $pf;

        return $this;
    }

    public function getOjm(): ?string
    {
        return $this->ojm;
    }

    public function setOjm(?string $ojm): self
    {
        $this->ojm = $ojm;

        return $this;
    }

    public function getJmn(): ?string
    {
        return $this->jmn;
    }

    public function setJmn(?string $jmn): self
    {
        $this->jmn = $jmn;

        return $this;
    }

    public function getPDph(): ?string
    {
        return $this->p_dph;
    }

    public function setPDph(?string $p_dph): self
    {
        $this->p_dph = $p_dph;

        return $this;
    }

    public function getPCedr(): ?string
    {
        return $this->p_cedr;
    }

    public function setPCedr(string $p_cedr): self
    {
        $this->p_cedr = $p_cedr;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->date_created;
    }

    public function setDateCreated(?\DateTimeInterface $date_created): self
    {
        $this->date_created = $date_created;

        return $this;
    }

    public function getRecordName(): ?string
    {
        return $this->record_name;
    }

    public function setRecordName(?string $record_name): self
    {
        $this->record_name = $record_name;

        return $this;
    }
}
