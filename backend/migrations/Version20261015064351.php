<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261015064351 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE addresses DROP FOREIGN KEY `addresses_ibfk_1`');
        $this->addSql('ALTER TABLE cart_items DROP FOREIGN KEY `cart_items_ibfk_1`');
        $this->addSql('ALTER TABLE cart_items DROP FOREIGN KEY `cart_items_ibfk_2`');
        $this->addSql('ALTER TABLE cart_items DROP FOREIGN KEY `cart_items_ibfk_3`');
        $this->addSql('ALTER TABLE carts DROP FOREIGN KEY `carts_ibfk_1`');
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY `categories_ibfk_1`');
        $this->addSql('ALTER TABLE coupon_usages DROP FOREIGN KEY `coupon_usages_ibfk_1`');
        $this->addSql('ALTER TABLE coupon_usages DROP FOREIGN KEY `coupon_usages_ibfk_2`');
        $this->addSql('ALTER TABLE coupon_usages DROP FOREIGN KEY `coupon_usages_ibfk_3`');
        $this->addSql('ALTER TABLE inventory DROP FOREIGN KEY `inventory_ibfk_1`');
        $this->addSql('ALTER TABLE inventory DROP FOREIGN KEY `inventory_ibfk_2`');
        $this->addSql('ALTER TABLE order_items DROP FOREIGN KEY `order_items_ibfk_1`');
        $this->addSql('ALTER TABLE order_items DROP FOREIGN KEY `order_items_ibfk_2`');
        $this->addSql('ALTER TABLE order_items DROP FOREIGN KEY `order_items_ibfk_3`');
        $this->addSql('ALTER TABLE order_status_history DROP FOREIGN KEY `order_status_history_ibfk_1`');
        $this->addSql('ALTER TABLE order_status_history DROP FOREIGN KEY `order_status_history_ibfk_2`');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY `orders_ibfk_1`');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY `orders_ibfk_2`');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY `orders_ibfk_3`');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY `orders_ibfk_4`');
        $this->addSql('ALTER TABLE payments DROP FOREIGN KEY `payments_ibfk_1`');
        $this->addSql('ALTER TABLE product_categories DROP FOREIGN KEY `product_categories_ibfk_1`');
        $this->addSql('ALTER TABLE product_categories DROP FOREIGN KEY `product_categories_ibfk_2`');
        $this->addSql('ALTER TABLE product_variants DROP FOREIGN KEY `product_variants_ibfk_1`');
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY `reviews_ibfk_1`');
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY `reviews_ibfk_2`');
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY `reviews_ibfk_3`');
        $this->addSql('DROP TABLE addresses');
        $this->addSql('DROP TABLE cart_items');
        $this->addSql('DROP TABLE carts');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE coupon_usages');
        $this->addSql('DROP TABLE coupons');
        $this->addSql('DROP TABLE inventory');
        $this->addSql('DROP TABLE order_items');
        $this->addSql('DROP TABLE order_status_history');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE payments');
        $this->addSql('DROP TABLE product_categories');
        $this->addSql('DROP TABLE product_variants');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE reviews');
        $this->addSql('DROP TABLE users');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE addresses (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, user_id BIGINT UNSIGNED NOT NULL, type ENUM(\'shipping\', \'billing\') CHARACTER SET utf8mb4 DEFAULT \'shipping\' NOT NULL COLLATE `utf8mb4_unicode_ci`, first_name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, last_name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, phone VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, address_line1 VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, address_line2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, city VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, state VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, postal_code VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, country VARCHAR(2) CHARACTER SET utf8mb4 DEFAULT \'PH\' NOT NULL COLLATE `utf8mb4_unicode_ci`, is_default TINYINT DEFAULT 0 NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX idx_addresses_user_id (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE cart_items (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, cart_id BIGINT UNSIGNED NOT NULL, product_id BIGINT UNSIGNED NOT NULL, variant_id BIGINT UNSIGNED DEFAULT NULL, quantity INT DEFAULT 1 NOT NULL, price NUMERIC(12, 2) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX idx_cart_items_cart_id (cart_id), INDEX product_id (product_id), UNIQUE INDEX unique_cart_item (cart_id, product_id, variant_id), INDEX variant_id (variant_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE carts (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, user_id BIGINT UNSIGNED DEFAULT NULL, session_id VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, currency VARCHAR(3) CHARACTER SET utf8mb4 DEFAULT \'PHP\' NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX idx_carts_session_id (session_id), INDEX user_id (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE categories (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(150) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(150) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, parent_id BIGINT UNSIGNED DEFAULT NULL, image_url VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, is_active TINYINT DEFAULT 1 NOT NULL, sort_order INT DEFAULT 0 NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX parent_id (parent_id), UNIQUE INDEX slug (slug), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE coupon_usages (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, coupon_id BIGINT UNSIGNED NOT NULL, user_id BIGINT UNSIGNED NOT NULL, order_id BIGINT UNSIGNED NOT NULL, discount_amount NUMERIC(12, 2) NOT NULL, used_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX order_id (order_id), UNIQUE INDEX unique_coupon_order (coupon_id, order_id), INDEX user_id (user_id), INDEX IDX_F688E92A66C5951B (coupon_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE coupons (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, code VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, name VARCHAR(150) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, discount_type ENUM(\'percentage\', \'fixed_amount\', \'free_shipping\') CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, discount_value NUMERIC(12, 2) NOT NULL, minimum_order_amount NUMERIC(12, 2) DEFAULT \'0.00\', maximum_discount_amount NUMERIC(12, 2) DEFAULT NULL, usage_limit INT UNSIGNED DEFAULT NULL, usage_limit_per_user INT UNSIGNED DEFAULT 1, used_count INT UNSIGNED DEFAULT 0 NOT NULL, starts_at DATETIME DEFAULT NULL, expires_at DATETIME DEFAULT NULL, is_active TINYINT DEFAULT 1 NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, UNIQUE INDEX code (code), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE inventory (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, product_id BIGINT UNSIGNED DEFAULT NULL, variant_id BIGINT UNSIGNED DEFAULT NULL, quantity INT DEFAULT 0 NOT NULL, reserved_quantity INT DEFAULT 0 NOT NULL, low_stock_threshold INT DEFAULT 5 NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX idx_inventory_variant_id (variant_id), INDEX product_id (product_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE order_items (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, order_id BIGINT UNSIGNED NOT NULL, product_id BIGINT UNSIGNED NOT NULL, variant_id BIGINT UNSIGNED DEFAULT NULL, product_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, variant_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, sku VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, quantity INT NOT NULL, unit_price NUMERIC(12, 2) NOT NULL, total_price NUMERIC(12, 2) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX idx_order_items_order_id (order_id), INDEX product_id (product_id), INDEX variant_id (variant_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE order_status_history (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, order_id BIGINT UNSIGNED NOT NULL, status ENUM(\'pending\', \'paid\', \'processing\', \'shipped\', \'delivered\', \'cancelled\', \'refunded\') CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, comment VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, changed_by BIGINT UNSIGNED DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX changed_by (changed_by), INDEX order_id (order_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE orders (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, order_number VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, user_id BIGINT UNSIGNED NOT NULL, status ENUM(\'pending\', \'paid\', \'processing\', \'shipped\', \'delivered\', \'cancelled\', \'refunded\') CHARACTER SET utf8mb4 DEFAULT \'pending\' NOT NULL COLLATE `utf8mb4_unicode_ci`, subtotal NUMERIC(12, 2) NOT NULL, shipping_fee NUMERIC(12, 2) DEFAULT \'0.00\' NOT NULL, discount_amount NUMERIC(12, 2) DEFAULT \'0.00\' NOT NULL, coupon_id BIGINT UNSIGNED DEFAULT NULL, coupon_code VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, tax_amount NUMERIC(12, 2) DEFAULT \'0.00\' NOT NULL, total_amount NUMERIC(12, 2) NOT NULL, currency VARCHAR(3) CHARACTER SET utf8mb4 DEFAULT \'PHP\' NOT NULL COLLATE `utf8mb4_unicode_ci`, shipping_address_id BIGINT UNSIGNED DEFAULT NULL, billing_address_id BIGINT UNSIGNED DEFAULT NULL, notes TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX billing_address_id (billing_address_id), INDEX coupon_id (coupon_id), INDEX idx_orders_created_at (created_at), UNIQUE INDEX order_number (order_number), INDEX shipping_address_id (shipping_address_id), INDEX user_id (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE payments (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, order_id BIGINT UNSIGNED NOT NULL, payment_method VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, transaction_id VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, amount NUMERIC(12, 2) NOT NULL, currency VARCHAR(3) CHARACTER SET utf8mb4 DEFAULT \'PHP\' NOT NULL COLLATE `utf8mb4_unicode_ci`, status ENUM(\'pending\', \'paid\', \'failed\', \'refunded\') CHARACTER SET utf8mb4 DEFAULT \'pending\' NOT NULL COLLATE `utf8mb4_unicode_ci`, paid_at DATETIME DEFAULT NULL, raw_response JSON DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX idx_payments_status (status), INDEX order_id (order_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE product_categories (product_id BIGINT UNSIGNED NOT NULL, category_id BIGINT UNSIGNED NOT NULL, INDEX category_id (category_id), INDEX IDX_A99419434584665A (product_id), PRIMARY KEY (product_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE product_variants (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, product_id BIGINT UNSIGNED NOT NULL, sku VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, price NUMERIC(12, 2) NOT NULL, compare_price NUMERIC(12, 2) DEFAULT NULL, attributes JSON DEFAULT NULL, image_url VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, is_active TINYINT DEFAULT 1 NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX idx_product_variants_sku (sku), INDEX product_id (product_id), UNIQUE INDEX sku (sku), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE products (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, price NUMERIC(12, 2) NOT NULL, compare_price NUMERIC(12, 2) DEFAULT NULL, sku VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, stock_quantity INT DEFAULT 0 NOT NULL, is_active TINYINT DEFAULT 1 NOT NULL, is_featured TINYINT DEFAULT 0 NOT NULL, image_url VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX idx_products_is_active (is_active), UNIQUE INDEX sku (sku), UNIQUE INDEX slug (slug), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reviews (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, product_id BIGINT UNSIGNED NOT NULL, user_id BIGINT UNSIGNED NOT NULL, order_id BIGINT UNSIGNED DEFAULT NULL, rating TINYINT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, comment TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, is_approved TINYINT DEFAULT 0 NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX idx_reviews_is_approved (is_approved), INDEX order_id (order_id), INDEX product_id (product_id), UNIQUE INDEX unique_user_product_review (user_id, product_id), INDEX IDX_6970EB0FA76ED395 (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE users (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password_hash VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, first_name VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, last_name VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, phone VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, is_active TINYINT DEFAULT 1 NOT NULL, email_verified TINYINT DEFAULT 0 NOT NULL, email_verified_at DATETIME DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, UNIQUE INDEX email (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE addresses ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (user_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cart_items ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (cart_id) REFERENCES carts (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cart_items ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (product_id) REFERENCES products (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cart_items ADD CONSTRAINT `cart_items_ibfk_3` FOREIGN KEY (variant_id) REFERENCES product_variants (id) ON UPDATE NO ACTION ON DELETE SET NULL');
        $this->addSql('ALTER TABLE carts ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (user_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (parent_id) REFERENCES categories (id) ON UPDATE NO ACTION ON DELETE SET NULL');
        $this->addSql('ALTER TABLE coupon_usages ADD CONSTRAINT `coupon_usages_ibfk_1` FOREIGN KEY (coupon_id) REFERENCES coupons (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE coupon_usages ADD CONSTRAINT `coupon_usages_ibfk_2` FOREIGN KEY (user_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE coupon_usages ADD CONSTRAINT `coupon_usages_ibfk_3` FOREIGN KEY (order_id) REFERENCES orders (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inventory ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (product_id) REFERENCES products (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inventory ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (variant_id) REFERENCES product_variants (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_items ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (order_id) REFERENCES orders (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_items ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (product_id) REFERENCES products (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE order_items ADD CONSTRAINT `order_items_ibfk_3` FOREIGN KEY (variant_id) REFERENCES product_variants (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE order_status_history ADD CONSTRAINT `order_status_history_ibfk_1` FOREIGN KEY (order_id) REFERENCES orders (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_status_history ADD CONSTRAINT `order_status_history_ibfk_2` FOREIGN KEY (changed_by) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE SET NULL');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (user_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (shipping_address_id) REFERENCES addresses (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (billing_address_id) REFERENCES addresses (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (coupon_id) REFERENCES coupons (id) ON UPDATE NO ACTION ON DELETE SET NULL');
        $this->addSql('ALTER TABLE payments ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (order_id) REFERENCES orders (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE product_categories ADD CONSTRAINT `product_categories_ibfk_1` FOREIGN KEY (product_id) REFERENCES products (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_categories ADD CONSTRAINT `product_categories_ibfk_2` FOREIGN KEY (category_id) REFERENCES categories (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_variants ADD CONSTRAINT `product_variants_ibfk_1` FOREIGN KEY (product_id) REFERENCES products (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (product_id) REFERENCES products (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (user_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (order_id) REFERENCES orders (id) ON UPDATE NO ACTION ON DELETE SET NULL');
    }
}
