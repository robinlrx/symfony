<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230129174728 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE planets_films (planets_id INT NOT NULL, films_id INT NOT NULL, INDEX IDX_D0D470EDDCBDC375 (planets_id), INDEX IDX_D0D470ED939610EE (films_id), PRIMARY KEY(planets_id, films_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE planets_films ADD CONSTRAINT FK_D0D470EDDCBDC375 FOREIGN KEY (planets_id) REFERENCES planets (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planets_films ADD CONSTRAINT FK_D0D470ED939610EE FOREIGN KEY (films_id) REFERENCES films (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planets_films DROP FOREIGN KEY FK_D0D470EDDCBDC375');
        $this->addSql('ALTER TABLE planets_films DROP FOREIGN KEY FK_D0D470ED939610EE');
        $this->addSql('DROP TABLE planets_films');
    }
}
