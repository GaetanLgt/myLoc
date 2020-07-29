<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200728145427 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emprunt ADD affaire_id INT NOT NULL');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D7F082E755 FOREIGN KEY (affaire_id) REFERENCES affaires (id)');
        $this->addSql('CREATE INDEX IDX_364071D7F082E755 ON emprunt (affaire_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D7F082E755');
        $this->addSql('DROP INDEX IDX_364071D7F082E755 ON emprunt');
        $this->addSql('ALTER TABLE emprunt DROP affaire_id');
    }
}
