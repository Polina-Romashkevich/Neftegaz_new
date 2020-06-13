<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200522154027 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE coeff_five (id INT AUTO_INCREMENT NOT NULL, company_name VARCHAR(255) NOT NULL, coeff_value DOUBLE PRECISION NOT NULL, period VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coeff_four (id INT AUTO_INCREMENT NOT NULL, company_name VARCHAR(255) NOT NULL, coeff_value DOUBLE PRECISION NOT NULL, period VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coeff_one (id INT AUTO_INCREMENT NOT NULL, company_name VARCHAR(255) NOT NULL, coeff_value DOUBLE PRECISION NOT NULL, period VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coeff_three (id INT AUTO_INCREMENT NOT NULL, company_name VARCHAR(255) NOT NULL, coeff_value DOUBLE PRECISION NOT NULL, period VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coeff_two (id INT AUTO_INCREMENT NOT NULL, company_name VARCHAR(255) NOT NULL, coeff_value DOUBLE PRECISION NOT NULL, period VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, taxpayer_num VARCHAR(255) NOT NULL, unit_num INT NOT NULL, employees_num INT NOT NULL, sort_activity INT NOT NULL, investment INT NOT NULL, patent_num INT NOT NULL, patent_application_num INT NOT NULL, quote_num INT NOT NULL, research_num INT NOT NULL, publication_num INT NOT NULL, net_profit DOUBLE PRECISION NOT NULL, intangible_asset DOUBLE PRECISION NOT NULL, cost_oil_production DOUBLE PRECISION NOT NULL, oil_production DOUBLE PRECISION NOT NULL, period VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE division (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, taxpayer_num VARCHAR(255) NOT NULL, employees_num INT NOT NULL, sort_activity INT NOT NULL, patent_num INT NOT NULL, period VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, post VARCHAR(255) NOT NULL, financing DOUBLE PRECISION NOT NULL, patent_num INT NOT NULL, patent_application_num INT NOT NULL, research_num INT NOT NULL, publication_num INT NOT NULL, period VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, company_name VARCHAR(255) NOT NULL, division_name VARCHAR(255) NOT NULL, password VARCHAR(64) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D6491D4E64E8 (company_name), UNIQUE INDEX UNIQ_8D93D649C30EF87F (division_name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE coeff_five');
        $this->addSql('DROP TABLE coeff_four');
        $this->addSql('DROP TABLE coeff_one');
        $this->addSql('DROP TABLE coeff_three');
        $this->addSql('DROP TABLE coeff_two');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE division');
        $this->addSql('DROP TABLE employees');
        $this->addSql('DROP TABLE user');
    }
}
