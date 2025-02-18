CREATE DATABASE Biblioteca;
USE Biblioteca;

-- Tabla de Usuarios Basica, tiene una relacion con ejemplares que es prestar
CREATE TABLE Usuarios (
    IdUsuario VARCHAR(6) PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Direccion VARCHAR(50),
    Telefono VARCHAR(9),
    Curso INT(1),
    Email VARCHAR(50) UNIQUE,
    Clave VARCHAR(8) NOT NULL
);

-- Tabla de Préstamos la relacion de usuarios y ejemplares, ses foranea de ambas
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

-- Tabla de Ejemplares la ultima tabla que mantiene la relacion con usuarios desde la tabla prestar
CREATE TABLE Ejemplar (
    IdEjemplar VARCHAR(4) PRIMARY KEY,
    Titulo VARCHAR(50) NOT NULL,
    Localizacion VARCHAR(50),
    Prestado BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (Titulo) REFERENCES Documento(Titulo)
);

-- Tabla de Documentos
CREATE TABLE Documento (
    Titulo VARCHAR(50) PRIMARY KEY NOT NULL,
    ISBN VARCHAR(9),
    ListaAutores VARCHAR(100),
    FechaPublicacion DATE,
    Editorial VARCHAR(100),
    NumEjemplares INT(2),
    Descripcion VARCHAR(100),
    Materia VARCHAR(25)
);

-- Tabla de Libros
CREATE TABLE Libro (
    Titulo VARCHAR(50) PRIMARY KEY,
    NumPaginas INT(5),
    FOREIGN KEY (Titulo) REFERENCES Documento(Titulo)
);

-- Tabla de Revistas
CREATE TABLE Revista (
    Titulo VARCHAR(50) PRIMARY KEY,
    Frecuencia VARCHAR(50),
    FOREIGN KEY (Titulo) REFERENCES Documento(Titulo)
);

-- Tabla de Multimedia
CREATE TABLE Multimedia (
    Titulo VARCHAR(50) PRIMARY KEY,
    Soporte VARCHAR(50),
    FOREIGN KEY (Titulo) REFERENCES Documento(Titulo)
);
