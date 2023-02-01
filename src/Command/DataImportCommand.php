<?php

namespace App\Command;

use App\Entity\Films;
use App\Entity\People;
use App\Entity\Planets;
use App\Entity\Species;
use App\Entity\Starships;
use App\Entity\Vehicles;
use GuzzleHttp\Client;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'data:import',
    description: 'Add a short description for your command',
)]
class DataImportCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->setName('app:import-data')
            ->setDescription('Import data from Star Wars API')
            ->addOption('entity', null, InputOption::VALUE_REQUIRED, 'Entity to import (films, people, planets, starships, vehicles, species)')
            #->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            #->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $entity = $input->getOption('entity');

        if ($entity === 'people') {
            $this->importPeopleData($io);
        }
        if ($entity === 'planets') {
            $this->importPlanetData($io);
        }
        if ($entity === 'films') {
            $this->importFilmData($io);
        }
        if ($entity === 'species') {
            $this->importSpecieData($io);
        }
        if ($entity === 'vehicles') {
            $this->importVehicleData($io);
        }
        if ($entity === 'starships') {
            $this->importStarshipData($io);
        }
        else {
            $io->error(sprintf('Invalid entity: %s', $entity));
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }

    private function importPeopleData(SymfonyStyle $io)
    {
        $client = new Client();
        $res = $client->get('https://swapi.dev/api/people/');
        $data = json_decode($res->getBody(), true);

        $container = $this->getApplication()->getKernel()->getContainer();
        $entityManager = $container->get('doctrine')->getManager();
        foreach ($data['results'] as $item) {
            $person = new People();
            $person->setName($item['name']);
            $person->setHeight($item['height']);
            $person->setMass($item['mass']);
            $person->setHairColor($item['hair_color']);
            $person->setSkinColor($item['skin_color']);
            $person->setEyeColor($item['eye_color']);
            $person->setBirthYear($item['birth_year']);
            $person->setGender($item['gender']);
            #$person->setHomeworld($item['homeworld']);
            #$person->setSpecies($item['species']);
            // ...
            $entityManager->persist($person);
        }
        $entityManager->flush();

        $io->success(sprintf('%d people imported successfully', count($data['results'])));
    }

    private function importPlanetData(SymfonyStyle $io)
    {
        $client = new Client();
        $res = $client->get('https://swapi.dev/api/planets/');
        $data = json_decode($res->getBody(), true);

        $container = $this->getApplication()->getKernel()->getContainer();
        $entityManager = $container->get('doctrine')->getManager();
        foreach ($data['results'] as $item) {
            $planet = new Planets();
            $planet->setName($item['name']);
            $planet->setRotationPeriod($item['rotation_period']);
            $planet->setOrbitalPeriod($item['orbital_period']);
            $planet->setDiameter($item['diameter']);
            $planet->setClimate($item['climate']);
            $planet->setGravity($item['gravity']);
            $planet->setTerrain($item['terrain']);
            $planet->setSurfaceWater($item['surface_water']);
            $planet->setPopulation($item['population']);
            // ...
            $entityManager->persist($planet);
        }
        $entityManager->flush();

        $io->success(sprintf('%d planets imported successfully', count($data['results'])));
    }

    private function importFilmData(SymfonyStyle $io)
    {
        $client = new Client();
        $res = $client->get('https://swapi.dev/api/films/');
        $data = json_decode($res->getBody(), true);

        $container = $this->getApplication()->getKernel()->getContainer();
        $entityManager = $container->get('doctrine')->getManager();
        foreach ($data['results'] as $item) {
            $film = new Films();
            $film->setTitle($item['title']);
            $film->setEpisodeId($item['episode_id']);
            $film->setOpeningCrawl($item['opening_crawl']);
            $film->setDirector($item['director']);
            $film->setProducer($item['producer']);
            $film->setReleaseDate($item['release_date']);
            // ...
            $entityManager->persist($film);
        }
        $entityManager->flush();

        $io->success(sprintf('%d films imported successfully', count($data['results'])));
    }

    private function importSpecieData(SymfonyStyle $io)
    {
        $client = new Client();
        $res = $client->get('https://swapi.dev/api/species/');
        $data = json_decode($res->getBody(), true);

        $container = $this->getApplication()->getKernel()->getContainer();
        $entityManager = $container->get('doctrine')->getManager();
        foreach ($data['results'] as $item) {
            $specie = new Species();
            $specie->setName($item['name']);
            $specie->setClassification($item['classification']);
            $specie->setDesignation($item['designation']);
            $specie->setAverageHeight($item['average_height']);
            $specie->setSkinColors($item['skin_colors']);
            $specie->setHairColors($item['hair_colors']);
            $specie->setEyeColors($item['eye_colors']);
            $specie->setAverageLifespan($item['average_lifespan']);
            $specie->setLanguage($item['language']);

            // ...
            $entityManager->persist($specie);
        }
        $entityManager->flush();

        $io->success(sprintf('%d species imported successfully', count($data['results'])));
    }

    private function importVehicleData(SymfonyStyle $io)
    {
        $client = new Client();
        $res = $client->get('https://swapi.dev/api/vehicles/');
        $data = json_decode($res->getBody(), true);

        $container = $this->getApplication()->getKernel()->getContainer();
        $entityManager = $container->get('doctrine')->getManager();
        foreach ($data['results'] as $item) {
            $vehicle = new Vehicles();
            $vehicle->setName($item['name']);
            $vehicle->setModel($item['model']);
            $vehicle->setManufacturer($item['manufacturer']);
            $vehicle->setCostInCredits($item['cost_in_credits']);
            $vehicle->setLength($item['length']);
            $vehicle->setMaxAtmospheringSpeed($item['max_atmosphering_speed']);
            $vehicle->setCrew($item['crew']);
            $vehicle->setPassengers($item['passengers']);
            $vehicle->setCargoCapacity($item['cargo_capacity']);
            $vehicle->setConsumables($item['consumables']);
            $vehicle->setVehicleClass($item['vehicle_class']);

            // ...
            $entityManager->persist($vehicle);
        }
        $entityManager->flush();

        $io->success(sprintf('%d vehicles imported successfully', count($data['results'])));
    }

    private function importStarshipData(SymfonyStyle $io)
    {
        $client = new Client();
        $res = $client->get('https://swapi.dev/api/starships/');
        $data = json_decode($res->getBody(), true);

        $container = $this->getApplication()->getKernel()->getContainer();
        $entityManager = $container->get('doctrine')->getManager();
        foreach ($data['results'] as $item) {
            $starships = new Starships();
            $starships->setName($item['name']);
            $starships->setModel($item['model']);
            $starships->setManufacturer($item['manufacturer']);
            $starships->setCostInCredits($item['cost_in_credits']);
            $starships->setLength($item['length']);
            $starships->setMaxAtmospheringSpeed($item['max_atmosphering_speed']);
            $starships->setCrew($item['crew']);
            $starships->setPassengers($item['passengers']);
            $starships->setCargoCapacity($item['cargo_capacity']);
            $starships->setConsumables($item['consumables']);
            $starships->setHyperdriveRating($item['hyperdrive_rating']);
            $starships->setMGLT($item['MGLT']);
            $starships->setStarshipClass($item['starship_class']);

            // ...
            $entityManager->persist($starships);
        }
        $entityManager->flush();

        $io->success(sprintf('%d starships imported successfully', count($data['results'])));
    }
}
