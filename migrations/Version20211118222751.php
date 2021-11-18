<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211118222751 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE smartphone_image (smartphone_id INT NOT NULL, image_id INT NOT NULL, INDEX IDX_15F3A6E32E4F4908 (smartphone_id), INDEX IDX_15F3A6E33DA5256D (image_id), PRIMARY KEY(smartphone_id, image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE smartphone_image ADD CONSTRAINT FK_15F3A6E32E4F4908 FOREIGN KEY (smartphone_id) REFERENCES smartphone (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE smartphone_image ADD CONSTRAINT FK_15F3A6E33DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE smartphone_image');
    }
}
