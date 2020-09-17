<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200911131845 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mpikambana DROP FOREIGN KEY FK_CADE6197833EF5AB');
        $this->addSql('ALTER TABLE mpikambana DROP FOREIGN KEY FK_CADE61976A59A59D');
        $this->addSql('DROP TABLE mpikambana');
        $this->addSql('DROP TABLE toerana');
        $this->addSql('DROP TABLE tossafi');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tossafi (id INT AUTO_INCREMENT NOT NULL, kaody VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, anarana VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, daty_nipoirany DATE DEFAULT NULL, loko VARCHAR(25) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, toby_miahy VARCHAR(10) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE toerana (id INT AUTO_INCREMENT NOT NULL, anarana VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mpikambana (id INT AUTO_INCREMENT NOT NULL, kristiana_id INT DEFAULT NULL, tossafi_id INT DEFAULT NULL, toerana_id INT DEFAULT NULL, daty_naha_mpikambana DATE DEFAULT NULL, INDEX IDX_CADE6197833EF5AB (toerana_id), INDEX IDX_CADE6197A9833A3A (kristiana_id), INDEX IDX_CADE61976A59A59D (tossafi_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE mpikambana ADD CONSTRAINT FK_CADE61976A59A59D FOREIGN KEY (tossafi_id) REFERENCES tossafi (id)');
        $this->addSql('ALTER TABLE mpikambana ADD CONSTRAINT FK_CADE6197833EF5AB FOREIGN KEY (toerana_id) REFERENCES toerana (id)');
        $this->addSql('ALTER TABLE mpikambana ADD CONSTRAINT FK_CADE6197A9833A3A FOREIGN KEY (kristiana_id) REFERENCES kristiana (id)');
    }
}
