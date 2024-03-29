<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240222132339 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products DROP INDEX UNIQ_B3BA5A5ABCB5C6F5, ADD INDEX IDX_B3BA5A5ABCB5C6F5 (carts_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products DROP INDEX IDX_B3BA5A5ABCB5C6F5, ADD UNIQUE INDEX UNIQ_B3BA5A5ABCB5C6F5 (carts_id)');
    }
}
