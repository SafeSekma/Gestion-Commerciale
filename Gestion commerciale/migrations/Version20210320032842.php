<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210320032842 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, resp_com VARCHAR(50) NOT NULL, resp_finan VARCHAR(50) NOT NULL, adr_liv VARCHAR(50) NOT NULL, adr_facture VARCHAR(50) NOT NULL, tel VARCHAR(14) NOT NULL, email VARCHAR(50) NOT NULL, solde DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, id_client_id INT NOT NULL, num_com INT NOT NULL, date DATE NOT NULL, tht DOUBLE PRECISION NOT NULL, ttva DOUBLE PRECISION NOT NULL, tttc DOUBLE PRECISION NOT NULL, INDEX IDX_6EEAA67D99DED506 (id_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lcommande (id INT AUTO_INCREMENT NOT NULL, id_produit_id INT NOT NULL, id_commande_id INT NOT NULL, qte INT NOT NULL, pu DOUBLE PRECISION NOT NULL, tva INT NOT NULL, INDEX IDX_57961F0AAABEFE2C (id_produit_id), INDEX IDX_57961F0A9AF8E3A3 (id_commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, pa DOUBLE PRECISION DEFAULT NULL, tva INT DEFAULT NULL, stock INT DEFAULT NULL, stkinit INT DEFAULT NULL, stkal INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D99DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE lcommande ADD CONSTRAINT FK_57961F0AAABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE lcommande ADD CONSTRAINT FK_57961F0A9AF8E3A3 FOREIGN KEY (id_commande_id) REFERENCES commande (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D99DED506');
        $this->addSql('ALTER TABLE lcommande DROP FOREIGN KEY FK_57961F0A9AF8E3A3');
        $this->addSql('ALTER TABLE lcommande DROP FOREIGN KEY FK_57961F0AAABEFE2C');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE lcommande');
        $this->addSql('DROP TABLE produit');
    }
}
