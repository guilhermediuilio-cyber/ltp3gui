-- Remove o banco se ele já existir para evitar erros
DROP DATABASE IF EXISTS meubanco_c;

-- Cria o banco de dados
CREATE DATABASE meubanco_c;

-- Define o banco como o contexto atual
USE meubanco_c;

-- Cria a tabela de usuários
CREATE TABLE usuario (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    idade INT,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);