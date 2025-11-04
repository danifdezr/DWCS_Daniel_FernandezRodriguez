CREATE DATABASE IF NOT EXISTS gestion_proyectos;
USE gestion_proyectos;

CREATE TABLE roles(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE usuarios(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    pass VARCHAR(255) NOT NULL,
    id_rol INT NOT NULL,
    FOREIGN KEY (id_rol) REFERENCES roles(id)
);


CREATE TABLE proyectos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(300) NOT NULL,
    id_responsable INT NOT NULL,
    FOREIGN KEY (id_responsable) REFERENCES usuarios(id)
);

CREATE TABLE programador_proyecto(
    id_programador INT NOT NULL,
    id_proyecto INT NOT NULL,
    PRIMARY KEY (id_programador, id_proyecto),
    FOREIGN KEY (id_programador) REFERENCES usuarios(id),
    FOREIGN KEY (id_proyecto) REFERENCES proyectos(id)
);