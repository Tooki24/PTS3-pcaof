<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220208170717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE person_intervention DROP FOREIGN KEY FK_3216F4E68EAE3863');
        $this->addSql('CREATE TABLE publication_key_words (publication_id INT NOT NULL, key_words_id INT NOT NULL, INDEX IDX_8F0065D438B217A7 (publication_id), INDEX IDX_8F0065D4B598DE74 (key_words_id), PRIMARY KEY(publication_id, key_words_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE publication_key_words ADD CONSTRAINT FK_8F0065D438B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE publication_key_words ADD CONSTRAINT FK_8F0065D4B598DE74 FOREIGN KEY (key_words_id) REFERENCES key_words (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE intervention');
        $this->addSql('DROP TABLE person_colloque');
        $this->addSql('DROP TABLE person_intervention');
        $this->addSql('ALTER TABLE article ADD pdf_name VARCHAR(255) DEFAULT NULL, ADD image_name VARCHAR(255) DEFAULT NULL, ADD on_line TINYINT(1) NOT NULL, DROP file, DROP doc_pdf');
        $this->addSql('ALTER TABLE colloque ADD planning_pdf_name VARCHAR(255) DEFAULT NULL, ADD is_pcaof TINYINT(1) NOT NULL, ADD on_line TINYINT(1) NOT NULL, ADD theme VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE person ADD is_office TINYINT(1) NOT NULL, ADD role VARCHAR(255) DEFAULT NULL, ADD photo_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE publication ADD pdf_name VARCHAR(255) DEFAULT NULL, ADD on_line TINYINT(1) NOT NULL, CHANGE file image_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE revue ADD on_line TINYINT(1) NOT NULL, ADD image_name VARCHAR(255) DEFAULT NULL, ADD theme VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE intervention (id INT AUTO_INCREMENT NOT NULL, colloques_id INT DEFAULT NULL, date DATETIME NOT NULL, hour_d TIME NOT NULL, hour_f TIME NOT NULL, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_D11814AB3FDA92B0 (colloques_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE person_colloque (person_id INT NOT NULL, colloque_id INT NOT NULL, INDEX IDX_A8EC4931217BBB47 (person_id), INDEX IDX_A8EC4931A6044FA8 (colloque_id), PRIMARY KEY(person_id, colloque_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE person_intervention (person_id INT NOT NULL, intervention_id INT NOT NULL, INDEX IDX_3216F4E6217BBB47 (person_id), INDEX IDX_3216F4E68EAE3863 (intervention_id), PRIMARY KEY(person_id, intervention_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB3FDA92B0 FOREIGN KEY (colloques_id) REFERENCES colloque (id)');
        $this->addSql('ALTER TABLE person_colloque ADD CONSTRAINT FK_A8EC4931A6044FA8 FOREIGN KEY (colloque_id) REFERENCES colloque (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE person_colloque ADD CONSTRAINT FK_A8EC4931217BBB47 FOREIGN KEY (person_id) REFERENCES person (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE person_intervention ADD CONSTRAINT FK_3216F4E68EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE person_intervention ADD CONSTRAINT FK_3216F4E6217BBB47 FOREIGN KEY (person_id) REFERENCES person (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE publication_key_words');
        $this->addSql('ALTER TABLE article ADD file VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD doc_pdf VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP pdf_name, DROP image_name, DROP on_line, CHANGE title title VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE resume resume LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE colloque DROP planning_pdf_name, DROP is_pcaof, DROP on_line, DROP theme, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lieu lieu VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE key_words CHANGE word word VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE person DROP is_office, DROP role, DROP photo_name, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE first_name first_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE publication ADD file VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP image_name, DROP pdf_name, DROP on_line, CHANGE title title VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE resume resume LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE revue DROP on_line, DROP image_name, DROP theme, CHANGE title title VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE resume resume LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE file file VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
