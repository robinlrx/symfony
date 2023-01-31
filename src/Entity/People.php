<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PeopleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeopleRepository::class)]
#[ApiResource]
class People
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $height = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mass = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $hair_color = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $skin_color = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $eye_color = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $birth_year = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $gender = null;

    #[ORM\ManyToOne(inversedBy: 'residents')]
    private ?Planets $homeworld = null;

    #[ORM\ManyToMany(targetEntity: Films::class, inversedBy: 'characters')]
    private Collection $films;

    #[ORM\ManyToOne(inversedBy: 'people')]
    private ?Species $species = null;

    #[ORM\ManyToMany(targetEntity: Vehicles::class, inversedBy: 'pilots')]
    private Collection $vehicles;

    #[ORM\ManyToMany(targetEntity: Starships::class, inversedBy: 'pilots')]
    private Collection $starships;

    public function __construct()
    {
        $this->films = new ArrayCollection();
        $this->vehicles = new ArrayCollection();
        $this->starships = new ArrayCollection();
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

    public function getHeight(): ?string
    {
        return $this->height;
    }

    public function setHeight(?string $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getMass(): ?string
    {
        return $this->mass;
    }

    public function setMass(?string $mass): self
    {
        $this->mass = $mass;

        return $this;
    }

    public function getHairColor(): ?string
    {
        return $this->hair_color;
    }

    public function setHairColor(?string $hair_color): self
    {
        $this->hair_color = $hair_color;

        return $this;
    }

    public function getSkinColor(): ?string
    {
        return $this->skin_color;
    }

    public function setSkinColor(?string $skin_color): self
    {
        $this->skin_color = $skin_color;

        return $this;
    }

    public function getEyeColor(): ?string
    {
        return $this->eye_color;
    }

    public function setEyeColor(?string $eye_color): self
    {
        $this->eye_color = $eye_color;

        return $this;
    }

    public function getBirthYear(): ?string
    {
        return $this->birth_year;
    }

    public function setBirthYear(?string $birth_year): self
    {
        $this->birth_year = $birth_year;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getHomeworld(): ?Planets
    {
        return $this->homeworld;
    }

    public function setHomeworld(?Planets $homeworld): self
    {
        $this->homeworld = $homeworld;

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
        }

        return $this;
    }

    public function removeFilm(Films $film): self
    {
        $this->films->removeElement($film);

        return $this;
    }

    public function getSpecies(): ?Species
    {
        return $this->species;
    }

    public function setSpecies(?Species $species): self
    {
        $this->species = $species;

        return $this;
    }

    /**
     * @return Collection<int, Vehicles>
     */
    public function getVehicles(): Collection
    {
        return $this->vehicles;
    }

    public function addVehicle(Vehicles $vehicle): self
    {
        if (!$this->vehicles->contains($vehicle)) {
            $this->vehicles->add($vehicle);
        }

        return $this;
    }

    public function removeVehicle(Vehicles $vehicle): self
    {
        $this->vehicles->removeElement($vehicle);

        return $this;
    }

    /**
     * @return Collection<int, Starships>
     */
    public function getStarships(): Collection
    {
        return $this->starships;
    }

    public function addStarship(Starships $starship): self
    {
        if (!$this->starships->contains($starship)) {
            $this->starships->add($starship);
        }

        return $this;
    }

    public function removeStarship(Starships $starship): self
    {
        $this->starships->removeElement($starship);

        return $this;
    }
}
