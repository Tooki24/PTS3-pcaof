<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211214160724 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE colloque ADD revues_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE colloque ADD CONSTRAINT FK_3CAAEC06C558C32C FOREIGN KEY (revues_id) REFERENCES revue (id)');
        $this->addSql('CREATE INDEX IDX_3CAAEC06C558C32C ON colloque (revues_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE colloque DROP FOREIGN KEY FK_3CAAEC06C558C32C');
        $this->addSql('DROP INDEX IDX_3CAAEC06C558C32C ON colloque');
        $this->addSql('ALTER TABLE colloque DROP revues_id');
    }
}
