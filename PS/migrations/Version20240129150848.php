<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240129150848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorias (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pedidos (id INT AUTO_INCREMENT NOT NULL, fecharecibido DATETIME NOT NULL, fechaenviado DATETIME NOT NULL, cliente INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE incluye (id INT AUTO_INCREMENT NOT NULL, pedido INT NOT NULL, producto INT NOT NULL, unidades INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE productos (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, stock INT NOT NULL, precio INT NOT NULL, categoria INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reabastece (id INT AUTO_INCREMENT NOT NULL, producto INT NOT NULL, administrador INT NOT NULL, unidades INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(180) NOT NULL, apellidos VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('ALTER TABLE productos ADD CONSTRAINT fk_cat FOREIGN KEY (categoria) REFERENCES categoria(id)');
        $this->addSql('ALTER TABLE pedidos ADD CONSTRAINT fk_cliente FOREIGN KEY (cliente) REFERENCES user(id)');
        $this->addSql('ALTER TABLE incluye ADD CONSTRAINT fk_pedido FOREIGN KEY (pedido) REFERENCES pedidos(id)');
        $this->addSql('ALTER TABLE incluye ADD CONSTRAINT fk_producto FOREIGN KEY (producto) REFERENCES productos(id)');
        $this->addSql('ALTER TABLE reabastece ADD CONSTRAINT fk_admin FOREIGN KEY (administrador) REFERENCES user(id)');
        $this->addSql('ALTER TABLE reabastece ADD CONSTRAINT fk_producto FOREIGN KEY (producto) REFERENCES productos(id)');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE categorias');
        $this->addSql('DROP TABLE pedidos');
        $this->addSql('DROP TABLE incluye');
        $this->addSql('DROP TABLE productos');
        $this->addSql('DROP TABLE reabastece');
        $this->addSql('DROP TABLE user');
    }
}
