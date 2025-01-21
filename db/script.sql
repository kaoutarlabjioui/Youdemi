-- Active: 1735497149371@@127.0.0.1@3306@youdemi
CREATE DATABASE youdemi ;

USE youdemi ;

CREATE TABLE roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(25) UNIQUE,
    role_description TEXT
)ENGINE=INNODB;


CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(30),
    prenom VARCHAR(30),
    email VARCHAR(50) UNIQUE,
    password VARCHAR(50),
    role_id INT ,
    Foreign Key (role_id) REFERENCES roles(id)
)ENGINE=INNODB;


CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) UNIQUE,
    description TEXT
) ENGINE = INNODB;


CREATE TABLE tags (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) UNIQUE,
    description TEXT
) ENGINE = INNODB;


CREATE TABLE courses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255),
    photo varchar(225),
    description TEXT,
    contenu VARCHAR(255),
    categorie_id INT,
    enseignant_id INT,
    Foreign Key (categorie_id) REFERENCES categories (id),
    Foreign Key (enseignant_id) REFERENCES users (id)
) ENGINE = INNODB;

CREATE TABLE course_tags (
    cours_id INT,
    tag_id INT,
    FOREIGN KEY (cours_id) REFERENCES courses (id),
    FOREIGN KEY (tag_id) REFERENCES tags (id),
    PRIMARY KEY (cours_id, tag_id)
) ENGINE = INNODB;

CREATE TABLE inscriptions (
    cours_id INT,
    FOREIGN KEY (cours_id) REFERENCES courses (id),
    etudiant_id INT,
    FOREIGN KEY (etudiant_id) REFERENCES users (id),
    PRIMARY KEY (cours_id, etudiant_id)
) ENGINE = INNODB;