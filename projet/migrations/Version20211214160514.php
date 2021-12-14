<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211214160514 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE intervention ADD colloques_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB3FDA92B0 FOREIGN KEY (colloques_id) REFERENCES colloque (id)');
        $this->addSql('CREATE INDEX IDX_D11814AB3FDA92B0 ON intervention (colloques_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB3FDA92B0');
        $this->addSql('DROP INDEX IDX_D11814AB3FDA92B0 ON intervention');
        $this->addSql('ALTER TABLE intervention DROP colloques_id');
    }
}
