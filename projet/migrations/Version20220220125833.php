<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220220125833 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE person_intervention DROP FOREIGN KEY FK_3216F4E68EAE3863');
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, e_mail VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE colloque_key_words (colloque_id INT NOT NULL, key_words_id INT NOT NULL, INDEX IDX_5B8DF484A6044FA8 (colloque_id), INDEX IDX_5B8DF484B598DE74 (key_words_id), PRIMARY KEY(colloque_id, key_words_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication_key_words (publication_id INT NOT NULL, key_words_id INT NOT NULL, INDEX IDX_8F0065D438B217A7 (publication_id), INDEX IDX_8F0065D4B598DE74 (key_words_id), PRIMARY KEY(publication_id, key_words_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE colloque_key_words ADD CONSTRAINT FK_5B8DF484A6044FA8 FOREIGN KEY (colloque_id) REFERENCES colloque (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE colloque_key_words ADD CONSTRAINT FK_5B8DF484B598DE74 FOREIGN KEY (key_words_id) REFERENCES key_words (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE publication_key_words ADD CONSTRAINT FK_8F0065D438B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE publication_key_words ADD CONSTRAINT FK_8F0065D4B598DE74 FOREIGN KEY (key_words_id) REFERENCES key_words (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES admin (id)');
        $this->addSql('DROP TABLE intervention');
        $this->addSql('DROP TABLE person_colloque');
        $this->addSql('DROP TABLE person_intervention');
        $this->addSql('ALTER TABLE article ADD pdf_name VARCHAR(255) DEFAULT NULL, ADD image_name VARCHAR(255) DEFAULT NULL, ADD on_line TINYINT(1) NOT NULL, DROP file, DROP doc_pdf');
        $this->addSql('ALTER TABLE colloque ADD planning_pdf_name VARCHAR(255) DEFAULT NULL, ADD is_pcaof TINYINT(1) NOT NULL, ADD on_line TINYINT(1) NOT NULL, ADD theme VARCHAR(255) DEFAULT NULL, CHANGE lieu place VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE person ADD is_office TINYINT(1) NOT NULL, ADD role VARCHAR(255) DEFAULT NULL, ADD photo_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE publication ADD pdf_name VARCHAR(255) DEFAULT NULL, ADD on_line TINYINT(1) NOT NULL, CHANGE file image_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE revue ADD on_line TINYINT(1) NOT NULL, ADD theme VARCHAR(255) DEFAULT NULL, CHANGE file image_name VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('CREATE TABLE intervention (id INT AUTO_INCREMENT NOT NULL, colloques_id INT DEFAULT NULL, date DATETIME NOT NULL, hour_d TIME NOT NULL, hour_f TIME NOT NULL, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_D11814AB3FDA92B0 (colloques_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE person_colloque (person_id INT NOT NULL, colloque_id INT NOT NULL, INDEX IDX_A8EC4931217BBB47 (person_id), INDEX IDX_A8EC4931A6044FA8 (colloque_id), PRIMARY KEY(person_id, colloque_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE person_intervention (person_id INT NOT NULL, intervention_id INT NOT NULL, INDEX IDX_3216F4E6217BBB47 (person_id), INDEX IDX_3216F4E68EAE3863 (intervention_id), PRIMARY KEY(person_id, intervention_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB3FDA92B0 FOREIGN KEY (colloques_id) REFERENCES colloque (id)');
        $this->addSql('ALTER TABLE person_colloque ADD CONSTRAINT FK_A8EC4931A6044FA8 FOREIGN KEY (colloque_id) REFERENCES colloque (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE person_colloque ADD CONSTRAINT FK_A8EC4931217BBB47 FOREIGN KEY (person_id) REFERENCES person (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE person_intervention ADD CONSTRAINT FK_3216F4E68EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE person_intervention ADD CONSTRAINT FK_3216F4E6217BBB47 FOREIGN KEY (person_id) REFERENCES person (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE colloque_key_words');
        $this->addSql('DROP TABLE publication_key_words');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('ALTER TABLE article ADD file VARCHAR(255) DEFAULT NULL, ADD doc_pdf VARCHAR(255) DEFAULT NULL, DROP pdf_name, DROP image_name, DROP on_line');
        $this->addSql('ALTER TABLE colloque DROP planning_pdf_name, DROP is_pcaof, DROP on_line, DROP theme, CHANGE place lieu VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE person DROP is_office, DROP role, DROP photo_name');
        $this->addSql('ALTER TABLE publication ADD file VARCHAR(255) DEFAULT NULL, DROP image_name, DROP pdf_name, DROP on_line');
        $this->addSql('ALTER TABLE revue ADD file VARCHAR(255) DEFAULT NULL, DROP on_line, DROP image_name, DROP theme');
    }
}
