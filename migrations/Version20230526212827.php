<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230526212827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8CA27126E0 FOREIGN KEY (souscategorie_id) REFERENCES souscategorie (id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8CA27126E0 ON produits (souscategorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8CA27126E0');
        $this->addSql('DROP INDEX IDX_BE2DDF8CA27126E0 ON produits');
    }
}
