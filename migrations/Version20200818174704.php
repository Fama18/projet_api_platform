<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200818174704 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client_physique ADD clientmoral_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client_physique ADD CONSTRAINT FK_B11F18227F0F55A1 FOREIGN KEY (clientmoral_id) REFERENCES client_moral (id)');
        $this->addSql('CREATE INDEX IDX_B11F18227F0F55A1 ON client_physique (clientmoral_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client_physique DROP FOREIGN KEY FK_B11F18227F0F55A1');
        $this->addSql('DROP INDEX IDX_B11F18227F0F55A1 ON client_physique');
        $this->addSql('ALTER TABLE client_physique DROP clientmoral_id');
    }
}
