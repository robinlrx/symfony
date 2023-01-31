<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230129175445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE films_starships (films_id INT NOT NULL, starships_id INT NOT NULL, INDEX IDX_F33D6226939610EE (films_id), INDEX IDX_F33D62262AAF09FB (starships_id), PRIMARY KEY(films_id, starships_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE films_vehicles (films_id INT NOT NULL, vehicles_id INT NOT NULL, INDEX IDX_50A391F7939610EE (films_id), INDEX IDX_50A391F716F10C70 (vehicles_id), PRIMARY KEY(films_id, vehicles_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE films_species (films_id INT NOT NULL, species_id INT NOT NULL, INDEX IDX_1705A8B1939610EE (films_id), INDEX IDX_1705A8B1B2A1D860 (species_id), PRIMARY KEY(films_id, species_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE films_starships ADD CONSTRAINT FK_F33D6226939610EE FOREIGN KEY (films_id) REFERENCES films (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE films_starships ADD CONSTRAINT FK_F33D62262AAF09FB FOREIGN KEY (starships_id) REFERENCES starships (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE films_vehicles ADD CONSTRAINT FK_50A391F7939610EE FOREIGN KEY (films_id) REFERENCES films (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE films_vehicles ADD CONSTRAINT FK_50A391F716F10C70 FOREIGN KEY (vehicles_id) REFERENCES vehicles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE films_species ADD CONSTRAINT FK_1705A8B1939610EE FOREIGN KEY (films_id) REFERENCES films (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE films_species ADD CONSTRAINT FK_1705A8B1B2A1D860 FOREIGN KEY (species_id) REFERENCES species (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE films_starships DROP FOREIGN KEY FK_F33D6226939610EE');
        $this->addSql('ALTER TABLE films_starships DROP FOREIGN KEY FK_F33D62262AAF09FB');
        $this->addSql('ALTER TABLE films_vehicles DROP FOREIGN KEY FK_50A391F7939610EE');
        $this->addSql('ALTER TABLE films_vehicles DROP FOREIGN KEY FK_50A391F716F10C70');
        $this->addSql('ALTER TABLE films_species DROP FOREIGN KEY FK_1705A8B1939610EE');
        $this->addSql('ALTER TABLE films_species DROP FOREIGN KEY FK_1705A8B1B2A1D860');
        $this->addSql('DROP TABLE films_starships');
        $this->addSql('DROP TABLE films_vehicles');
        $this->addSql('DROP TABLE films_species');
    }
}
