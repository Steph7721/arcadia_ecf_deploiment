<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240516133951 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rapport_employe (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, animal_id INT DEFAULT NULL, date DATETIME NOT NULL, repas_donne VARCHAR(255) NOT NULL, grammage_donne INT NOT NULL, INDEX IDX_83D4B3DAA76ED395 (user_id), INDEX IDX_83D4B3DA8E962C16 (animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rapport_veterinaire (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, animal_id INT DEFAULT NULL, animaletat_id INT DEFAULT NULL, date DATE NOT NULL, detail VARCHAR(255) NOT NULL, repas_conseille VARCHAR(255) NOT NULL, grammage_conseille INT NOT NULL, etat VARCHAR(255) NOT NULL, INDEX IDX_CE729CDEA76ED395 (user_id), INDEX IDX_CE729CDE8E962C16 (animal_id), INDEX IDX_CE729CDE4E9CA4A0 (animaletat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rapport_employe ADD CONSTRAINT FK_83D4B3DAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rapport_employe ADD CONSTRAINT FK_83D4B3DA8E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE rapport_veterinaire ADD CONSTRAINT FK_CE729CDEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rapport_veterinaire ADD CONSTRAINT FK_CE729CDE8E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE rapport_veterinaire ADD CONSTRAINT FK_CE729CDE4E9CA4A0 FOREIGN KEY (animaletat_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE habitat CHANGE nom nom VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport_employe DROP FOREIGN KEY FK_83D4B3DAA76ED395');
        $this->addSql('ALTER TABLE rapport_employe DROP FOREIGN KEY FK_83D4B3DA8E962C16');
        $this->addSql('ALTER TABLE rapport_veterinaire DROP FOREIGN KEY FK_CE729CDEA76ED395');
        $this->addSql('ALTER TABLE rapport_veterinaire DROP FOREIGN KEY FK_CE729CDE8E962C16');
        $this->addSql('ALTER TABLE rapport_veterinaire DROP FOREIGN KEY FK_CE729CDE4E9CA4A0');
        $this->addSql('DROP TABLE rapport_employe');
        $this->addSql('DROP TABLE rapport_veterinaire');
        $this->addSql('ALTER TABLE habitat CHANGE nom nom VARCHAR(255) NOT NULL');
    }
}
