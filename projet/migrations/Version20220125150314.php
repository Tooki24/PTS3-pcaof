<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220125150314 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE key_words (id INT AUTO_INCREMENT NOT NULL, word VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE colloque ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE publication ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE revue ADD slug VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE key_words');
        $this->addSql('ALTER TABLE article DROP slug');
        $this->addSql('ALTER TABLE colloque DROP slug');
        $this->addSql('ALTER TABLE publication DROP slug');
        $this->addSql('ALTER TABLE revue DROP slug');
    }
}
