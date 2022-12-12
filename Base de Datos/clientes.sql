-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-12-2022 a las 02:13:54
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
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(255) NOT NULL,
  `fiscal_cliente` varchar(255) NOT NULL,
  `telefono_cliente` char(30) NOT NULL,
  `email_cliente` varchar(64) NOT NULL,
  `direccion_cliente` varchar(255) NOT NULL,
  `status_cliente` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL,
  `facebook` varchar(80) DEFAULT NULL,
  `instagram` varchar(80) DEFAULT NULL,
  `twitter` varchar(80) DEFAULT NULL,
  `tiktok` varchar(80) DEFAULT NULL,
  `fec_nacimiento` date DEFAULT NULL,
  `ciudad` varchar(80) DEFAULT NULL,
  `canal_comunicacion` varchar(150) DEFAULT NULL,
  `hijos` varchar(1) DEFAULT 'N',
  `pareja` varchar(1) DEFAULT 'N',
  `int_mayorista` varchar(1) DEFAULT 'N',
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `fiscal_cliente`, `telefono_cliente`, `email_cliente`, `direccion_cliente`, `status_cliente`, `date_added`, `facebook`, `instagram`, `twitter`, `tiktok`, `fec_nacimiento`, `ciudad`, `canal_comunicacion`, `hijos`, `pareja`, `int_mayorista`) VALUES
(13, 'TEST', 'TEST', '098512463', 'test@gmail.com', 'km 9', 1, '2022-12-01 18:26:48', 'test fb', 'test ig', 'twst tw', '', '2022-11-30', '54', 'WHATSAPP', 'S', 'S', 'N'),
(14, 'José Aguilera', '5971557-0', '0973118404', 'jose@gmail.com', 'AV. BLAS GARAY CASI AV. SAN JOSE', 1, '2022-12-02 20:05:34', 'José Aguilera ', '@joseaaguilera', '@joseaaguilera', '@joseaaguilera', '2022-12-08', '126', 'FACEBOOK', 'S', 'S', 'S'),
(16, 'TEST CIUDAD', '788456', '09845124125', 'tst', 'KM 98', 1, '2022-12-11 16:03:59', 'fb', '', '', '', '2022-10-13', '90', 'WHATSAPP', 'S', 'S', 'N');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
