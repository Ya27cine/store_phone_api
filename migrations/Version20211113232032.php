<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211113232032 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE smartphone (id INT AUTO_INCREMENT NOT NULL, marque VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock_smartphone (id INT AUTO_INCREMENT NOT NULL, smartphone_id INT DEFAULT NULL, color VARCHAR(70) NOT NULL, rom INT NOT NULL, ram INT NOT NULL, year INT NOT NULL, price INT NOT NULL, quantity INT NOT NULL, status VARCHAR(20) NOT NULL, imei VARCHAR(30) NOT NULL, sn VARCHAR(30) DEFAULT NULL, INDEX IDX_88F989822E4F4908 (smartphone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stock_smartphone ADD CONSTRAINT FK_88F989822E4F4908 FOREIGN KEY (smartphone_id) REFERENCES smartphone (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stock_smartphone DROP FOREIGN KEY FK_88F989822E4F4908');
        $this->addSql('DROP TABLE smartphone');
        $this->addSql('DROP TABLE stock_smartphone');
        $this->addSql('DROP TABLE `user`');
    }
}
