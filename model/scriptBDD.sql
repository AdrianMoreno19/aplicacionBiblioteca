CREATE DATABASE Biblioteca;
USE Biblioteca;

-- Tabla de Usuarios Basica, tiene una relacion con ejemplares que es prestar
CREATE TABLE Usuarios (
    idUsuario INT(8) PRIMARY KEY auto_increment,
    Nombre VARCHAR(50) NOT NULL,
    Direccion VARCHAR(50),
    Telefono VARCHAR(9),
    Curso INT(1),
    Email VARCHAR(50) UNIQUE,
    Clave VARCHAR(8) NOT NULL
);

-- Tabla de Administradores
CREATE Table Administradores (
    Email VARCHAR(50) PRIMARY KEY UNIQUE,
    Nombre VARCHAR(50) NOT NULL,
    Clave VARCHAR(8) NOT NULL
);

-- Tabla de Documentos
CREATE TABLE Documento (
    idDocumento int(5) PRIMARY KEY NOT NULL auto_increment,
    Titulo VARCHAR(50),
    ListaAutores VARCHAR(100),
    FechaPublicacion DATE,
    Editorial VARCHAR(100),
    NumEjemplares TINYINT,
    Descripcion VARCHAR(100),
    Materia VARCHAR(25)
);

-- Tabla de Ejemplares la ultima tabla que mantiene la relacion con usuarios desde la tabla prestar
CREATE TABLE Ejemplar (
    IdEjemplar INT(2) PRIMARY KEY auto_increment,
    idDocumento int(5) NOT NULL,
    Localizacion VARCHAR(50),
    Prestado BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (idDocumento) REFERENCES Documento(idDocumento)
);

-- Tabla de Préstamos la relacion de usuarios y ejemplares, ses foranea de ambas
CREATE TABLE Prestar (
    idUsuario INT(8),
    IdEjemplar INT(2),
    FechaP DATE,
    FechaD DATE,
    Observacion VARCHAR(100),
    PRIMARY KEY (idUsuario, IdEjemplar, FechaP),
    FOREIGN KEY (idUsuario) REFERENCES Usuarios(idUsuario),
    FOREIGN KEY (IdEjemplar) REFERENCES Ejemplar(IdEjemplar)
);

-- Tabla de Libros
CREATE TABLE Libro (
    idDocumento int(5) PRIMARY KEY,
    ISBN VARCHAR(9),
    NumPaginas INT(5),
    FOREIGN KEY (idDocumento) REFERENCES Documento(idDocumento)
);

-- Tabla de Revistas
CREATE TABLE Revista (
    idDocumento int(5) PRIMARY KEY,
    ISBN VARCHAR(9),
    Frecuencia ENUM('diaro', 'semanal', 'mensual', 'anual'),
    FOREIGN KEY (idDocumento) REFERENCES Documento(idDocumento)
);

-- Tabla de Multimedia
CREATE TABLE Multimedia (
    idDocumento int(5) PRIMARY KEY,
    Soporte VARCHAR(50),
    FOREIGN KEY (idDocumento) REFERENCES Documento(idDocumento)
);
