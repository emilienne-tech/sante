CREATE DATABASE base ;
USE base;

CREATE TABLE utilisateurs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR (100),
  email VARCHAR (100),
  mot_de_passe (255)
  );

