-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2015 a las 00:17:07
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema gimnasio
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `gimnasio` ;
CREATE SCHEMA IF NOT EXISTS `gimnasio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `gimnasio` ;
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE IF NOT EXISTS `ficha` (
`id_Ficha` int(11) NOT NULL,
  `Peso` varchar(10) NOT NULL,
  `Masa Corporal` int(11) DEFAULT NULL,
  `Brazo` int(11) DEFAULT NULL,
  `Antebrazo` int(11) DEFAULT NULL,
  `Torax` int(11) DEFAULT NULL,
  `Cintura` int(11) DEFAULT NULL,
  `Abdomen` int(11) DEFAULT NULL,
  `Cadera` int(11) DEFAULT NULL,
  `Muslo` int(11) DEFAULT NULL,
  `Pierna` int(11) DEFAULT NULL,
  `Cuello` int(11) DEFAULT NULL,
  `Muslo Medio` int(11) DEFAULT NULL,
  `Usuario_id_Usuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`id_Ficha`, `Peso`, `Masa Corporal`, `Brazo`, `Antebrazo`, `Torax`, `Cintura`, `Abdomen`, `Cadera`, `Muslo`, `Pierna`, `Cuello`, `Muslo Medio`, `Usuario_id_Usuario`) VALUES
(1, '52', 23, 25, 22, 89, 70, 79, 97, 50, 80, 32, 32, 1024523634),
(2, '74', 25, 32, 27, 95, 87, 93, 99, 64, 92, 37, 36, 1024536362),
(3, '55', 24, 28, 24, 96, 85, 94, 108, 66, 85, 34, 35, 1024533772),
(4, '80', 67, 44, 40, 59, 99, 119, 120, 40, 79, 40, 36, 123),
(5, '67', 25, 34, 36, 32, 102, 109, 100, 70, 98, 39, 37, 1234),
(6, '55', 24, 26, 25, 89, 77, 82, 100, 51, 83, 32, 32, 123456),
(7, '66', 25, 33, 25, 93, 83, 89, 99, 65, 90, 35, 31, 2223);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutina`
--

CREATE TABLE IF NOT EXISTS `rutina` (
`id_Rutina` int(11) NOT NULL,
  `RutAsignada1` varchar(205) DEFAULT NULL,
  `RutAsignada2` varchar(205) DEFAULT NULL,
  `Usuario_id_Usuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rutina`
--

INSERT INTO `rutina` (`id_Rutina`, `RutAsignada1`, `RutAsignada2`, `Usuario_id_Usuario`) VALUES
(1, NULL, NULL, 1024523634),
(2, NULL, NULL, 1024533772),
(3, NULL, NULL, 1024536362);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id_Usuario` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Sexo` varchar(10) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Plan` varchar(75) NOT NULL,
  `RutAsignada1` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1024536363 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_Usuario`, `Nombre`, `Apellido`, `Edad`, `Sexo`, `Direccion`, `Telefono`, `Plan`, `RutAsignada1`) VALUES
(123, 'David', 'Morales', 23, 'Masculino', 'kr 99 sur 44-56', 7564834, 'Plan Trimestral', 'plantilla1.png'),
(1234, 'Camilo', 'Perez', 20, 'Masculino', 'calle 105 # 44-20', 5677890, 'Plan Mensual', 'plantilla1.png'),
(2223, 'Alejandro', 'Daza', 50, 'Masculino', 'calle 170 # 98-15', 7923267, 'Plan Mensual', 'plantilla1.png'),
(123456, 'Marcela', 'Ovalle', 22, 'Femenino', 'diagonal 79 BIS # 99-50', 56563391, 'Plan Anual', 'plantilla1.png'),
(1024523634, 'Lorena', 'Manzano', 23, 'Femenino', 'calle 58 B n 22-49', 7166514, 'Plan Mensual', 'plantilla1.png'),
(1024533772, 'Mariana', 'Perez', 40, 'Femenino', 'calle 98 B # 55-29', 7763345, 'Plan Anual', 'gimnasio.PNG'),
(1024536362, 'Andrés', 'Velandia', 22, 'Masculino', 'diagonal 68 C Bis # 33-85', 7923226, 'Plan Trimestral', 'gimnasio.PNG');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
 ADD PRIMARY KEY (`id_Ficha`,`Usuario_id_Usuario`), ADD KEY `fk_Ficha_Usuario` (`Usuario_id_Usuario`);

--
-- Indices de la tabla `rutina`
--
ALTER TABLE `rutina`
 ADD PRIMARY KEY (`id_Rutina`,`Usuario_id_Usuario`), ADD KEY `fk_Rutina_Usuario1` (`Usuario_id_Usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ficha`
--
ALTER TABLE `ficha`
MODIFY `id_Ficha` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `rutina`
--
ALTER TABLE `rutina`
MODIFY `id_Rutina` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id_Usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1024536363;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
ADD CONSTRAINT `fk_Ficha_Usuario` FOREIGN KEY (`Usuario_id_Usuario`) REFERENCES `usuario` (`id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rutina`
--
ALTER TABLE `rutina`
ADD CONSTRAINT `fk_Rutina_Usuario1` FOREIGN KEY (`Usuario_id_Usuario`) REFERENCES `usuario` (`id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
