<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200908091350 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tossafi (id INT AUTO_INCREMENT NOT NULL, kaody VARCHAR(10) NOT NULL, anarana VARCHAR(50) DEFAULT NULL, daty_nipoirany DATE DEFAULT NULL, loko VARCHAR(25) DEFAULT NULL, toby_miahy VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE toerana (id INT AUTO_INCREMENT NOT NULL, anarana VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kristiana (id INT AUTO_INCREMENT NOT NULL, kaody VARCHAR(8) NOT NULL, anarana VARCHAR(50) NOT NULL, fanampiny VARCHAR(50) NOT NULL, finday VARCHAR(25) DEFAULT NULL, mailaka VARCHAR(255) DEFAULT NULL, asa VARCHAR(150) DEFAULT NULL, daty_nandraisana DATE DEFAULT NULL, sokajy VARCHAR(1) DEFAULT NULL, mpandray TINYINT(1) NOT NULL, maty TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mpikambana (id INT AUTO_INCREMENT NOT NULL, kristiana_id INT DEFAULT NULL, tossafi_id INT DEFAULT NULL, toerana_id INT DEFAULT NULL, daty_naha_mpikambana DATE DEFAULT NULL, INDEX IDX_CADE6197A9833A3A (kristiana_id), INDEX IDX_CADE61976A59A59D (tossafi_id), INDEX IDX_CADE6197833EF5AB (toerana_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mpikambana ADD CONSTRAINT FK_CADE6197A9833A3A FOREIGN KEY (kristiana_id) REFERENCES kristiana (id)');
        $this->addSql('ALTER TABLE mpikambana ADD CONSTRAINT FK_CADE61976A59A59D FOREIGN KEY (tossafi_id) REFERENCES tossafi (id)');
        $this->addSql('ALTER TABLE mpikambana ADD CONSTRAINT FK_CADE6197833EF5AB FOREIGN KEY (toerana_id) REFERENCES toerana (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mpikambana DROP FOREIGN KEY FK_CADE6197A9833A3A');
        $this->addSql('ALTER TABLE mpikambana DROP FOREIGN KEY FK_CADE6197833EF5AB');
        $this->addSql('ALTER TABLE mpikambana DROP FOREIGN KEY FK_CADE61976A59A59D');
        $this->addSql('DROP TABLE kristiana');
        $this->addSql('DROP TABLE mpikambana');
        $this->addSql('DROP TABLE toerana');
        $this->addSql('DROP TABLE tossafi');
    }
}
