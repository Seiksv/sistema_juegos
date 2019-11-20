-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2019 a las 01:32:59
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_juego`
--
CREATE DATABASE IF NOT EXISTS `sistema_juego` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sistema_juego`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `idCurso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCurso`),
  UNIQUE KEY `idCurso_UNIQUE` (`idCurso`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idCurso`, `nombre`) VALUES
(1, 'Kinder');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE IF NOT EXISTS `juego` (
  `idJuego` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idJuego`),
  UNIQUE KEY `idJuego_UNIQUE` (`idJuego`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`idJuego`, `nombre`) VALUES
(1, 'Nivel 1'),
(2, 'Nivel 2'),
(3, 'Nivel 3'),
(4, 'Nivel 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego_x_usuario`
--

CREATE TABLE IF NOT EXISTS `juego_x_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_juego` int(11) NOT NULL,
  `intentos` int(11) NOT NULL,
  `fallos` int(11) NOT NULL,
  `aciertos` int(11) NOT NULL,
  `mejor_acierto` int(11) NOT NULL,
  `mejor_fallo` int(11) NOT NULL,
  `mejor_intento` int(11) NOT NULL,
  `finalizado` varchar(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_juego` (`id_juego`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `juego_x_usuario`
--

INSERT INTO `juego_x_usuario` (`id`, `id_usuario`, `id_juego`, `intentos`, `fallos`, `aciertos`, `mejor_acierto`, `mejor_fallo`, `mejor_intento`, `finalizado`) VALUES
(1, 1, 1, 5, 0, 3, 2, 0, 2, 'no'),
(2, 1, 2, 2, 3, 4, 10, 5, 6, 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuacion`
--

CREATE TABLE IF NOT EXISTS `puntuacion` (
  `idPuntuacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `Juego_idJuego` int(11) NOT NULL,
  PRIMARY KEY (`idPuntuacion`,`id_usuario`),
  UNIQUE KEY `idPuntuacion_UNIQUE` (`idPuntuacion`),
  KEY `fk_Puntuacion_Usuario_idx` (`id_usuario`),
  KEY `fk_Puntuacion_Juego1_idx` (`Juego_idJuego`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpousuario`
--

CREATE TABLE IF NOT EXISTS `tpousuario` (
  `id_tpo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tpo_usuario`),
  UNIQUE KEY `id_tpo_usuario_UNIQUE` (`id_tpo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tpousuario`
--

INSERT INTO `tpousuario` (`id_tpo_usuario`, `nombre`) VALUES
(1, 'usuario'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `contra` varchar(45) DEFAULT NULL,
  `TpoUsuario_id_tpo_usuario` int(11) NOT NULL,
  `Curso_idCurso` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`),
  KEY `fk_Usuario_TpoUsuario1_idx` (`TpoUsuario_id_tpo_usuario`),
  KEY `fk_Usuario_Curso1_idx` (`Curso_idCurso`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `contra`, `TpoUsuario_id_tpo_usuario`, `Curso_idCurso`, `usuario`) VALUES
(1, 'Wicho', 'Wichon', '1234', 1, 1, 'wicho');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juego_x_usuario`
--
ALTER TABLE `juego_x_usuario`
  ADD CONSTRAINT `juego_fk` FOREIGN KEY (`id_juego`) REFERENCES `juego` (`idJuego`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
  ADD CONSTRAINT `fk_Puntuacion_Juego1` FOREIGN KEY (`Juego_idJuego`) REFERENCES `juego` (`idJuego`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Puntuacion_Usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Curso1` FOREIGN KEY (`Curso_idCurso`) REFERENCES `curso` (`idCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_TpoUsuario1` FOREIGN KEY (`TpoUsuario_id_tpo_usuario`) REFERENCES `tpousuario` (`id_tpo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
