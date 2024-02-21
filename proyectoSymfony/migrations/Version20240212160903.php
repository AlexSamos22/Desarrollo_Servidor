<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240212160903 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE pedidos DROP FOREIGN KEY pedidos_ibfk_1');
        $this->addSql('ALTER TABLE pedidosproductos DROP FOREIGN KEY pedidosproductos_ibfk_2');
        $this->addSql('ALTER TABLE pedidosproductos DROP FOREIGN KEY pedidosproductos_ibfk_1');
        $this->addSql('ALTER TABLE productos DROP FOREIGN KEY productos_ibfk_1');
        $this->addSql('DROP TABLE categorias');
        $this->addSql('DROP TABLE pedidos');
        $this->addSql('DROP TABLE pedidosproductos');
        $this->addSql('DROP TABLE productos');
        $this->addSql('DROP INDEX UN_RES_COR ON restaurantes');
        $this->addSql('ALTER TABLE restaurantes CHANGE Correo correo VARCHAR(255) NOT NULL, CHANGE Clave clave VARCHAR(255) NOT NULL, CHANGE Pais pais VARCHAR(255) NOT NULL, CHANGE CP cp INT NOT NULL, CHANGE Ciudad ciudad VARCHAR(255) NOT NULL, CHANGE Direccion direccion VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorias (CodCat INT AUTO_INCREMENT NOT NULL, Nombre VARCHAR(45) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, Descripcion VARCHAR(200) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, UNIQUE INDEX UN_NOM_CAT (Nombre), PRIMARY KEY(CodCat)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE pedidos (CodPed INT AUTO_INCREMENT NOT NULL, Fecha DATETIME NOT NULL, Enviado INT NOT NULL, Restaurante INT NOT NULL, INDEX Restaurante (Restaurante), PRIMARY KEY(CodPed)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE pedidosproductos (CodPedProd INT AUTO_INCREMENT NOT NULL, Pedido INT NOT NULL, Producto INT NOT NULL, Unidades INT NOT NULL, INDEX CodProd (Producto), INDEX CodPed (Pedido), PRIMARY KEY(CodPedProd)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE productos (CodProd INT AUTO_INCREMENT NOT NULL, Nombre VARCHAR(45) CHARACTER SET latin1 DEFAULT \'NULL\' COLLATE `latin1_swedish_ci`, Descripcion VARCHAR(90) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, Peso DOUBLE PRECISION NOT NULL, Stock INT NOT NULL, Categoria INT NOT NULL, INDEX Categoria (Categoria), PRIMARY KEY(CodProd)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE pedidos ADD CONSTRAINT pedidos_ibfk_1 FOREIGN KEY (Restaurante) REFERENCES restaurantes (id)');
        $this->addSql('ALTER TABLE pedidosproductos ADD CONSTRAINT pedidosproductos_ibfk_2 FOREIGN KEY (Producto) REFERENCES productos (CodProd)');
        $this->addSql('ALTER TABLE pedidosproductos ADD CONSTRAINT pedidosproductos_ibfk_1 FOREIGN KEY (Pedido) REFERENCES pedidos (CodPed)');
        $this->addSql('ALTER TABLE productos ADD CONSTRAINT productos_ibfk_1 FOREIGN KEY (Categoria) REFERENCES categorias (CodCat)');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE restaurantes CHANGE correo Correo VARCHAR(90) NOT NULL, CHANGE clave Clave VARCHAR(45) NOT NULL, CHANGE pais Pais VARCHAR(45) NOT NULL, CHANGE cp CP INT DEFAULT NULL, CHANGE ciudad Ciudad VARCHAR(45) NOT NULL, CHANGE direccion Direccion VARCHAR(200) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UN_RES_COR ON restaurantes (Correo)');
    }
}
