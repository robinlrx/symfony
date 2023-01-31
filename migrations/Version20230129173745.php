<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230129173745 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE people_films (people_id INT NOT NULL, films_id INT NOT NULL, INDEX IDX_58FB0113147C936 (people_id), INDEX IDX_58FB011939610EE (films_id), PRIMARY KEY(people_id, films_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE people_vehicles (people_id INT NOT NULL, vehicles_id INT NOT NULL, INDEX IDX_6E3F456F3147C936 (people_id), INDEX IDX_6E3F456F16F10C70 (vehicles_id), PRIMARY KEY(people_id, vehicles_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE people_starships (people_id INT NOT NULL, starships_id INT NOT NULL, INDEX IDX_DD7E5843147C936 (people_id), INDEX IDX_DD7E5842AAF09FB (starships_id), PRIMARY KEY(people_id, starships_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE people_films ADD CONSTRAINT FK_58FB0113147C936 FOREIGN KEY (people_id) REFERENCES people (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE people_films ADD CONSTRAINT FK_58FB011939610EE FOREIGN KEY (films_id) REFERENCES films (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE people_vehicles ADD CONSTRAINT FK_6E3F456F3147C936 FOREIGN KEY (people_id) REFERENCES people (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE people_vehicles ADD CONSTRAINT FK_6E3F456F16F10C70 FOREIGN KEY (vehicles_id) REFERENCES vehicles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE people_starships ADD CONSTRAINT FK_DD7E5843147C936 FOREIGN KEY (people_id) REFERENCES people (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE people_starships ADD CONSTRAINT FK_DD7E5842AAF09FB FOREIGN KEY (starships_id) REFERENCES starships (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE people ADD homeworld_id INT DEFAULT NULL, ADD species_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE people ADD CONSTRAINT FK_28166A26484D1B39 FOREIGN KEY (homeworld_id) REFERENCES planets (id)');
        $this->addSql('ALTER TABLE people ADD CONSTRAINT FK_28166A26B2A1D860 FOREIGN KEY (species_id) REFERENCES species (id)');
        $this->addSql('CREATE INDEX IDX_28166A26484D1B39 ON people (homeworld_id)');
        $this->addSql('CREATE INDEX IDX_28166A26B2A1D860 ON people (species_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE people_films DROP FOREIGN KEY FK_58FB0113147C936');
        $this->addSql('ALTER TABLE people_films DROP FOREIGN KEY FK_58FB011939610EE');
        $this->addSql('ALTER TABLE people_vehicles DROP FOREIGN KEY FK_6E3F456F3147C936');
        $this->addSql('ALTER TABLE people_vehicles DROP FOREIGN KEY FK_6E3F456F16F10C70');
        $this->addSql('ALTER TABLE people_starships DROP FOREIGN KEY FK_DD7E5843147C936');
        $this->addSql('ALTER TABLE people_starships DROP FOREIGN KEY FK_DD7E5842AAF09FB');
        $this->addSql('DROP TABLE people_films');
        $this->addSql('DROP TABLE people_vehicles');
        $this->addSql('DROP TABLE people_starships');
        $this->addSql('ALTER TABLE people DROP FOREIGN KEY FK_28166A26484D1B39');
        $this->addSql('ALTER TABLE people DROP FOREIGN KEY FK_28166A26B2A1D860');
        $this->addSql('DROP INDEX IDX_28166A26484D1B39 ON people');
        $this->addSql('DROP INDEX IDX_28166A26B2A1D860 ON people');
        $this->addSql('ALTER TABLE people DROP homeworld_id, DROP species_id');
    }
}
