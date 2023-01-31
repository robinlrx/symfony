<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\VehiclesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiclesRepository::class)]
#[ApiResource]
class Vehicles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $model = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $manufacturer = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cost_in_credits = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $length = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $max_atmosphering_speed = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $crew = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $passengers = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cargo_capacity = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $consumables = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vehicle_class = null;

    #[ORM\ManyToMany(targetEntity: People::class, mappedBy: 'vehicles')]
    private Collection $pilots;

    #[ORM\ManyToMany(targetEntity: Films::class, mappedBy: 'vehicles')]
    private Collection $films;

    public function __construct()
    {
        $this->pilots = new ArrayCollection();
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

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getManufacturer(): ?string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(?string $manufacturer): self
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    public function getCostInCredits(): ?string
    {
        return $this->cost_in_credits;
    }

    public function setCostInCredits(?string $cost_in_credits): self
    {
        $this->cost_in_credits = $cost_in_credits;

        return $this;
    }

    public function getLength(): ?string
    {
        return $this->length;
    }

    public function setLength(?string $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getMaxAtmospheringSpeed(): ?string
    {
        return $this->max_atmosphering_speed;
    }

    public function setMaxAtmospheringSpeed(?string $max_atmosphering_speed): self
    {
        $this->max_atmosphering_speed = $max_atmosphering_speed;

        return $this;
    }

    public function getCrew(): ?string
    {
        return $this->crew;
    }

    public function setCrew(?string $crew): self
    {
        $this->crew = $crew;

        return $this;
    }

    public function getPassengers(): ?string
    {
        return $this->passengers;
    }

    public function setPassengers(?string $passengers): self
    {
        $this->passengers = $passengers;

        return $this;
    }

    public function getCargoCapacity(): ?string
    {
        return $this->cargo_capacity;
    }

    public function setCargoCapacity(?string $cargo_capacity): self
    {
        $this->cargo_capacity = $cargo_capacity;

        return $this;
    }

    public function getConsumables(): ?string
    {
        return $this->consumables;
    }

    public function setConsumables(?string $consumables): self
    {
        $this->consumables = $consumables;

        return $this;
    }

    public function getVehicleClass(): ?string
    {
        return $this->vehicle_class;
    }

    public function setVehicleClass(?string $vehicle_class): self
    {
        $this->vehicle_class = $vehicle_class;

        return $this;
    }

    /**
     * @return Collection<int, People>
     */
    public function getPilots(): Collection
    {
        return $this->pilots;
    }

    public function addPilot(People $pilot): self
    {
        if (!$this->pilots->contains($pilot)) {
            $this->pilots->add($pilot);
            $pilot->addVehicle($this);
        }

        return $this;
    }

    public function removePilot(People $pilot): self
    {
        if ($this->pilots->removeElement($pilot)) {
            $pilot->removeVehicle($this);
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
            $film->addVehicle($this);
        }

        return $this;
    }

    public function removeFilm(Films $film): self
    {
        if ($this->films->removeElement($film)) {
            $film->removeVehicle($this);
        }

        return $this;
    }
}
