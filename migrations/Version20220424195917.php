<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220424195917 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tasks_assigned_for_user ADD user_id INT NOT NULL, ADD tasks_assigned_for_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE tasks_assigned_for_user ADD CONSTRAINT FK_3CF0BF53A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tasks_assigned_for_user ADD CONSTRAINT FK_3CF0BF53D65B158E FOREIGN KEY (tasks_assigned_for_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3CF0BF53A76ED395 ON tasks_assigned_for_user (user_id)');
        $this->addSql('CREATE INDEX IDX_3CF0BF53D65B158E ON tasks_assigned_for_user (tasks_assigned_for_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tasks_assigned_for_user DROP FOREIGN KEY FK_3CF0BF53A76ED395');
        $this->addSql('ALTER TABLE tasks_assigned_for_user DROP FOREIGN KEY FK_3CF0BF53D65B158E');
        $this->addSql('DROP INDEX IDX_3CF0BF53A76ED395 ON tasks_assigned_for_user');
        $this->addSql('DROP INDEX IDX_3CF0BF53D65B158E ON tasks_assigned_for_user');
        $this->addSql('ALTER TABLE tasks_assigned_for_user DROP user_id, DROP tasks_assigned_for_user_id');
    }
}
