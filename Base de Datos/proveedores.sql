-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-12-2022 a las 02:14:13
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
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_proveedor` varchar(255) NOT NULL,
  `fiscal_proveedor` varchar(100) NOT NULL,
  `web_proveedor` varchar(255) NOT NULL,
  `direccion_proveedor` text NOT NULL,
  `contacto_proveedor` varchar(255) NOT NULL,
  `email_proveedor` varchar(255) NOT NULL,
  `telefono_proveedor` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL,
  `estado_proveedor` tinyint(4) NOT NULL,
  `facebook` varchar(80) DEFAULT NULL,
  `instagram` varchar(80) DEFAULT NULL,
  `twitter` varchar(80) DEFAULT NULL,
  `tiktok` varchar(80) DEFAULT NULL,
  `rubro` varchar(100) DEFAULT NULL,
  `especialidad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre_proveedor`, `fiscal_proveedor`, `web_proveedor`, `direccion_proveedor`, `contacto_proveedor`, `email_proveedor`, `telefono_proveedor`, `date_added`, `estado_proveedor`, `facebook`, `instagram`, `twitter`, `tiktok`, `rubro`, `especialidad`) VALUES
(8, 'TEST2', '154161', 'ad@gmail.com', 'KM 12', 'LUZ', 'luz@gmail.com', '09145', '2022-12-01 09:22:56', 1, 'luz yanina', 'luzmi', 'yanina', '', 'Cuero', 'Ropas'),
(10, 'JUAN', '231211', 'jan ', 'KM 9', 'JUAN', '', '0985412365', '2022-12-09 06:03:03', 1, 'Test FB', 'Test IG', 'Test TW', 'Test TK', 'Hilo Encerado', 'Pulseras'),
(12, 'YANINA', '7864516', 'yani', 'KM 9', 'LUZ', '', '1861', '2022-12-11 19:04:28', 1, '', '', '', '', 'Hilo Encerado', 'pulseras');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
