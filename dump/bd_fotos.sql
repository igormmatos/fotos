CREATE DATABASE fotos;

USE fotos;

CREATE TABLE fotos(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  caminho LONGTEXT NOT NULL,
  alt VARCHAR(150) NOT NULL,
  PRIMARY KEY (id)
);