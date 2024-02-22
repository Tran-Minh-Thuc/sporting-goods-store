<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240222134120 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cart_details (id INT AUTO_INCREMENT NOT NULL, carts_id INT DEFAULT NULL, products_id INT DEFAULT NULL, quantity INT NOT NULL, total_price DOUBLE PRECISION NOT NULL, INDEX IDX_89FCC38DBCB5C6F5 (carts_id), INDEX IDX_89FCC38D6C8A81A9 (products_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cart_details ADD CONSTRAINT FK_89FCC38DBCB5C6F5 FOREIGN KEY (carts_id) REFERENCES carts (id)');
        $this->addSql('ALTER TABLE cart_details ADD CONSTRAINT FK_89FCC38D6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE carts ADD total_price DOUBLE PRECISION NOT NULL, DROP create_at, DROP update_at');
        $this->addSql('ALTER TABLE order_details DROP FOREIGN KEY FK_845CA2C16C8A81A9');
        $this->addSql('DROP INDEX UNIQ_845CA2C16C8A81A9 ON order_details');
        $this->addSql('ALTER TABLE order_details DROP products_id');
        $this->addSql('ALTER TABLE product_sizes DROP FOREIGN KEY FK_17C2FC356C8A81A9');
        $this->addSql('DROP INDEX IDX_17C2FC356C8A81A9 ON product_sizes');
        $this->addSql('ALTER TABLE product_sizes DROP products_id');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5ABCB5C6F5');
        $this->addSql('DROP INDEX IDX_B3BA5A5ABCB5C6F5 ON products');
        $this->addSql('ALTER TABLE products DROP carts_id');
        $this->addSql('ALTER TABLE sale_products DROP FOREIGN KEY FK_ADCEB6F06C8A81A9');
        $this->addSql('DROP INDEX UNIQ_ADCEB6F06C8A81A9 ON sale_products');
        $this->addSql('ALTER TABLE sale_products DROP products_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart_details DROP FOREIGN KEY FK_89FCC38DBCB5C6F5');
        $this->addSql('ALTER TABLE cart_details DROP FOREIGN KEY FK_89FCC38D6C8A81A9');
        $this->addSql('DROP TABLE cart_details');
        $this->addSql('ALTER TABLE carts ADD create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD update_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP total_price');
        $this->addSql('ALTER TABLE order_details ADD products_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE order_details ADD CONSTRAINT FK_845CA2C16C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_845CA2C16C8A81A9 ON order_details (products_id)');
        $this->addSql('ALTER TABLE products ADD carts_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5ABCB5C6F5 FOREIGN KEY (carts_id) REFERENCES carts (id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5ABCB5C6F5 ON products (carts_id)');
        $this->addSql('ALTER TABLE product_sizes ADD products_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_sizes ADD CONSTRAINT FK_17C2FC356C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id)');
        $this->addSql('CREATE INDEX IDX_17C2FC356C8A81A9 ON product_sizes (products_id)');
        $this->addSql('ALTER TABLE sale_products ADD products_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sale_products ADD CONSTRAINT FK_ADCEB6F06C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ADCEB6F06C8A81A9 ON sale_products (products_id)');
    }
}
