<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220131232456 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5A6F91CE5E237E06 ON marque (name)');
        $this->addSql('ALTER TABLE smartphone ADD marque_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE smartphone ADD CONSTRAINT FK_26B07E2E4827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('CREATE INDEX IDX_26B07E2E4827B9B2 ON smartphone (marque_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_5A6F91CE5E237E06 ON marque');
        $this->addSql('ALTER TABLE smartphone DROP FOREIGN KEY FK_26B07E2E4827B9B2');
        $this->addSql('DROP INDEX IDX_26B07E2E4827B9B2 ON smartphone');
        $this->addSql('ALTER TABLE smartphone DROP marque_id');
    }
}
