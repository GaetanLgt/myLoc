<?php

namespace App\Entity;

use App\Repository\EmpruntRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmpruntRepository::class)
 */
class Emprunt
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFin;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="emprunts")
     */
    private $Emprunter;

    /**
     * @ORM\OneToMany(targetEntity=Affaires::class, mappedBy="emprunt")
     */
    private $affaires;

    /**
     * @ORM\ManyToOne(targetEntity=Affaires::class, inversedBy="emprunts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $affaire;

    public function __construct()
    {
        $this->affaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getEmprunter(): ?User
    {
        return $this->Emprunter;
    }

    public function setEmprunter(?User $Emprunter): self
    {
        $this->Emprunter = $Emprunter;

        return $this;
    }

    /**
     * @return Collection|Affaires[]
     */
    public function getAffaires(): Collection
    {
        return $this->affaires;
    }

    public function addAffaire(Affaires $affaire): self
    {
        if (!$this->affaires->contains($affaire)) {
            $this->affaires[] = $affaire;
            $affaire->setEmprunt($this);
        }

        return $this;
    }

    public function removeAffaire(Affaires $affaire): self
    {
        if ($this->affaires->contains($affaire)) {
            $this->affaires->removeElement($affaire);
            // set the owning side to null (unless already changed)
            if ($affaire->getEmprunt() === $this) {
                $affaire->setEmprunt(null);
            }
        }

        return $this;
    }

    public function getAffaire(): ?Affaires
    {
        return $this->affaire;
    }

    public function setAffaire(?Affaires $affaire): self
    {
        $this->affaire = $affaire;

        return $this;
    }
}
