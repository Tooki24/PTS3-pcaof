<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211214160355 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE person_article (person_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_20A4BDEF217BBB47 (person_id), INDEX IDX_20A4BDEF7294869C (article_id), PRIMARY KEY(person_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person_colloque (person_id INT NOT NULL, colloque_id INT NOT NULL, INDEX IDX_A8EC4931217BBB47 (person_id), INDEX IDX_A8EC4931A6044FA8 (colloque_id), PRIMARY KEY(person_id, colloque_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person_intervention (person_id INT NOT NULL, intervention_id INT NOT NULL, INDEX IDX_3216F4E6217BBB47 (person_id), INDEX IDX_3216F4E68EAE3863 (intervention_id), PRIMARY KEY(person_id, intervention_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
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
        $this->addSql('DROP TABLE person_article');
        $this->addSql('DROP TABLE person_colloque');
        $this->addSql('DROP TABLE person_intervention');
    }
}
