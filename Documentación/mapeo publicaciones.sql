DROP DATABASE IF EXISTS publicaciones;
CREATE DATABASE publicaciones;
USE publicaciones;

CREATE TABLE users(
    username VARCHAR(45) NOT NULL UNIQUE,
    password TEXT NOT NULL,
    email VARCHAR(45) NOT NULL,
    rol VARCHAR(15) NOT NULL,
    nombre VARCHAR(45) NOT NULL,
    apellido VARCHAR(45) NOT NULL,
    telefono VARCHAR(8) NOT NULL,
    estado VARCHAR(15) NOT NULL,
    PRIMARY KEY(username)
);

CREATE TABLE tipo_publico(
    tipo_publico VARCHAR(45) NOT NULL PRIMARY KEY
);

CREATE TABLE publicacion(
    id INT AUTO_INCREMENT NOT NULL,
    titulo TEXT,
    lugar TEXT,
    fecha DATE NOT NULL,
    hora_inicio TIME NOT NULL,
    cupos INT NOT NULL,
    url TEXT,
    username VARCHAR(45) NOT NULL,
    estado VARCHAR(15),
    PRIMARY KEY(id),
    FOREIGN KEY(username) REFERENCES users(username)
);

CREATE TABLE publico(
    id_publicacion INT NOT NULL,
    tipo_publico VARCHAR(45) NOT NULL,
    PRIMARY KEY(id_publicacion, tipo_publico),
    FOREIGN KEY(id_publicacion) REFERENCES publicacion(id),
    FOREIGN KEY(tipo_publico) REFERENCES tipo_publico(tipo_publico)
);

CREATE TABLE asistencia(
    id INT AUTO_INCREMENT NOT NULL,
    id_publicacion INT NOT NULL,
    username VARCHAR(45) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(username) REFERENCES users(username),
    FOREIGN KEY(id_publicacion) REFERENCES publicacion(id)
);

CREATE TABLE motivo(
    nombre VARCHAR(45) NOT NULL PRIMARY KEY
);

CREATE TABLE reporte(
    id INT AUTO_INCREMENT NOT NULL,
    id_publicacion INT NOT NULL,
    motivo VARCHAR(45) NOT NULL,
    fecha DATE NOT NULL,
    username VARCHAR(45),
    PRIMARY KEY(id),
    FOREIGN KEY(id_publicacion) REFERENCES publicacion(id),
    FOREIGN KEY(motivo) REFERENCES motivo(nombre),
    FOREIGN KEY(username) REFERENCES users(username)
);
