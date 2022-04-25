<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220425092205 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tasks_assigned_for_user ADD id_of_user_who_created_task_id INT NOT NULL');
        $this->addSql('ALTER TABLE tasks_assigned_for_user ADD CONSTRAINT FK_3CF0BF5370A4CF31 FOREIGN KEY (id_of_user_who_created_task_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3CF0BF5370A4CF31 ON tasks_assigned_for_user (id_of_user_who_created_task_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tasks_assigned_for_user DROP FOREIGN KEY FK_3CF0BF5370A4CF31');
        $this->addSql('DROP INDEX IDX_3CF0BF5370A4CF31 ON tasks_assigned_for_user');
        $this->addSql('ALTER TABLE tasks_assigned_for_user DROP id_of_user_who_created_task_id');
    }
}
