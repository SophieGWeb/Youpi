<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200205155924 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE age (id INT AUTO_INCREMENT NOT NULL, tranche SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, age_id INT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, UNIQUE INDEX UNIQ_741D53CDCC80CD12 (age_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning (id INT AUTO_INCREMENT NOT NULL, creche_id INT NOT NULL, INDEX IDX_D499BFF66C6060B (creche_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CDCC80CD12 FOREIGN KEY (age_id) REFERENCES age (id)');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF66C6060B FOREIGN KEY (creche_id) REFERENCES collectivite (id)');
        $this->addSql('ALTER TABLE collectivite CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CDCC80CD12');
        $this->addSql('DROP TABLE age');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE planning');
        $this->addSql('ALTER TABLE collectivite CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
