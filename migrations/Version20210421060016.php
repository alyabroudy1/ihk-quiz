<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210421060016 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE choice (id INT AUTO_INCREMENT NOT NULL, question_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, correct TINYINT(1) DEFAULT NULL, INDEX IDX_C1AB5A921E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, scenario_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, year DATE DEFAULT NULL, subject VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, points SMALLINT DEFAULT NULL, multiple_choice TINYINT(1) DEFAULT NULL, correct_answer VARCHAR(255) DEFAULT NULL, correct_answer_image VARCHAR(255) DEFAULT NULL, INDEX IDX_B6F7494EE04E49DF (scenario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, subject VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, year DATE DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, points SMALLINT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE choice ADD CONSTRAINT FK_C1AB5A921E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EE04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choice DROP FOREIGN KEY FK_C1AB5A921E27F6BF');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EE04E49DF');
        $this->addSql('DROP TABLE choice');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE scenario');
    }
}
