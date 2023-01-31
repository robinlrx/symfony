<?php

namespace App\Command;

use App\Entity\People;
use App\Entity\Planets;
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
            #$person->setHomeworld($item['homeworld_id']);
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
}
