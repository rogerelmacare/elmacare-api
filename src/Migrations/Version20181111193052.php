<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181111193052 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE core_logins (id VARCHAR(36) NOT NULL, core_id VARCHAR(36) DEFAULT NULL, user_id VARCHAR(36) DEFAULT NULL, status VARCHAR(255) NOT NULL, login_at DATETIME NOT NULL, INDEX IDX_A64FB4FDC87A9C35 (core_id), INDEX IDX_A64FB4FDA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE core_logins ADD CONSTRAINT FK_A64FB4FDC87A9C35 FOREIGN KEY (core_id) REFERENCES core (id)');
        $this->addSql('ALTER TABLE core_logins ADD CONSTRAINT FK_A64FB4FDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user CHANGE id id VARCHAR(36) NOT NULL');
        $this->addSql('ALTER TABLE core CHANGE id id VARCHAR(36) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE core_logins');
        $this->addSql('ALTER TABLE core CHANGE id id VARCHAR(36) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user CHANGE id id VARCHAR(36) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
