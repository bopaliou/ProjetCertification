<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210813181113 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP CONSTRAINT fk_c53d045fc33f7837');
        $this->addSql('DROP SEQUENCE document_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE image_id_seq CASCADE');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE image');
        $this->addSql('ALTER INDEX uniq_2da17977e7927c74 RENAME TO UNIQ_8D93D649E7927C74');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE document_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE image_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE document (id INT NOT NULL, type VARCHAR(255) NOT NULL, date_enregistrement DATE NOT NULL, date_expiration DATE NOT NULL, etat BOOLEAN NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE image (id INT NOT NULL, document_id INT DEFAULT NULL, url VARCHAR(255) NOT NULL, taille NUMERIC(10, 0) DEFAULT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_c53d045fc33f7837 ON image (document_id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT fk_c53d045fc33f7837 FOREIGN KEY (document_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER INDEX uniq_8d93d649e7927c74 RENAME TO uniq_2da17977e7927c74');
    }
}
