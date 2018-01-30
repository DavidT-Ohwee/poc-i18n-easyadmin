<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180130152008 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blog_post_translation ADD translatable_id INT DEFAULT NULL, ADD locale VARCHAR(10) NOT NULL');
        $this->addSql('ALTER TABLE blog_post_translation ADD CONSTRAINT FK_2C2AE4A62C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES blog_post (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_2C2AE4A62C2AC5D3 ON blog_post_translation (translatable_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2C2AE4A62C2AC5D34180C698 ON blog_post_translation (translatable_id, locale)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blog_post_translation DROP FOREIGN KEY FK_2C2AE4A62C2AC5D3');
        $this->addSql('DROP INDEX IDX_2C2AE4A62C2AC5D3 ON blog_post_translation');
        $this->addSql('DROP INDEX UNIQ_2C2AE4A62C2AC5D34180C698 ON blog_post_translation');
        $this->addSql('ALTER TABLE blog_post_translation DROP translatable_id, DROP locale');
    }
}
