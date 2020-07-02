<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HistoriqueRepository")
 */
class Historique
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $Date;

    /**
     * @ORM\Column(type="integer")
     */
    private $Qualite;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DataOak", inversedBy="fk_Historique")
     */
    private $dataOak;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getQualite(): ?int
    {
        return $this->Qualite;
    }

    public function setQualite(int $Qualite): self
    {
        $this->Qualite = $Qualite;

        return $this;
    }

    public function getDataOak(): ?DataOak
    {
        return $this->dataOak;
    }

    public function setDataOak(?DataOak $dataOak): self
    {
        $this->dataOak = $dataOak;

        return $this;
    }

}

