<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210511073211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE film_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE realisateur_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE film (id INT NOT NULL, titre VARCHAR(255) NOT NULL, affiche TEXT NOT NULL, recompense VARCHAR(255) DEFAULT NULL, annee DATE NOT NULL, synopsis TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE realisateur (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE realisateur_film (realisateur_id INT NOT NULL, film_id INT NOT NULL, PRIMARY KEY(realisateur_id, film_id))');
        $this->addSql('CREATE INDEX IDX_78FC70FCF1D8422E ON realisateur_film (realisateur_id)');
        $this->addSql('CREATE INDEX IDX_78FC70FC567F5183 ON realisateur_film (film_id)');
        $this->addSql('ALTER TABLE realisateur_film ADD CONSTRAINT FK_78FC70FCF1D8422E FOREIGN KEY (realisateur_id) REFERENCES realisateur (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE realisateur_film ADD CONSTRAINT FK_78FC70FC567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE realisateur_film DROP CONSTRAINT FK_78FC70FC567F5183');
        $this->addSql('ALTER TABLE realisateur_film DROP CONSTRAINT FK_78FC70FCF1D8422E');
        $this->addSql('DROP SEQUENCE film_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE realisateur_id_seq CASCADE');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE realisateur');
        $this->addSql('DROP TABLE realisateur_film');
    }
}
