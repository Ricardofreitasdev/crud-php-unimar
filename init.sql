CREATE DATABASE IF NOT EXISTS filmes_db;

USE filmes_db;

CREATE TABLE IF NOT EXISTS filmes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    diretor VARCHAR(255) NOT NULL,
    ano INT NOT NULL,
    genero VARCHAR(100) NOT NULL
);
