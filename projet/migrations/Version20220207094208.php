<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220207094208 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article CHANGE titre title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE colloque CHANGE nom name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE intervention ADD hour_d TIME NOT NULL, ADD hour_f TIME NOT NULL, DROP heure_d, DROP heure_f');
        $this->addSql('ALTER TABLE person ADD name VARCHAR(255) NOT NULL, ADD first_name VARCHAR(255) NOT NULL, DROP nom, DROP prenom');
        $this->addSql('ALTER TABLE publication CHANGE titre title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE revue CHANGE titre title VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article CHANGE title titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE colloque CHANGE name nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE intervention ADD heure_d TIME NOT NULL, ADD heure_f TIME NOT NULL, DROP hour_d, DROP hour_f');
        $this->addSql('ALTER TABLE person ADD nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP name, DROP first_name');
        $this->addSql('ALTER TABLE publication CHANGE title titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE revue CHANGE title titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
