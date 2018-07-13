<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180710123929 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER SEQUENCE catalog_id_seq INCREMENT BY 1');
        $this->addSql('ALTER SEQUENCE product_id_seq INCREMENT BY 1');
        $this->addSql('ALTER SEQUENCE category_id_seq INCREMENT BY 1');
        $this->addSql('ALTER TABLE product ADD latitude NUMERIC(18, 12) DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD size NUMERIC(10, 0) DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD zone VARCHAR(300) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER SEQUENCE product_id_seq INCREMENT BY 1');
        $this->addSql('ALTER SEQUENCE category_id_seq INCREMENT BY 1');
        $this->addSql('ALTER SEQUENCE catalog_id_seq INCREMENT BY 1');
        $this->addSql('ALTER TABLE product DROP latitude');
        $this->addSql('ALTER TABLE product DROP size');
        $this->addSql('ALTER TABLE product DROP zone');
    }
}
