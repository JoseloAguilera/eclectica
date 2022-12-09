-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 09-12-2022 a las 03:43:27
-- Versión del servidor: 5.7.40
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sist_eclectica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cta_contable`
--

DROP TABLE IF EXISTS `cta_contable`;
CREATE TABLE IF NOT EXISTS `cta_contable` (
  `id_cuenta_cont` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_cta_contable` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cuenta_cont`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cta_contable`
--

INSERT INTO `cta_contable` (`id_cuenta_cont`, `descripcion_cta_contable`) VALUES
(1, 'Pago de Salarios'),
(2, 'Pago de Impuestos');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
