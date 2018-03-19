CREATE SCHEMA if not exists agenda_mm;

USE agenda_mm;

CREATE TABLE pessoa
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200) NOT NULL,
    celular VARCHAR(20) NOT NULL,
    telefone VARCHAR(20) NULL,
    endereco VARCHAR(200) NULL,
    email VARCHAR(200) NOT NULL,
    observacao TEXT NULL,
    dataOperacao DATETIME DEFAULT NOW(),
    status CHAR(1)
);

CREATE TABLE usuario
(
  id_usuario INT PRIMARY KEY AUTO_INCREMENT,
  login VARCHAR(50) NOT NULL,
  senha VARCHAR(200) NOT NULL,
  dataCadastro DATETIME DEFAULT NOW()
);

CREATE TABLE auditoria
(
  id_pessoa_audit INT PRIMARY KEY NOT NULL,
  acao CHAR(1),
  dataOperacao DATETIME DEFAULT NOW()
);
