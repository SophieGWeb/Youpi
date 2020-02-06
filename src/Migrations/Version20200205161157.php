<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200205161157 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE collectivite ADD place_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE collectivite ADD CONSTRAINT FK_CFA408A1DA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('CREATE INDEX IDX_CFA408A1DA6A219 ON collectivite (place_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE collectivite DROP FOREIGN KEY FK_CFA408A1DA6A219');
        $this->addSql('DROP INDEX IDX_CFA408A1DA6A219 ON collectivite');
        $this->addSql('ALTER TABLE collectivite DROP place_id, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
