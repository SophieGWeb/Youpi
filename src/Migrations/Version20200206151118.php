<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200206151118 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE collectivite CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE place ADD collectivite_id INT NOT NULL');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CDA7991F51 FOREIGN KEY (collectivite_id) REFERENCES collectivite (id)');
        $this->addSql('CREATE INDEX IDX_741D53CDA7991F51 ON place (collectivite_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE collectivite CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CDA7991F51');
        $this->addSql('DROP INDEX IDX_741D53CDA7991F51 ON place');
        $this->addSql('ALTER TABLE place DROP collectivite_id');
    }
}
