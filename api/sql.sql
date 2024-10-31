CREATE DATABASE iara;

USE IARA;


CREATE TABLE usuarios(
    id INT AUTO_INCREMENT NOT NULL,
    nome varchar(200) NOT NULL,
    sobrenome VARCHAR(200) NOT NULL,
    cpf varchar(14) NOT NULL,
    email VARCHAR(200) NOT NULL,
    senha VARCHAR(200) NOT NULL,
    PRIMARY KEY (id)
);