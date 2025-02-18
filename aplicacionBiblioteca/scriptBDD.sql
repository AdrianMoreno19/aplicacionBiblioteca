CREATE DATABASE Biblioteca;
USE Biblioteca;

-- Tabla de Usuarios
CREATE TABLE Usuarios (
    IdUsuario VARCHAR(6) PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Direccion VARCHAR(50),
    Telefono VARCHAR(9),
    Curso INT(1),
    Email VARCHAR(50) UNIQUE,
    Clave VARCHAR(8) NOT NULL
);

-- Tabla de Documentos
CREATE TABLE Documento (
    ISBN VARCHAR(9) PRIMARY KEY,
    Titulo VARCHAR(50) NOT NULL,
    ListaAutores VARCHAR(100),
    FechaPublicacion DATE,
    NumPaginas INT(5),
    NumEjemplares INT(2),
    Descripcion VARCHAR(100),
    Materia VARCHAR(25)
);

-- Tabla de Ejemplares
CREATE TABLE Ejemplar (
    IdEjemplar VARCHAR(4) PRIMARY KEY,
    ISBN VARCHAR(9),
    Localizacion VARCHAR(50),
    Prestado BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (ISBN) REFERENCES Documento(ISBN)
);

-- Tabla de Préstamos
CREATE TABLE Prestar (
    IdUsuario VARCHAR(6),
    IdEjemplar VARCHAR(4),
    FechaP DATE NOT NULL,
    FechaD DATE,
    Estado BOOLEAN DEFAULT FALSE,
    Observacion VARCHAR(100),
    PRIMARY KEY (IdUsuario, IdEjemplar, FechaP),
    FOREIGN KEY (IdUsuario) REFERENCES Usuarios(IdUsuario),
    FOREIGN KEY (IdEjemplar) REFERENCES Ejemplar(IdEjemplar)
);

-- Tabla de Libros
CREATE TABLE Libro (
    ISBN VARCHAR(9) PRIMARY KEY,
    NumPaginas INT(5),
    FOREIGN KEY (ISBN) REFERENCES Documento(ISBN)
);

-- Tabla de Revistas
CREATE TABLE Revista (
    ISBN VARCHAR(9) PRIMARY KEY,
    Frecuencia VARCHAR(50),
    FOREIGN KEY (ISBN) REFERENCES Documento(ISBN)
);

-- Tabla de Multimedia
CREATE TABLE Multimedia (
    ISBN VARCHAR(9) PRIMARY KEY,
    Soporte VARCHAR(50),
    FOREIGN KEY (ISBN) REFERENCES Documento(ISBN)
);
