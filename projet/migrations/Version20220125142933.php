<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220125142933 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE key_words (id INT AUTO_INCREMENT NOT NULL, word VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication_key_words (publication_id INT NOT NULL, key_words_id INT NOT NULL, INDEX IDX_8F0065D438B217A7 (publication_id), INDEX IDX_8F0065D4B598DE74 (key_words_id), PRIMARY KEY(publication_id, key_words_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE publication_key_words ADD CONSTRAINT FK_8F0065D438B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE publication_key_words ADD CONSTRAINT FK_8F0065D4B598DE74 FOREIGN KEY (key_words_id) REFERENCES key_words (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE colloque ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE revue ADD slug VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE publication_key_words DROP FOREIGN KEY FK_8F0065D4B598DE74');
        $this->addSql('DROP TABLE key_words');
        $this->addSql('DROP TABLE publication_key_words');
        $this->addSql('ALTER TABLE article DROP slug');
        $this->addSql('ALTER TABLE colloque DROP slug');
        $this->addSql('ALTER TABLE revue DROP slug');
    }
}
