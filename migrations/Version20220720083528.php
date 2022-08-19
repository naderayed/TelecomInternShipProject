<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220720083528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ims');
        $this->addSql('DROP TABLE nce');
        $this->addSql('ALTER TABLE workflow ADD id INT AUTO_INCREMENT NOT NULL, ADD id_contact VARCHAR(255) NOT NULL, DROP id_Contrat, DROP debit, DROP central, DROP FSI, DROP etat, DROP date_MES _TT, DROP position, CHANGE n_Appel n_appel VARCHAR(48) NOT NULL, CHANGE client client VARCHAR(49) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ims (ULS VARCHAR(12) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, RG VARCHAR(8) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, SR VARCHAR(14) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, Abonné VARCHAR(99) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, Adresse VARCHAR(142) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, Type VARCHAR(13) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, Etat VARCHAR(10) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, Fixe INT DEFAULT NULL, Data VARCHAR(15) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, Offre VARCHAR(27) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, Transport VARCHAR(12) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, Distribution VARCHAR(12) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, Rack VARCHAR(10) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, Shelf INT DEFAULT NULL, Slot INT DEFAULT NULL, Port INT DEFAULT NULL, TID INT DEFAULT NULL) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE nce (etat VARCHAR(11) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, position VARCHAR(22) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, fixe VARCHAR(8) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, offre VARCHAR(18) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, DEFVAL VARCHAR(6) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, DEFVAL1 VARCHAR(6) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, -- VARCHAR(2) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, VDSL2 VARCHAR(5) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE workflow MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE workflow DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE workflow ADD id_Contrat VARCHAR(10) NOT NULL, ADD debit VARCHAR(8) DEFAULT NULL, ADD central VARCHAR(27) DEFAULT NULL, ADD FSI VARCHAR(9) DEFAULT NULL, ADD etat VARCHAR(10) DEFAULT NULL, ADD date_MES _TT VARCHAR(16) DEFAULT NULL, ADD position VARCHAR(81) DEFAULT NULL, DROP id, DROP id_contact, CHANGE n_appel n_Appel VARCHAR(24) NOT NULL, CHANGE client client VARCHAR(49) DEFAULT NULL');
        $this->addSql('ALTER TABLE workflow ADD PRIMARY KEY (id_Contrat)');
    }
}
