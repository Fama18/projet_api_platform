<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200831084346 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operation ADD typeoperation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D510850EC FOREIGN KEY (typeoperation_id) REFERENCES type_operation (id)');
        $this->addSql('CREATE INDEX IDX_1981A66D510850EC ON operation (typeoperation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66D510850EC');
        $this->addSql('DROP INDEX IDX_1981A66D510850EC ON operation');
        $this->addSql('ALTER TABLE operation DROP typeoperation_id');
    }
}
