<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230129170750 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE films (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, episode_id INT DEFAULT NULL, opening_crawl VARCHAR(255) DEFAULT NULL, director VARCHAR(255) DEFAULT NULL, producer VARCHAR(255) DEFAULT NULL, release_date VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE people (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, height VARCHAR(255) DEFAULT NULL, mass VARCHAR(255) DEFAULT NULL, hair_color VARCHAR(255) DEFAULT NULL, skin_color VARCHAR(255) DEFAULT NULL, eye_color VARCHAR(255) DEFAULT NULL, birth_year VARCHAR(255) DEFAULT NULL, gender VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planets (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, rotation_period VARCHAR(255) DEFAULT NULL, orbital_period VARCHAR(255) DEFAULT NULL, diameter VARCHAR(255) DEFAULT NULL, climate VARCHAR(255) DEFAULT NULL, gravity VARCHAR(255) DEFAULT NULL, terrain VARCHAR(255) DEFAULT NULL, surface_water VARCHAR(255) DEFAULT NULL, population VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE species (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, classification VARCHAR(255) DEFAULT NULL, designation VARCHAR(255) DEFAULT NULL, average_height VARCHAR(255) DEFAULT NULL, skin_colors VARCHAR(255) DEFAULT NULL, hair_colors VARCHAR(255) DEFAULT NULL, eye_colors VARCHAR(255) DEFAULT NULL, average_lifespan VARCHAR(255) DEFAULT NULL, language VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE starships (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, model VARCHAR(255) DEFAULT NULL, manufacturer VARCHAR(255) DEFAULT NULL, cost_in_credits VARCHAR(255) DEFAULT NULL, length VARCHAR(255) DEFAULT NULL, max_atmosphering_speed VARCHAR(255) DEFAULT NULL, crew VARCHAR(255) DEFAULT NULL, passengers VARCHAR(255) DEFAULT NULL, cargo_capacity VARCHAR(255) DEFAULT NULL, consumables VARCHAR(255) DEFAULT NULL, hyperdrive_rating VARCHAR(255) DEFAULT NULL, mglt VARCHAR(255) DEFAULT NULL, starship_class VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicles (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, model VARCHAR(255) DEFAULT NULL, manufacturer VARCHAR(255) DEFAULT NULL, cost_in_credits VARCHAR(255) DEFAULT NULL, length VARCHAR(255) DEFAULT NULL, max_atmosphering_speed VARCHAR(255) DEFAULT NULL, crew VARCHAR(255) DEFAULT NULL, passengers VARCHAR(255) DEFAULT NULL, cargo_capacity VARCHAR(255) DEFAULT NULL, consumables VARCHAR(255) DEFAULT NULL, vehicle_class VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE films');
        $this->addSql('DROP TABLE people');
        $this->addSql('DROP TABLE planets');
        $this->addSql('DROP TABLE species');
        $this->addSql('DROP TABLE starships');
        $this->addSql('DROP TABLE vehicles');
    }
}
