-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-03-2021 a las 20:31:40
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `codigoteams`
--
CREATE DATABASE IF NOT EXISTS `codigoteams` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `codigoteams`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `Codigo_Curso` varchar(30) DEFAULT NULL,
  `Nombre_Curso` varchar(100) DEFAULT NULL,
  `Horario` varchar(20) DEFAULT NULL,
  `Numero_Grupo` varchar(2) DEFAULT NULL,
  `Codigo_Teams` varchar(20) DEFAULT NULL,
  `Docente` varchar(40) DEFAULT NULL,
  `Estado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `Codigo_Curso`, `Nombre_Curso`, `Horario`, `Numero_Grupo`, `Codigo_Teams`, `Docente`, `Estado`) VALUES
(2570, 'BSI-09', 'introduccion 3', 'S 10pm', '2', 'ft4hj', 'Pedro pablo', 'C/A'),
(2581, 'HIS-16', 'matematica 4', 'V 4pm', '3', 'eferetsf', 'jose', 'C/A'),
(2596, 'HIS-13', 'base de datos 2', 'L 7pm', '1', 'esfsftjt', 'pancho', 'C/A'),
(2599, 'HIS-17', 'Calculo 1', 'S 2pm', '4', 'seqfe', 'pepe', 'C/A'),
(2603, 'HIS-21', 'sistemas operativos 1', 'L 7pm', '3', 'adw132f', 'pepe', 'C/A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id` int(11) NOT NULL,
  `id_Materia` int(11) NOT NULL,
  `id_Estudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`id`, `id_Materia`, `id_Estudiante`) VALUES
(15, 2570, 2),
(16, 2581, 2),
(17, 2603, 2),
(18, 2599, 2),
(19, 2596, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `Contrasena` varchar(50) NOT NULL,
  `correo_alternativo` varchar(100) DEFAULT NULL,
  `Nombre_Completo` varchar(40) NOT NULL,
  `Cedula` int(10) NOT NULL,
  `Telefono` int(10) NOT NULL,
  `Administrador` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `Usuario`, `Contrasena`, `correo_alternativo`, `Nombre_Completo`, `Cedula`, `Telefono`, `Administrador`) VALUES
(1, 'administrador@ulatina.net', 'administrador', NULL, 'administrador', 604690552, 77889900, 1),
(2, 'estudiante@ulatina.net', 'estudiante', NULL, 'estudiante', 0, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_materia` (`id_Materia`),
  ADD KEY `fk_id_estudiante` (`id_Estudiante`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2621;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `fk_id_estudiante` FOREIGN KEY (`id_Estudiante`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_id_materia` FOREIGN KEY (`id_Materia`) REFERENCES `materias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
