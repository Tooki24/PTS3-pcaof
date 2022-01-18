<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220114073637 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, revue_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, resume LONGTEXT NOT NULL, date_publi DATE NOT NULL, file VARCHAR(255) DEFAULT NULL, doc_pdf VARCHAR(255) DEFAULT NULL, INDEX IDX_23A0E662B68B0B6 (revue_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE colloque (id INT AUTO_INCREMENT NOT NULL, revues_id INT DEFAULT NULL, date_d DATE NOT NULL, date_f DATE NOT NULL, nom VARCHAR(255) NOT NULL, lieu VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_3CAAEC06C558C32C (revues_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervention (id INT AUTO_INCREMENT NOT NULL, colloques_id INT DEFAULT NULL, date DATETIME NOT NULL, heure_d TIME NOT NULL, heure_f TIME NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_D11814AB3FDA92B0 (colloques_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person_publication (person_id INT NOT NULL, publication_id INT NOT NULL, INDEX IDX_C2D738F1217BBB47 (person_id), INDEX IDX_C2D738F138B217A7 (publication_id), PRIMARY KEY(person_id, publication_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person_article (person_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_20A4BDEF217BBB47 (person_id), INDEX IDX_20A4BDEF7294869C (article_id), PRIMARY KEY(person_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person_colloque (person_id INT NOT NULL, colloque_id INT NOT NULL, INDEX IDX_A8EC4931217BBB47 (person_id), INDEX IDX_A8EC4931A6044FA8 (colloque_id), PRIMARY KEY(person_id, colloque_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person_intervention (person_id INT NOT NULL, intervention_id INT NOT NULL, INDEX IDX_3216F4E6217BBB47 (person_id), INDEX IDX_3216F4E68EAE3863 (intervention_id), PRIMARY KEY(person_id, intervention_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, resume LONGTEXT NOT NULL, file VARCHAR(255) DEFAULT NULL, date_publi DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE revue (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, resume LONGTEXT NOT NULL, date_publi DATETIME NOT NULL, file VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E662B68B0B6 FOREIGN KEY (revue_id) REFERENCES revue (id)');
        $this->addSql('ALTER TABLE colloque ADD CONSTRAINT FK_3CAAEC06C558C32C FOREIGN KEY (revues_id) REFERENCES revue (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB3FDA92B0 FOREIGN KEY (colloques_id) REFERENCES colloque (id)');
        $this->addSql('ALTER TABLE person_publication ADD CONSTRAINT FK_C2D738F1217BBB47 FOREIGN KEY (person_id) REFERENCES person (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE person_publication ADD CONSTRAINT FK_C2D738F138B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE person_article ADD CONSTRAINT FK_20A4BDEF217BBB47 FOREIGN KEY (person_id) REFERENCES person (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE person_article ADD CONSTRAINT FK_20A4BDEF7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE person_colloque ADD CONSTRAINT FK_A8EC4931217BBB47 FOREIGN KEY (person_id) REFERENCES person (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE person_colloque ADD CONSTRAINT FK_A8EC4931A6044FA8 FOREIGN KEY (colloque_id) REFERENCES colloque (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE person_intervention ADD CONSTRAINT FK_3216F4E6217BBB47 FOREIGN KEY (person_id) REFERENCES person (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE person_intervention ADD CONSTRAINT FK_3216F4E68EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE person_article DROP FOREIGN KEY FK_20A4BDEF7294869C');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB3FDA92B0');
        $this->addSql('ALTER TABLE person_colloque DROP FOREIGN KEY FK_A8EC4931A6044FA8');
        $this->addSql('ALTER TABLE person_intervention DROP FOREIGN KEY FK_3216F4E68EAE3863');
        $this->addSql('ALTER TABLE person_publication DROP FOREIGN KEY FK_C2D738F1217BBB47');
        $this->addSql('ALTER TABLE person_article DROP FOREIGN KEY FK_20A4BDEF217BBB47');
        $this->addSql('ALTER TABLE person_colloque DROP FOREIGN KEY FK_A8EC4931217BBB47');
        $this->addSql('ALTER TABLE person_intervention DROP FOREIGN KEY FK_3216F4E6217BBB47');
        $this->addSql('ALTER TABLE person_publication DROP FOREIGN KEY FK_C2D738F138B217A7');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E662B68B0B6');
        $this->addSql('ALTER TABLE colloque DROP FOREIGN KEY FK_3CAAEC06C558C32C');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE colloque');
        $this->addSql('DROP TABLE intervention');
        $this->addSql('DROP TABLE person');
        $this->addSql('DROP TABLE person_publication');
        $this->addSql('DROP TABLE person_article');
        $this->addSql('DROP TABLE person_colloque');
        $this->addSql('DROP TABLE person_intervention');
        $this->addSql('DROP TABLE publication');
        $this->addSql('DROP TABLE revue');
    }
}
