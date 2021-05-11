<?php

namespace App\Entity;

use App\Repository\RealisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RealisateurRepository::class)
 */
class Realisateur
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\ManyToMany(targetEntity=Film::class, inversedBy="realisateurs")
     */
    private $film_relation;

    public function __construct()
    {
        $this->film_relation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection|Film[]
     */
    public function getFilmRelation(): Collection
    {
        return $this->film_relation;
    }

    public function addFilmRelation(Film $filmRelation): self
    {
        if (!$this->film_relation->contains($filmRelation)) {
            $this->film_relation[] = $filmRelation;
        }

        return $this;
    }

    public function removeFilmRelation(Film $filmRelation): self
    {
        $this->film_relation->removeElement($filmRelation);

        return $this;
    }
}
