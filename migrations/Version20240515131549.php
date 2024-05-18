<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240515131549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis ADD arcadia_id INT DEFAULT NULL, ADD parent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF06D82D856 FOREIGN KEY (arcadia_id) REFERENCES arcadia (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0727ACA70 FOREIGN KEY (parent_id) REFERENCES avis (id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF06D82D856 ON avis (arcadia_id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF0727ACA70 ON avis (parent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF06D82D856');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0727ACA70');
        $this->addSql('DROP INDEX IDX_8F91ABF06D82D856 ON avis');
        $this->addSql('DROP INDEX IDX_8F91ABF0727ACA70 ON avis');
        $this->addSql('ALTER TABLE avis DROP arcadia_id, DROP parent_id');
    }
}
