<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FilmRepository::class)
 */
class Film
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
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $affiche;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $recompense;

    /**
     * @ORM\Column(type="date")
     */
    private $annee;

    /**
     * @ORM\Column(type="text")
     */
    private $synopsis;

    /**
     * @ORM\ManyToMany(targetEntity=Realisateur::class, mappedBy="film_relation")
     */
    private $realisateurs;

    public function __construct()
    {
        $this->realisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getAffiche(): ?string
    {
        return $this->affiche;
    }

    public function setAffiche(string $affiche): self
    {
        $this->affiche = $affiche;

        return $this;
    }

    public function getRecompense(): ?string
    {
        return $this->recompense;
    }

    public function setRecompense(?string $recompense): self
    {
        $this->recompense = $recompense;

        return $this;
    }

    public function getAnnee(): ?\DateTimeInterface
    {
        return $this->annee;
    }

    public function setAnnee(\DateTimeInterface $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * @return Collection|Realisateur[]
     */
    public function getRealisateurs(): Collection
    {
        return $this->realisateurs;
    }

    public function addRealisateur(Realisateur $realisateur): self
    {
        if (!$this->realisateurs->contains($realisateur)) {
            $this->realisateurs[] = $realisateur;
            $realisateur->addFilmRelation($this);
        }

        return $this;
    }

    public function removeRealisateur(Realisateur $realisateur): self
    {
        if ($this->realisateurs->removeElement($realisateur)) {
            $realisateur->removeFilmRelation($this);
        }

        return $this;
    }
}
