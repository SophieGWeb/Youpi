<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200210130635 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF66C6060B');
        $this->addSql('DROP INDEX IDX_D499BFF66C6060B ON planning');
        $this->addSql('ALTER TABLE planning CHANGE creche_id collectivite_id INT NOT NULL');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF6A7991F51 FOREIGN KEY (collectivite_id) REFERENCES collectivite (id)');
        $this->addSql('CREATE INDEX IDX_D499BFF6A7991F51 ON planning (collectivite_id)');
        $this->addSql('ALTER TABLE collectivite CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE collectivite CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF6A7991F51');
        $this->addSql('DROP INDEX IDX_D499BFF6A7991F51 ON planning');
        $this->addSql('ALTER TABLE planning CHANGE collectivite_id creche_id INT NOT NULL');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF66C6060B FOREIGN KEY (creche_id) REFERENCES collectivite (id)');
        $this->addSql('CREATE INDEX IDX_D499BFF66C6060B ON planning (creche_id)');
    }
}
