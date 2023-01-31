<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PlanetsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanetsRepository::class)]
#[ApiResource]
class Planets
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rotation_period = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $orbital_period = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $diameter = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $climate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $gravity = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $terrain = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $surface_water = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $population = null;

    #[ORM\OneToMany(mappedBy: 'homeworld', targetEntity: People::class)]
    private Collection $residents;

    #[ORM\ManyToMany(targetEntity: Films::class, inversedBy: 'planets')]
    private Collection $films;

    public function __construct()
    {
        $this->residents = new ArrayCollection();
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

    public function getRotationPeriod(): ?string
    {
        return $this->rotation_period;
    }

    public function setRotationPeriod(?string $rotation_period): self
    {
        $this->rotation_period = $rotation_period;

        return $this;
    }

    public function getOrbitalPeriod(): ?string
    {
        return $this->orbital_period;
    }

    public function setOrbitalPeriod(?string $orbital_period): self
    {
        $this->orbital_period = $orbital_period;

        return $this;
    }

    public function getDiameter(): ?string
    {
        return $this->diameter;
    }

    public function setDiameter(?string $diameter): self
    {
        $this->diameter = $diameter;

        return $this;
    }

    public function getClimate(): ?string
    {
        return $this->climate;
    }

    public function setClimate(?string $climate): self
    {
        $this->climate = $climate;

        return $this;
    }

    public function getGravity(): ?string
    {
        return $this->gravity;
    }

    public function setGravity(?string $gravity): self
    {
        $this->gravity = $gravity;

        return $this;
    }

    public function getTerrain(): ?string
    {
        return $this->terrain;
    }

    public function setTerrain(?string $terrain): self
    {
        $this->terrain = $terrain;

        return $this;
    }

    public function getSurfaceWater(): ?string
    {
        return $this->surface_water;
    }

    public function setSurfaceWater(?string $surface_water): self
    {
        $this->surface_water = $surface_water;

        return $this;
    }

    public function getPopulation(): ?string
    {
        return $this->population;
    }

    public function setPopulation(?string $population): self
    {
        $this->population = $population;

        return $this;
    }

    /**
     * @return Collection<int, People>
     */
    public function getResidents(): Collection
    {
        return $this->residents;
    }

    public function addResident(People $resident): self
    {
        if (!$this->residents->contains($resident)) {
            $this->residents->add($resident);
            $resident->setHomeworld($this);
        }

        return $this;
    }

    public function removeResident(People $resident): self
    {
        if ($this->residents->removeElement($resident)) {
            // set the owning side to null (unless already changed)
            if ($resident->getHomeworld() === $this) {
                $resident->setHomeworld(null);
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
        }

        return $this;
    }

    public function removeFilm(Films $film): self
    {
        $this->films->removeElement($film);

        return $this;
    }
}
