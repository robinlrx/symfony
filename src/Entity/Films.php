<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\FilmsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmsRepository::class)]
#[ApiResource]
class Films
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(nullable: true)]
    private ?int $episode_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $opening_crawl = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $director = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $producer = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $release_date = null;

    #[ORM\ManyToMany(targetEntity: People::class, mappedBy: 'films')]
    private Collection $characters;

    #[ORM\ManyToMany(targetEntity: Planets::class, mappedBy: 'films')]
    private Collection $planets;

    #[ORM\ManyToMany(targetEntity: Starships::class, inversedBy: 'films')]
    private Collection $starships;

    #[ORM\ManyToMany(targetEntity: Vehicles::class, inversedBy: 'films')]
    private Collection $vehicles;

    #[ORM\ManyToMany(targetEntity: Species::class, inversedBy: 'films')]
    private Collection $species;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
        $this->planets = new ArrayCollection();
        $this->starships = new ArrayCollection();
        $this->vehicles = new ArrayCollection();
        $this->species = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getEpisodeId(): ?int
    {
        return $this->episode_id;
    }

    public function setEpisodeId(?int $episode_id): self
    {
        $this->episode_id = $episode_id;

        return $this;
    }

    public function getOpeningCrawl(): ?string
    {
        return $this->opening_crawl;
    }

    public function setOpeningCrawl(?string $opening_crawl): self
    {
        $this->opening_crawl = $opening_crawl;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(?string $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function getProducer(): ?string
    {
        return $this->producer;
    }

    public function setProducer(?string $producer): self
    {
        $this->producer = $producer;

        return $this;
    }

    public function getReleaseDate(): ?string
    {
        return $this->release_date;
    }

    public function setReleaseDate(?string $release_date): self
    {
        $this->release_date = $release_date;

        return $this;
    }

    /**
     * @return Collection<int, People>
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(People $character): self
    {
        if (!$this->characters->contains($character)) {
            $this->characters->add($character);
            $character->addFilm($this);
        }

        return $this;
    }

    public function removeCharacter(People $character): self
    {
        if ($this->characters->removeElement($character)) {
            $character->removeFilm($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Planets>
     */
    public function getPlanets(): Collection
    {
        return $this->planets;
    }

    public function addPlanet(Planets $planet): self
    {
        if (!$this->planets->contains($planet)) {
            $this->planets->add($planet);
            $planet->addFilm($this);
        }

        return $this;
    }

    public function removePlanet(Planets $planet): self
    {
        if ($this->planets->removeElement($planet)) {
            $planet->removeFilm($this);
        }

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
     * @return Collection<int, Species>
     */
    public function getSpecies(): Collection
    {
        return $this->species;
    }

    public function addSpecies(Species $species): self
    {
        if (!$this->species->contains($species)) {
            $this->species->add($species);
        }

        return $this;
    }

    public function removeSpecies(Species $species): self
    {
        $this->species->removeElement($species);

        return $this;
    }
}
