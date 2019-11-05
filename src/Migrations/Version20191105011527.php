<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191105011527 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE cliente (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome_cliente VARCHAR(150) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , email VARCHAR(150) NOT NULL, cpf VARCHAR(30) NOT NULL, telefone VARCHAR(30) NOT NULL, senha VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE evento (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_local_evento_id INTEGER NOT NULL, nome_evento VARCHAR(100) NOT NULL, descricao VARCHAR(500) NOT NULL, link_imagem VARCHAR(250) NOT NULL, data DATETIME NOT NULL, valor DOUBLE PRECISION NOT NULL)');
        $this->addSql('CREATE INDEX IDX_47860B0590BCB496 ON evento (id_local_evento_id)');
        $this->addSql('CREATE TABLE ingresso (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_cliente_id INTEGER NOT NULL, id_evento_id INTEGER NOT NULL, codigo VARCHAR(30) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_64BC58C87BF9CE86 ON ingresso (id_cliente_id)');
        $this->addSql('CREATE INDEX IDX_64BC58C87904465 ON ingresso (id_evento_id)');
        $this->addSql('CREATE TABLE local_evento (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome_local VARCHAR(100) NOT NULL, capacidade INTEGER NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE evento');
        $this->addSql('DROP TABLE ingresso');
        $this->addSql('DROP TABLE local_evento');
    }
}
