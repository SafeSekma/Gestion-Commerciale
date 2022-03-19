<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210709075629 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE livraieur (id VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, tel VARCHAR(14) NOT NULL, email VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, livraieur_id VARCHAR(255) NOT NULL, produit_id VARCHAR(255) DEFAULT NULL, adrliv_id INT DEFAULT NULL, numl VARCHAR(50) NOT NULL, total VARCHAR(50) NOT NULL, dateliv DATE NOT NULL, INDEX IDX_A60C9F1F19EB6921 (client_id), INDEX IDX_A60C9F1F6B447DA7 (livraieur_id), INDEX IDX_A60C9F1FF347EFB (produit_id), INDEX IDX_A60C9F1FBE07D775 (adrliv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F6B447DA7 FOREIGN KEY (livraieur_id) REFERENCES livraieur (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1FF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1FBE07D775 FOREIGN KEY (adrliv_id) REFERENCES client (id)');
        $this->addSql('DROP TABLE lcommande');
        $this->addSql('ALTER TABLE client ADD nom VARCHAR(50) NOT NULL, ADD prenom VARCHAR(50) NOT NULL, DROP resp_com, DROP resp_finan, CHANGE solde solde VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D99DED506');
        $this->addSql('DROP INDEX IDX_6EEAA67D99DED506 ON commande');
        $this->addSql('ALTER TABLE commande ADD produit_id VARCHAR(255) DEFAULT NULL, ADD total DOUBLE PRECISION NOT NULL, DROP tht, DROP ttva, DROP tttc, CHANGE id_client_id client_id INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DF347EFB ON commande (produit_id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D19EB6921 ON commande (client_id)');
        $this->addSql('ALTER TABLE produit ADD nom VARCHAR(255) NOT NULL, ADD image VARCHAR(255) NOT NULL, DROP tva, DROP stkinit, DROP stkal, CHANGE id id VARCHAR(255) NOT NULL, CHANGE pa prix DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F6B447DA7');
        $this->addSql('CREATE TABLE lcommande (id INT AUTO_INCREMENT NOT NULL, id_produit_id INT NOT NULL, id_commande_id INT NOT NULL, qte INT NOT NULL, pu DOUBLE PRECISION NOT NULL, tva INT NOT NULL, INDEX IDX_57961F0AAABEFE2C (id_produit_id), INDEX IDX_57961F0A9AF8E3A3 (id_commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE lcommande ADD CONSTRAINT FK_57961F0A9AF8E3A3 FOREIGN KEY (id_commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE lcommande ADD CONSTRAINT FK_57961F0AAABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('DROP TABLE livraieur');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('ALTER TABLE client ADD resp_com VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD resp_finan VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP nom, DROP prenom, CHANGE solde solde DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DF347EFB');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D19EB6921');
        $this->addSql('DROP INDEX IDX_6EEAA67DF347EFB ON commande');
        $this->addSql('DROP INDEX IDX_6EEAA67D19EB6921 ON commande');
        $this->addSql('ALTER TABLE commande ADD ttva DOUBLE PRECISION NOT NULL, ADD tttc DOUBLE PRECISION NOT NULL, DROP produit_id, CHANGE client_id id_client_id INT NOT NULL, CHANGE total tht DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D99DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D99DED506 ON commande (id_client_id)');
        $this->addSql('ALTER TABLE produit ADD tva INT DEFAULT NULL, ADD stkinit INT DEFAULT NULL, ADD stkal INT NOT NULL, DROP nom, DROP image, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE prix pa DOUBLE PRECISION DEFAULT NULL');
    }
}
