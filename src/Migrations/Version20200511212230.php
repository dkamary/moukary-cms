<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200511212230 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE address (id INT UNSIGNED AUTO_INCREMENT NOT NULL, city_id INT UNSIGNED DEFAULT NULL, country_id SMALLINT UNSIGNED DEFAULT NULL, line1 VARCHAR(150) NOT NULL, line2 VARCHAR(150) DEFAULT NULL, zip_code VARCHAR(10) DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, latitude DOUBLE PRECISION DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_D4E6F818BAC62AF (city_id), INDEX IDX_D4E6F81F92F3E70 (country_id), INDEX IDX_address_longitude (longitude), INDEX IDX_address_latitude (latitude), INDEX IDX_address_longitude_latitude (longitude, latitude), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT UNSIGNED AUTO_INCREMENT NOT NULL, country_id SMALLINT UNSIGNED DEFAULT NULL, name VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_2D5B0234F92F3E70 (country_id), INDEX IDX_city_name (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE command (id INT UNSIGNED AUTO_INCREMENT NOT NULL, user_id INT UNSIGNED DEFAULT NULL, shipping_id SMALLINT UNSIGNED DEFAULT NULL, status_id SMALLINT UNSIGNED DEFAULT NULL, billing_address_id INT UNSIGNED DEFAULT NULL, shipping_address_id INT UNSIGNED DEFAULT NULL, session_id VARCHAR(50) DEFAULT NULL, reference VARCHAR(50) DEFAULT NULL, sub_total_vat_exc DOUBLE PRECISION DEFAULT NULL, sub_total_vat_inc DOUBLE PRECISION DEFAULT NULL, total_vat DOUBLE PRECISION DEFAULT NULL, reduction_label VARCHAR(255) DEFAULT NULL, reduction DOUBLE PRECISION DEFAULT NULL, shipping_label VARCHAR(255) DEFAULT NULL, shipping_value DOUBLE PRECISION DEFAULT NULL, total_vat_inc DOUBLE PRECISION DEFAULT NULL, note VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, is_active TINYINT(1) NOT NULL, deleted_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8ECAEAD4613FECDF (session_id), UNIQUE INDEX UNIQ_8ECAEAD4AEA34913 (reference), INDEX IDX_8ECAEAD4A76ED395 (user_id), INDEX IDX_8ECAEAD44887F3F8 (shipping_id), INDEX IDX_8ECAEAD46BF700BD (status_id), INDEX IDX_8ECAEAD479D0C0E4 (billing_address_id), INDEX IDX_8ECAEAD44D4CFF2B (shipping_address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE command_detail (id INT UNSIGNED AUTO_INCREMENT NOT NULL, command_id INT UNSIGNED NOT NULL, product_id INT UNSIGNED NOT NULL, vat_id SMALLINT UNSIGNED NOT NULL, price_vat_exc DOUBLE PRECISION DEFAULT NULL, price_vat_inc DOUBLE PRECISION DEFAULT NULL, vat_percent DOUBLE PRECISION DEFAULT NULL, amount_vat_exc DOUBLE PRECISION DEFAULT NULL, amount_vat_inc DOUBLE PRECISION DEFAULT NULL, quantity SMALLINT UNSIGNED DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_9145B6D033E1689A (command_id), INDEX IDX_9145B6D04584665A (product_id), INDEX IDX_9145B6D0B5B63A6B (vat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE command_status (id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL, text_color VARCHAR(30) DEFAULT NULL, bg_color VARCHAR(30) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE command_status_lang (id INT UNSIGNED AUTO_INCREMENT NOT NULL, command_status_id SMALLINT UNSIGNED NOT NULL, language_id SMALLINT UNSIGNED NOT NULL, label VARCHAR(150) NOT NULL, INDEX IDX_C982B0DECC64FB6 (command_status_id), INDEX IDX_C982B0D82F1BAF4 (language_id), INDEX IDX_command_status_label (label), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, user_id INT UNSIGNED NOT NULL, rating SMALLINT DEFAULT NULL, content LONGTEXT DEFAULT NULL, is_valid TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_9474526CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE configuration (id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL, language_id SMALLINT UNSIGNED DEFAULT NULL, currency_id SMALLINT UNSIGNED DEFAULT NULL, site_name VARCHAR(255) DEFAULT NULL, description VARCHAR(512) DEFAULT NULL, admin_email VARCHAR(255) DEFAULT NULL, format_facture VARCHAR(50) DEFAULT NULL, reference_facture VARCHAR(50) DEFAULT NULL, format_livraison VARCHAR(50) DEFAULT NULL, reference_livraison VARCHAR(50) DEFAULT NULL, INDEX IDX_A5E2A5D782F1BAF4 (language_id), INDEX IDX_A5E2A5D738248176 (currency_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL, language_id SMALLINT UNSIGNED DEFAULT NULL, currency_id SMALLINT UNSIGNED DEFAULT NULL, name VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_5373C9665E237E06 (name), INDEX IDX_5373C96682F1BAF4 (language_id), INDEX IDX_5373C96638248176 (currency_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE currency (id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, symbol VARCHAR(3) NOT NULL, is_active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_6956883F5E237E06 (name), UNIQUE INDEX UNIQ_6956883FECC836F9 (symbol), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE email (id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE email_history (id INT UNSIGNED AUTO_INCREMENT NOT NULL, send_at DATETIME NOT NULL, subject VARCHAR(255) DEFAULT NULL, sender VARCHAR(255) DEFAULT NULL, receiver VARCHAR(255) DEFAULT NULL, content LONGTEXT DEFAULT NULL, bill VARCHAR(255) DEFAULT NULL, ship VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE email_lang (id INT UNSIGNED AUTO_INCREMENT NOT NULL, email_id SMALLINT UNSIGNED NOT NULL, language_id SMALLINT UNSIGNED NOT NULL, label VARCHAR(255) NOT NULL, subject VARCHAR(255) DEFAULT NULL, content LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_AE3FA4E7A832C1C9 (email_id), INDEX IDX_AE3FA4E782F1BAF4 (language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, alpha2 VARCHAR(2) NOT NULL, alpha3 VARCHAR(3) NOT NULL, date_format VARCHAR(50) DEFAULT NULL, price_format VARCHAR(50) DEFAULT NULL, is_active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_D4DB71B55E237E06 (name), UNIQUE INDEX UNIQ_D4DB71B5B762D672 (alpha2), UNIQUE INDEX UNIQ_D4DB71B5C065E6E4 (alpha3), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notification (id INT UNSIGNED AUTO_INCREMENT NOT NULL, command_status_id SMALLINT UNSIGNED NOT NULL, email_id SMALLINT UNSIGNED NOT NULL, sender VARCHAR(255) NOT NULL, receiver_id SMALLINT UNSIGNED NOT NULL, has_bill TINYINT(1) DEFAULT NULL, has_ship TINYINT(1) DEFAULT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_BF5476CAECC64FB6 (command_status_id), INDEX IDX_BF5476CAA832C1C9 (email_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, parent_id BIGINT UNSIGNED DEFAULT NULL, type VARCHAR(50) NOT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_5A8A6C8D727ACA70 (parent_id), INDEX IDX_post_type (type), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_comment (id INT UNSIGNED AUTO_INCREMENT NOT NULL, post_id BIGINT UNSIGNED NOT NULL, comment_id BIGINT UNSIGNED NOT NULL, INDEX IDX_A99CE55F4B89032C (post_id), INDEX IDX_A99CE55FF8697D13 (comment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_lang (id INT UNSIGNED AUTO_INCREMENT NOT NULL, post_id BIGINT UNSIGNED NOT NULL, language_id SMALLINT UNSIGNED NOT NULL, author_id INT UNSIGNED DEFAULT NULL, slug VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(512) DEFAULT NULL, keywords VARCHAR(255) DEFAULT NULL, status VARCHAR(100) DEFAULT NULL, content LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_F85CE369989D9B62 (slug), INDEX IDX_F85CE3694B89032C (post_id), INDEX IDX_F85CE36982F1BAF4 (language_id), INDEX IDX_F85CE369F675F31B (author_id), INDEX IDX_title (title), INDEX IDX_description (description), INDEX IDX_keywords (keywords), INDEX IDX_status (status), FULLTEXT INDEX IDX_content (content), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT UNSIGNED AUTO_INCREMENT NOT NULL, post_id BIGINT UNSIGNED NOT NULL, brand_id BIGINT UNSIGNED DEFAULT NULL, name VARCHAR(255) NOT NULL, reference VARCHAR(50) NOT NULL, aen13 VARCHAR(13) DEFAULT NULL, width SMALLINT DEFAULT NULL, height SMALLINT DEFAULT NULL, length SMALLINT DEFAULT NULL, weight SMALLINT DEFAULT NULL, volume SMALLINT DEFAULT NULL, quantity_min SMALLINT DEFAULT NULL, quantity_max SMALLINT DEFAULT NULL, is_new TINYINT(1) DEFAULT NULL, is_featured TINYINT(1) DEFAULT NULL, is_promotion TINYINT(1) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_D34A04ADAEA34913 (reference), UNIQUE INDEX UNIQ_D34A04AD554C2E5F (aen13), INDEX IDX_D34A04AD4B89032C (post_id), INDEX IDX_D34A04AD44F5D008 (brand_id), INDEX IDX_product_name (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_comment (id INT UNSIGNED AUTO_INCREMENT NOT NULL, product_id INT UNSIGNED NOT NULL, comment_id BIGINT UNSIGNED NOT NULL, INDEX IDX_45AD49DC4584665A (product_id), INDEX IDX_45AD49DCF8697D13 (comment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_price (id INT UNSIGNED AUTO_INCREMENT NOT NULL, product_id INT UNSIGNED NOT NULL, currency_id SMALLINT UNSIGNED NOT NULL, vat_id SMALLINT UNSIGNED NOT NULL, price_vat_exc DOUBLE PRECISION DEFAULT NULL, price_vat_inc DOUBLE PRECISION DEFAULT NULL, status VARCHAR(50) DEFAULT NULL, INDEX IDX_6B9459854584665A (product_id), INDEX IDX_6B94598538248176 (currency_id), INDEX IDX_6B945985B5B63A6B (vat_id), INDEX IDX_product_price_status (status), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_promotion (id INT UNSIGNED AUTO_INCREMENT NOT NULL, product_id INT UNSIGNED NOT NULL, promotion_id SMALLINT UNSIGNED NOT NULL, country_id SMALLINT UNSIGNED NOT NULL, price_vat_exc DOUBLE PRECISION DEFAULT NULL, price_vat_inc DOUBLE PRECISION DEFAULT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_AFBDCB5C4584665A (product_id), INDEX IDX_AFBDCB5C139DF194 (promotion_id), INDEX IDX_AFBDCB5CF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_shipping (id INT UNSIGNED AUTO_INCREMENT NOT NULL, product_id INT UNSIGNED NOT NULL, shipping_id SMALLINT UNSIGNED NOT NULL, currency_id SMALLINT UNSIGNED DEFAULT NULL, country_id SMALLINT UNSIGNED DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_E6AC7DB34584665A (product_id), INDEX IDX_E6AC7DB34887F3F8 (shipping_id), INDEX IDX_E6AC7DB338248176 (currency_id), INDEX IDX_E6AC7DB3F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_stock (id INT UNSIGNED AUTO_INCREMENT NOT NULL, product_id INT UNSIGNED NOT NULL, storage_id SMALLINT UNSIGNED NOT NULL, quantity SMALLINT UNSIGNED NOT NULL, INDEX IDX_EA6A2D3C4584665A (product_id), INDEX IDX_EA6A2D3C5CC5DB90 (storage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL, post_id BIGINT UNSIGNED NOT NULL, offered_id INT UNSIGNED DEFAULT NULL, type_id SMALLINT UNSIGNED NOT NULL, percent DOUBLE PRECISION DEFAULT NULL, count SMALLINT UNSIGNED DEFAULT NULL, amount_vat_exc DOUBLE PRECISION DEFAULT NULL, start_at DATETIME NOT NULL, end_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_C11D7DD14B89032C (post_id), INDEX IDX_C11D7DD119692D5A (offered_id), INDEX IDX_promotion_start_at (start_at), INDEX IDX_promotion_end_at (end_at), INDEX IDX_promotion_dates (start_at, end_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion_lang (id INT UNSIGNED AUTO_INCREMENT NOT NULL, promotion_id SMALLINT UNSIGNED NOT NULL, language_id SMALLINT UNSIGNED NOT NULL, label VARCHAR(255) NOT NULL, INDEX IDX_87F30CFD139DF194 (promotion_id), INDEX IDX_87F30CFD82F1BAF4 (language_id), INDEX IDX_promotion_label (label), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shipping (id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shipping_lang (id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL, shipping_id SMALLINT UNSIGNED NOT NULL, language_id SMALLINT UNSIGNED NOT NULL, label VARCHAR(150) NOT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_A0B512604887F3F8 (shipping_id), INDEX IDX_A0B5126082F1BAF4 (language_id), INDEX IDX_shipping_label (label), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE storage (id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL, owner_id INT UNSIGNED NOT NULL, address_id INT UNSIGNED NOT NULL, label VARCHAR(150) NOT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_547A1B347E3C61F9 (owner_id), INDEX IDX_547A1B34F5B7AF75 (address_id), INDEX IDX_storage_label (label), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT UNSIGNED AUTO_INCREMENT NOT NULL, language_id SMALLINT UNSIGNED DEFAULT NULL, avatar_id BIGINT UNSIGNED DEFAULT NULL, login VARCHAR(100) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(150) DEFAULT NULL, last_name VARCHAR(150) DEFAULT NULL, roles VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649AA08CB10 (login), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D64982F1BAF4 (language_id), INDEX IDX_8D93D64986383B10 (avatar_id), INDEX IDX_password (password), INDEX IDX_first_name (first_name), INDEX IDX_last_name (last_name), INDEX IDX_name (first_name, last_name), INDEX IDX_roles (roles), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_address (id INT UNSIGNED AUTO_INCREMENT NOT NULL, user_id INT UNSIGNED NOT NULL, address_id INT UNSIGNED NOT NULL, type_id SMALLINT UNSIGNED DEFAULT NULL, INDEX IDX_5543718BA76ED395 (user_id), INDEX IDX_5543718BF5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vat (id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL, percent DOUBLE PRECISION NOT NULL, description VARCHAR(255) DEFAULT NULL, is_available TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vat_lang (id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL, vat_id SMALLINT UNSIGNED NOT NULL, language_id SMALLINT UNSIGNED DEFAULT NULL, label VARCHAR(150) DEFAULT NULL, INDEX IDX_18614C9CB5B63A6B (vat_id), INDEX IDX_18614C9C82F1BAF4 (language_id), INDEX IDX_vat_lang_label (label), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F818BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD44887F3F8 FOREIGN KEY (shipping_id) REFERENCES shipping (id)');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD46BF700BD FOREIGN KEY (status_id) REFERENCES command_status (id)');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD479D0C0E4 FOREIGN KEY (billing_address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD44D4CFF2B FOREIGN KEY (shipping_address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE command_detail ADD CONSTRAINT FK_9145B6D033E1689A FOREIGN KEY (command_id) REFERENCES command (id)');
        $this->addSql('ALTER TABLE command_detail ADD CONSTRAINT FK_9145B6D04584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE command_detail ADD CONSTRAINT FK_9145B6D0B5B63A6B FOREIGN KEY (vat_id) REFERENCES vat (id)');
        $this->addSql('ALTER TABLE command_status_lang ADD CONSTRAINT FK_C982B0DECC64FB6 FOREIGN KEY (command_status_id) REFERENCES command_status (id)');
        $this->addSql('ALTER TABLE command_status_lang ADD CONSTRAINT FK_C982B0D82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D782F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D738248176 FOREIGN KEY (currency_id) REFERENCES currency (id)');
        $this->addSql('ALTER TABLE country ADD CONSTRAINT FK_5373C96682F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE country ADD CONSTRAINT FK_5373C96638248176 FOREIGN KEY (currency_id) REFERENCES currency (id)');
        $this->addSql('ALTER TABLE email_lang ADD CONSTRAINT FK_AE3FA4E7A832C1C9 FOREIGN KEY (email_id) REFERENCES email (id)');
        $this->addSql('ALTER TABLE email_lang ADD CONSTRAINT FK_AE3FA4E782F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAECC64FB6 FOREIGN KEY (command_status_id) REFERENCES command_status (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAA832C1C9 FOREIGN KEY (email_id) REFERENCES email (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D727ACA70 FOREIGN KEY (parent_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE post_comment ADD CONSTRAINT FK_A99CE55F4B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE post_comment ADD CONSTRAINT FK_A99CE55FF8697D13 FOREIGN KEY (comment_id) REFERENCES comment (id)');
        $this->addSql('ALTER TABLE post_lang ADD CONSTRAINT FK_F85CE3694B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE post_lang ADD CONSTRAINT FK_F85CE36982F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE post_lang ADD CONSTRAINT FK_F85CE369F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD4B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD44F5D008 FOREIGN KEY (brand_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE product_comment ADD CONSTRAINT FK_45AD49DC4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_comment ADD CONSTRAINT FK_45AD49DCF8697D13 FOREIGN KEY (comment_id) REFERENCES comment (id)');
        $this->addSql('ALTER TABLE product_price ADD CONSTRAINT FK_6B9459854584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_price ADD CONSTRAINT FK_6B94598538248176 FOREIGN KEY (currency_id) REFERENCES currency (id)');
        $this->addSql('ALTER TABLE product_price ADD CONSTRAINT FK_6B945985B5B63A6B FOREIGN KEY (vat_id) REFERENCES vat (id)');
        $this->addSql('ALTER TABLE product_promotion ADD CONSTRAINT FK_AFBDCB5C4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_promotion ADD CONSTRAINT FK_AFBDCB5C139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE product_promotion ADD CONSTRAINT FK_AFBDCB5CF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE product_shipping ADD CONSTRAINT FK_E6AC7DB34584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_shipping ADD CONSTRAINT FK_E6AC7DB34887F3F8 FOREIGN KEY (shipping_id) REFERENCES shipping (id)');
        $this->addSql('ALTER TABLE product_shipping ADD CONSTRAINT FK_E6AC7DB338248176 FOREIGN KEY (currency_id) REFERENCES currency (id)');
        $this->addSql('ALTER TABLE product_shipping ADD CONSTRAINT FK_E6AC7DB3F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE product_stock ADD CONSTRAINT FK_EA6A2D3C4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_stock ADD CONSTRAINT FK_EA6A2D3C5CC5DB90 FOREIGN KEY (storage_id) REFERENCES storage (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD14B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD119692D5A FOREIGN KEY (offered_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE promotion_lang ADD CONSTRAINT FK_87F30CFD139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE promotion_lang ADD CONSTRAINT FK_87F30CFD82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE shipping_lang ADD CONSTRAINT FK_A0B512604887F3F8 FOREIGN KEY (shipping_id) REFERENCES shipping (id)');
        $this->addSql('ALTER TABLE shipping_lang ADD CONSTRAINT FK_A0B5126082F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE storage ADD CONSTRAINT FK_547A1B347E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE storage ADD CONSTRAINT FK_547A1B34F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64982F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64986383B10 FOREIGN KEY (avatar_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE user_address ADD CONSTRAINT FK_5543718BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_address ADD CONSTRAINT FK_5543718BF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE vat_lang ADD CONSTRAINT FK_18614C9CB5B63A6B FOREIGN KEY (vat_id) REFERENCES vat (id)');
        $this->addSql('ALTER TABLE vat_lang ADD CONSTRAINT FK_18614C9C82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD479D0C0E4');
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD44D4CFF2B');
        $this->addSql('ALTER TABLE storage DROP FOREIGN KEY FK_547A1B34F5B7AF75');
        $this->addSql('ALTER TABLE user_address DROP FOREIGN KEY FK_5543718BF5B7AF75');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F818BAC62AF');
        $this->addSql('ALTER TABLE command_detail DROP FOREIGN KEY FK_9145B6D033E1689A');
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD46BF700BD');
        $this->addSql('ALTER TABLE command_status_lang DROP FOREIGN KEY FK_C982B0DECC64FB6');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CAECC64FB6');
        $this->addSql('ALTER TABLE post_comment DROP FOREIGN KEY FK_A99CE55FF8697D13');
        $this->addSql('ALTER TABLE product_comment DROP FOREIGN KEY FK_45AD49DCF8697D13');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81F92F3E70');
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234F92F3E70');
        $this->addSql('ALTER TABLE product_promotion DROP FOREIGN KEY FK_AFBDCB5CF92F3E70');
        $this->addSql('ALTER TABLE product_shipping DROP FOREIGN KEY FK_E6AC7DB3F92F3E70');
        $this->addSql('ALTER TABLE configuration DROP FOREIGN KEY FK_A5E2A5D738248176');
        $this->addSql('ALTER TABLE country DROP FOREIGN KEY FK_5373C96638248176');
        $this->addSql('ALTER TABLE product_price DROP FOREIGN KEY FK_6B94598538248176');
        $this->addSql('ALTER TABLE product_shipping DROP FOREIGN KEY FK_E6AC7DB338248176');
        $this->addSql('ALTER TABLE email_lang DROP FOREIGN KEY FK_AE3FA4E7A832C1C9');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CAA832C1C9');
        $this->addSql('ALTER TABLE command_status_lang DROP FOREIGN KEY FK_C982B0D82F1BAF4');
        $this->addSql('ALTER TABLE configuration DROP FOREIGN KEY FK_A5E2A5D782F1BAF4');
        $this->addSql('ALTER TABLE country DROP FOREIGN KEY FK_5373C96682F1BAF4');
        $this->addSql('ALTER TABLE email_lang DROP FOREIGN KEY FK_AE3FA4E782F1BAF4');
        $this->addSql('ALTER TABLE post_lang DROP FOREIGN KEY FK_F85CE36982F1BAF4');
        $this->addSql('ALTER TABLE promotion_lang DROP FOREIGN KEY FK_87F30CFD82F1BAF4');
        $this->addSql('ALTER TABLE shipping_lang DROP FOREIGN KEY FK_A0B5126082F1BAF4');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64982F1BAF4');
        $this->addSql('ALTER TABLE vat_lang DROP FOREIGN KEY FK_18614C9C82F1BAF4');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D727ACA70');
        $this->addSql('ALTER TABLE post_comment DROP FOREIGN KEY FK_A99CE55F4B89032C');
        $this->addSql('ALTER TABLE post_lang DROP FOREIGN KEY FK_F85CE3694B89032C');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD4B89032C');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD44F5D008');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD14B89032C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64986383B10');
        $this->addSql('ALTER TABLE command_detail DROP FOREIGN KEY FK_9145B6D04584665A');
        $this->addSql('ALTER TABLE product_comment DROP FOREIGN KEY FK_45AD49DC4584665A');
        $this->addSql('ALTER TABLE product_price DROP FOREIGN KEY FK_6B9459854584665A');
        $this->addSql('ALTER TABLE product_promotion DROP FOREIGN KEY FK_AFBDCB5C4584665A');
        $this->addSql('ALTER TABLE product_shipping DROP FOREIGN KEY FK_E6AC7DB34584665A');
        $this->addSql('ALTER TABLE product_stock DROP FOREIGN KEY FK_EA6A2D3C4584665A');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD119692D5A');
        $this->addSql('ALTER TABLE product_promotion DROP FOREIGN KEY FK_AFBDCB5C139DF194');
        $this->addSql('ALTER TABLE promotion_lang DROP FOREIGN KEY FK_87F30CFD139DF194');
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD44887F3F8');
        $this->addSql('ALTER TABLE product_shipping DROP FOREIGN KEY FK_E6AC7DB34887F3F8');
        $this->addSql('ALTER TABLE shipping_lang DROP FOREIGN KEY FK_A0B512604887F3F8');
        $this->addSql('ALTER TABLE product_stock DROP FOREIGN KEY FK_EA6A2D3C5CC5DB90');
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD4A76ED395');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('ALTER TABLE post_lang DROP FOREIGN KEY FK_F85CE369F675F31B');
        $this->addSql('ALTER TABLE storage DROP FOREIGN KEY FK_547A1B347E3C61F9');
        $this->addSql('ALTER TABLE user_address DROP FOREIGN KEY FK_5543718BA76ED395');
        $this->addSql('ALTER TABLE command_detail DROP FOREIGN KEY FK_9145B6D0B5B63A6B');
        $this->addSql('ALTER TABLE product_price DROP FOREIGN KEY FK_6B945985B5B63A6B');
        $this->addSql('ALTER TABLE vat_lang DROP FOREIGN KEY FK_18614C9CB5B63A6B');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE command');
        $this->addSql('DROP TABLE command_detail');
        $this->addSql('DROP TABLE command_status');
        $this->addSql('DROP TABLE command_status_lang');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE configuration');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE currency');
        $this->addSql('DROP TABLE email');
        $this->addSql('DROP TABLE email_history');
        $this->addSql('DROP TABLE email_lang');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE post_comment');
        $this->addSql('DROP TABLE post_lang');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_comment');
        $this->addSql('DROP TABLE product_price');
        $this->addSql('DROP TABLE product_promotion');
        $this->addSql('DROP TABLE product_shipping');
        $this->addSql('DROP TABLE product_stock');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE promotion_lang');
        $this->addSql('DROP TABLE shipping');
        $this->addSql('DROP TABLE shipping_lang');
        $this->addSql('DROP TABLE storage');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_address');
        $this->addSql('DROP TABLE vat');
        $this->addSql('DROP TABLE vat_lang');
    }
}
