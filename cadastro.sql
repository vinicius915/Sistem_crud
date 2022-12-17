CREATE DATABASE CADASTRO;

USE CADASTRO;

CREATE TABLE `usuarios` (
     `id` INT NOT NULL AUTO_INCREMENT, 
     `Nome_user` VARCHAR(255) NOT NULL,
     `Senha_user` VARCHAR(255) NOT NULL,

     PRIMARY KEY (`id`);
)

