<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220308114801 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE login_attempt (id INT AUTO_INCREMENT NOT NULL, ip_address VARCHAR(50) DEFAULT NULL, date DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', username LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin DROP ip_address, DROP date');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE login_attempt');
        $this->addSql('ALTER TABLE admin ADD ip_address VARCHAR(50) DEFAULT NULL, ADD date DATETIME NOT NULL');
    }
}
