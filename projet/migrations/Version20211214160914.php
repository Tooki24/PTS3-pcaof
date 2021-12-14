<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211214160914 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD revue_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E662B68B0B6 FOREIGN KEY (revue_id) REFERENCES revue (id)');
        $this->addSql('CREATE INDEX IDX_23A0E662B68B0B6 ON article (revue_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E662B68B0B6');
        $this->addSql('DROP INDEX IDX_23A0E662B68B0B6 ON article');
        $this->addSql('ALTER TABLE article DROP revue_id');
    }
}
