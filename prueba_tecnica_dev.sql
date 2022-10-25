-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-10-2022 a las 17:47:48
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `prueba_tecnica_dev`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre`) VALUES
(1, 'Administrativa y Financiera'),
(2, 'Ingeniería'),
(5, 'Desarrollo de Negocio'),
(6, 'Proyectos'),
(7, 'Servicios'),
(8, 'Calidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sexo` char(1) NOT NULL,
  `area_id` int(11) NOT NULL,
  `boletin` int(11) DEFAULT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `area_id` (`area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `email`, `sexo`, `area_id`, `boletin`, `descripcion`) VALUES
(6, 'Javier AndrÃ©s Rojas Erazo', 'jare_123@hotmail.com', 'M', 2, 1, 'Pruebas'),
(7, 'Maria Alejandra Guevara', 'alejandra25@gmail.com', 'F', 8, 0, 'SISO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_rol`
--

CREATE TABLE IF NOT EXISTS `empleado_rol` (
  `empleado_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  KEY `empleado_id` (`empleado_id`),
  KEY `rol_id` (`rol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `empleado_rol`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `prod_nombre` varchar(200) NOT NULL,
  `prod_referencia` varchar(100) NOT NULL,
  `prod_precio` int(100) NOT NULL,
  `prod_peso` varchar(100) NOT NULL,
  `prod_categoria` varchar(100) NOT NULL,
  `prod_stock` int(100) NOT NULL,
  `prod_fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_prod`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcar la base de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `prod_nombre`, `prod_referencia`, `prod_precio`, `prod_peso`, `prod_categoria`, `prod_stock`, `prod_fecha_creacion`) VALUES
(6, 'Carne En Salsa', '45SDFG9855', 12000, '500', 'Carnes', 17, '2022-10-08 02:15:37'),
(7, 'Michelada', '421565SJA', 7000, '10', 'Bebidas', 12, '2022-10-08 15:17:27'),
(8, 'Cafe ', '54122SAS', 3000, '6', 'Bebidas', 65, '2022-10-08 15:24:40'),
(9, 'Margarita', '784236AHSA', 35000, '6', 'Bebidas', 8, '2022-10-08 15:33:20'),
(11, 'Carne Asada', '45123SAS', 25000, '250', 'Carnes', 20, '2022-10-08 15:44:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Desarrollador'),
(2, 'Analista'),
(3, 'Tester'),
(4, 'Diseñador'),
(5, 'Profesional PMO'),
(6, 'Profesional de servicios'),
(7, 'Auxiliar administrativo'),
(8, 'Codirector');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `id_vent` int(11) NOT NULL AUTO_INCREMENT,
  `id_prod` int(11) NOT NULL,
  `prod_ref` varchar(200) NOT NULL,
  `prod_prec` int(11) NOT NULL,
  `vnt_cant_prod` varchar(11) NOT NULL,
  `vnt_prec_total_prod` int(11) NOT NULL,
  `vnt_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_vent`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Volcar la base de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_vent`, `id_prod`, `prod_ref`, `prod_prec`, `vnt_cant_prod`, `vnt_prec_total_prod`, `vnt_fecha`) VALUES
(37, 11, '45123SAS', 25000, '5', 125000, '2022-10-08 16:28:22'),
(38, 6, '45SDFG9855', 12000, '5', 60000, '2022-10-08 16:37:58'),
(39, 7, '421565SJA', 7000, '3', 21000, '2022-10-08 16:38:12'),
(40, 9, '784236AHSA', 35000, '2', 70000, '2022-10-08 16:38:22'),
(41, 6, '45SDFG9855', 12000, '3', 36000, '2022-10-08 16:39:35');

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_rol`
--
ALTER TABLE `empleado_rol`
  ADD CONSTRAINT `empleado_rol_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_rol_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
