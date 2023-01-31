<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SpeciesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpeciesRepository::class)]
#[ApiResource]
class Species
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $classification = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $designation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $average_height = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $skin_colors = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $hair_colors = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $eye_colors = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $average_lifespan = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $language = null;

    #[ORM\OneToMany(mappedBy: 'species', targetEntity: People::class)]
    private Collection $people;

    #[ORM\ManyToMany(targetEntity: Films::class, mappedBy: 'species')]
    private Collection $films;

    public function __construct()
    {
        $this->people = new ArrayCollection();
        $this->films = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getClassification(): ?string
    {
        return $this->classification;
    }

    public function setClassification(?string $classification): self
    {
        $this->classification = $classification;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getAverageHeight(): ?string
    {
        return $this->average_height;
    }

    public function setAverageHeight(?string $average_height): self
    {
        $this->average_height = $average_height;

        return $this;
    }

    public function getSkinColors(): ?string
    {
        return $this->skin_colors;
    }

    public function setSkinColors(?string $skin_colors): self
    {
        $this->skin_colors = $skin_colors;

        return $this;
    }

    public function getHairColors(): ?string
    {
        return $this->hair_colors;
    }

    public function setHairColors(?string $hair_colors): self
    {
        $this->hair_colors = $hair_colors;

        return $this;
    }

    public function getEyeColors(): ?string
    {
        return $this->eye_colors;
    }

    public function setEyeColors(?string $eye_colors): self
    {
        $this->eye_colors = $eye_colors;

        return $this;
    }

    public function getAverageLifespan(): ?string
    {
        return $this->average_lifespan;
    }

    public function setAverageLifespan(?string $average_lifespan): self
    {
        $this->average_lifespan = $average_lifespan;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return Collection<int, People>
     */
    public function getPeople(): Collection
    {
        return $this->people;
    }

    public function addPerson(People $person): self
    {
        if (!$this->people->contains($person)) {
            $this->people->add($person);
            $person->setSpecies($this);
        }

        return $this;
    }

    public function removePerson(People $person): self
    {
        if ($this->people->removeElement($person)) {
            // set the owning side to null (unless already changed)
            if ($person->getSpecies() === $this) {
                $person->setSpecies(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Films>
     */
    public function getFilms(): Collection
    {
        return $this->films;
    }

    public function addFilm(Films $film): self
    {
        if (!$this->films->contains($film)) {
            $this->films->add($film);
            $film->addSpecies($this);
        }

        return $this;
    }

    public function removeFilm(Films $film): self
    {
        if ($this->films->removeElement($film)) {
            $film->removeSpecies($this);
        }

        return $this;
    }
}
