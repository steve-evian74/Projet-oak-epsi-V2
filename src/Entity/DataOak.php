<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DataOakRepository")
 */
class DataOak
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $latitude;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=19)
     */
    private $TimeStamp;

    /**
     * @ORM\Column(type="smallint")
     */
    private $Qualite_Air;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Historique", mappedBy="dataOak")
     */
    private $fk_Historique;

    public function __construct()
    {
        $this->fk_Historique = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getTimeStamp(): ?string
    {
        return $this->TimeStamp;
    }

    public function setTimeStamp(string $TimeStamp): self
    {
        $this->TimeStamp = $TimeStamp;

        return $this;
    }

    public function getQualiteAir(): ?int
    {
        return $this->Qualite_Air;
    }

    public function setQualiteAir(int $Qualite_Air): self
    {
        $this->Qualite_Air = $Qualite_Air;

        return $this;
    }

    /**
     * @return Collection|Historique[]
     */
    public function getFkHistorique(): Collection
    {
        return $this->fk_Historique;
    }

    public function addFkHistorique(Historique $fkHistorique): self
    {
        if (!$this->fk_Historique->contains($fkHistorique)) {
            $this->fk_Historique[] = $fkHistorique;
            $fkHistorique->setDataOak($this);
        }

        return $this;
    }

    public function removeFkHistorique(Historique $fkHistorique): self
    {
        if ($this->fk_Historique->contains($fkHistorique)) {
            $this->fk_Historique->removeElement($fkHistorique);
            // set the owning side to null (unless already changed)
            if ($fkHistorique->getDataOak() === $this) {
                $fkHistorique->setDataOak(null);
            }
        }

        return $this;
    }

}
