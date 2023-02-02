-- -----------------------------------------------------
-- Base de datos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS peludines;
USE peludines ;
-- -----------------------------------------------------
-- Tabla de usuarios
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS users (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(45) NOT NULL UNIQUE,
password VARCHAR(64) NOT NULL,
email VARCHAR(255) NOT NULL UNIQUE,
created DATETIME NOT NULL);
-- -----------------------------------------------------
-- Tabla de animales
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS animals (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
created DATETIME NOT NULL,
type ENUM('gato', 'perro') NOT NULL);