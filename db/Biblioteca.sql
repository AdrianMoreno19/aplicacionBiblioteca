-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-03-2025 a las 19:38:28
-- Versión del servidor: 8.0.41-0ubuntu0.22.04.1
-- Versión de PHP: 8.1.2-1ubuntu2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Administradores`
--

CREATE TABLE `Administradores` (
  `id` int NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Administradores`
--

INSERT INTO `Administradores` (`id`, `Email`, `Nombre`) VALUES
(1, 'carlos.gomez@email.com', 'Carlos Gómez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Documento`
--

CREATE TABLE `Documento` (
  `idDocumento` int NOT NULL,
  `Titulo` varchar(50) DEFAULT NULL,
  `ListaAutores` varchar(100) DEFAULT NULL,
  `FechaPublicacion` date DEFAULT NULL,
  `Editorial` varchar(100) DEFAULT NULL,
  `NumEjemplares` tinyint DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Materia` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Documento`
--

INSERT INTO `Documento` (`idDocumento`, `Titulo`, `ListaAutores`, `FechaPublicacion`, `Editorial`, `NumEjemplares`, `Descripcion`, `Materia`) VALUES
(1, 'Libro A', 'Autor 1', '2020-01-01', 'Editorial A', 9, 'Descripción del libro A', 'Literatura'),
(2, 'Libro B', 'Autor 2', '2021-05-01', 'Editorial B', 10, 'Descripción del libro B', 'Ciencias'),
(3, 'Revista A', 'Autor 3', '2022-08-01', 'Editorial C', 10, 'Descripción del libro C', 'Historia'),
(4, 'Revista B', 'Autor 4', '2023-02-01', 'Editorial D', 10, 'Descripción del libro D', 'Filosofía'),
(5, 'Pelicula A', 'Autor G', '2023-11-01', 'Editorial Z', 10, 'Película educativa sobre ciencias naturales', 'Educación'),
(6, 'Pelicula B', 'Autor H', '2023-12-01', 'Editorial W', 10, 'Pelicula documental sobre astronomía', 'Ciencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ejemplar`
--

CREATE TABLE `Ejemplar` (
  `IdEjemplar` int NOT NULL,
  `idDocumento` int NOT NULL,
  `Localizacion` varchar(50) DEFAULT NULL,
  `Prestado` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Ejemplar`
--

INSERT INTO `Ejemplar` (`IdEjemplar`, `idDocumento`, `Localizacion`, `Prestado`) VALUES
(7, 1, 'Estantería A', 0),
(8, 1, 'Estantería A', 0),
(9, 1, 'Estantería A', 0),
(10, 1, 'Estantería A', 0),
(11, 1, 'Estantería A', 0),
(12, 1, 'Estantería A', 0),
(13, 1, 'Estantería A', 0),
(14, 1, 'Estantería A', 0),
(15, 1, 'Estantería A', 0),
(16, 1, 'Estantería A', 0),
(17, 2, 'Estantería B', 0),
(18, 2, 'Estantería B', 0),
(19, 2, 'Estantería B', 0),
(20, 2, 'Estantería B', 0),
(21, 2, 'Estantería B', 0),
(22, 2, 'Estantería B', 0),
(23, 2, 'Estantería B', 0),
(24, 2, 'Estantería B', 0),
(25, 2, 'Estantería B', 0),
(26, 2, 'Estantería B', 0),
(27, 3, 'Estantería C', 0),
(28, 3, 'Estantería C', 0),
(29, 3, 'Estantería C', 0),
(30, 3, 'Estantería C', 0),
(31, 3, 'Estantería C', 0),
(32, 3, 'Estantería C', 0),
(33, 3, 'Estantería C', 0),
(34, 3, 'Estantería C', 0),
(35, 3, 'Estantería C', 0),
(36, 3, 'Estantería C', 0),
(37, 4, 'Estantería D', 0),
(38, 4, 'Estantería D', 0),
(39, 4, 'Estantería D', 0),
(40, 4, 'Estantería D', 0),
(41, 4, 'Estantería D', 0),
(42, 4, 'Estantería D', 0),
(43, 4, 'Estantería D', 0),
(44, 4, 'Estantería D', 0),
(45, 4, 'Estantería D', 0),
(46, 4, 'Estantería D', 0),
(47, 5, 'Estantería A', 0),
(48, 5, 'Estantería A', 0),
(49, 5, 'Estantería A', 0),
(50, 5, 'Estantería A', 0),
(51, 5, 'Estantería A', 0),
(52, 5, 'Estantería A', 0),
(53, 5, 'Estantería A', 0),
(54, 5, 'Estantería A', 0),
(55, 5, 'Estantería A', 0),
(56, 5, 'Estantería A', 0),
(57, 6, 'Estantería B', 0),
(58, 6, 'Estantería B', 0),
(59, 6, 'Estantería B', 0),
(60, 6, 'Estantería B', 0),
(61, 6, 'Estantería B', 0),
(62, 6, 'Estantería B', 0),
(63, 6, 'Estantería B', 0),
(64, 6, 'Estantería B', 0),
(65, 6, 'Estantería B', 0),
(66, 6, 'Estantería B', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Libro`
--

CREATE TABLE `Libro` (
  `idDocumento` int NOT NULL,
  `ISBN` varchar(13) DEFAULT NULL,
  `NumPaginas` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Libro`
--

INSERT INTO `Libro` (`idDocumento`, `ISBN`, `NumPaginas`) VALUES
(1, '9783161484100', 350),
(2, '9781861978769', 400);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Multimedia`
--

CREATE TABLE `Multimedia` (
  `idDocumento` int NOT NULL,
  `Soporte` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Multimedia`
--

INSERT INTO `Multimedia` (`idDocumento`, `Soporte`) VALUES
(5, 'DVD'),
(6, 'Blu-ray');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Prestar`
--

CREATE TABLE `Prestar` (
  `idUsuario` int NOT NULL,
  `IdEjemplar` int NOT NULL,
  `FechaP` date NOT NULL,
  `FechaD` date DEFAULT NULL,
  `Observacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Revista`
--

CREATE TABLE `Revista` (
  `idDocumento` int NOT NULL,
  `ISBN` varchar(13) DEFAULT NULL,
  `Frecuencia` enum('diario','semanal','mensual','anual') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Revista`
--

INSERT INTO `Revista` (`idDocumento`, `ISBN`, `Frecuencia`) VALUES
(3, '9781112134567', 'anual'),
(4, '9781415167890', 'diario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `idUsuario` int NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Telefono` varchar(9) DEFAULT NULL,
  `Curso` int DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Clave` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`idUsuario`, `Nombre`, `Direccion`, `Telefono`, `Curso`, `Email`, `Clave`) VALUES
(1, 'Juan Pérez', 'Av. Siempre Viva 123', '987654321', 1, 'juan.perez@email.com', '12345'),
(2, 'María López', 'Calle Falsa 456', '912345678', 2, 'maria.lopez@email.com', '12345'),
(3, 'Carlos Gómez', 'Paseo del Sol 789', NULL, 3, 'carlos.gomez@email.com', '12345'),
(4, 'Ana Torres', NULL, '923456789', 4, 'ana.torres@email.com', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Administradores`
--
ALTER TABLE `Administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Documento`
--
ALTER TABLE `Documento`
  ADD PRIMARY KEY (`idDocumento`);

--
-- Indices de la tabla `Ejemplar`
--
ALTER TABLE `Ejemplar`
  ADD PRIMARY KEY (`IdEjemplar`),
  ADD KEY `idDocumento` (`idDocumento`);

--
-- Indices de la tabla `Libro`
--
ALTER TABLE `Libro`
  ADD PRIMARY KEY (`idDocumento`);

--
-- Indices de la tabla `Multimedia`
--
ALTER TABLE `Multimedia`
  ADD PRIMARY KEY (`idDocumento`);

--
-- Indices de la tabla `Prestar`
--
ALTER TABLE `Prestar`
  ADD PRIMARY KEY (`idUsuario`,`IdEjemplar`,`FechaP`),
  ADD KEY `IdEjemplar` (`IdEjemplar`);

--
-- Indices de la tabla `Revista`
--
ALTER TABLE `Revista`
  ADD PRIMARY KEY (`idDocumento`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Administradores`
--
ALTER TABLE `Administradores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `Documento`
--
ALTER TABLE `Documento`
  MODIFY `idDocumento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `Ejemplar`
--
ALTER TABLE `Ejemplar`
  MODIFY `IdEjemplar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Ejemplar`
--
ALTER TABLE `Ejemplar`
  ADD CONSTRAINT `Ejemplar_ibfk_1` FOREIGN KEY (`idDocumento`) REFERENCES `Documento` (`idDocumento`);

--
-- Filtros para la tabla `Libro`
--
ALTER TABLE `Libro`
  ADD CONSTRAINT `Libro_ibfk_1` FOREIGN KEY (`idDocumento`) REFERENCES `Documento` (`idDocumento`);

--
-- Filtros para la tabla `Multimedia`
--
ALTER TABLE `Multimedia`
  ADD CONSTRAINT `Multimedia_ibfk_1` FOREIGN KEY (`idDocumento`) REFERENCES `Documento` (`idDocumento`);

--
-- Filtros para la tabla `Prestar`
--
ALTER TABLE `Prestar`
  ADD CONSTRAINT `Prestar_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`idUsuario`),
  ADD CONSTRAINT `Prestar_ibfk_2` FOREIGN KEY (`IdEjemplar`) REFERENCES `Ejemplar` (`IdEjemplar`);

--
-- Filtros para la tabla `Revista`
--
ALTER TABLE `Revista`
  ADD CONSTRAINT `Revista_ibfk_1` FOREIGN KEY (`idDocumento`) REFERENCES `Documento` (`idDocumento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
