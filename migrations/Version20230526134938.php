<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230526134938 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE souscategorie DROP FOREIGN KEY FK_6FF3A701A21214B7');
        $this->addSql('DROP INDEX IDX_6FF3A701A21214B7 ON souscategorie');
        $this->addSql('ALTER TABLE souscategorie CHANGE nom nom LONGTEXT NOT NULL, CHANGE categories_id categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE souscategorie ADD CONSTRAINT FK_6FF3A701BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_6FF3A701BCF5E72D ON souscategorie (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE souscategorie DROP FOREIGN KEY FK_6FF3A701BCF5E72D');
        $this->addSql('DROP INDEX IDX_6FF3A701BCF5E72D ON souscategorie');
        $this->addSql('ALTER TABLE souscategorie CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE categorie_id categories_id INT NOT NULL');
        $this->addSql('ALTER TABLE souscategorie ADD CONSTRAINT FK_6FF3A701A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_6FF3A701A21214B7 ON souscategorie (categories_id)');
    }
}
