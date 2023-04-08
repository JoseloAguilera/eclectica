-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-04-2023 a las 19:26:39
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

--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja_chica`
--

DROP TABLE IF EXISTS `caja_chica`;
CREATE TABLE IF NOT EXISTS `caja_chica` (
  `id_caja` int(11) NOT NULL AUTO_INCREMENT,
  `referencia_caja` varchar(255) NOT NULL,
  `monto_caja` double NOT NULL,
  `descripcion_caja` varchar(255) NOT NULL,
  `tipo_caja` tinyint(4) NOT NULL,
  `users_caja` int(11) NOT NULL,
  `date_added_caja` datetime NOT NULL,
  PRIMARY KEY (`id_caja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cargo` varchar(255) NOT NULL,
  `estado_cargo` varchar(11) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE IF NOT EXISTS `ciudad` (
  `id_ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_ciudad` varchar(100) NOT NULL,
  PRIMARY KEY (`id_ciudad`)
) ENGINE=MyISAM AUTO_INCREMENT=261 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `nombre_ciudad`) VALUES
(1, 'Asunción'),
(2, 'CDE'),
(3, 'Luque'),
(4, 'San Lorenzo'),
(5, 'Capiata'),
(6, 'Lambare'),
(7, 'Fdo de la Mora'),
(8, 'Limpio'),
(9, 'Caaguazu'),
(10, 'Coronel Oviedo'),
(11, 'PJC'),
(12, 'Itaugua'),
(13, 'Pte Franco'),
(14, 'MRA'),
(15, 'Minga Guazu'),
(16, 'Concepcion'),
(17, 'Hernandarias'),
(18, 'Aregua'),
(19, 'Villarrica'),
(20, 'San Antonio'),
(21, 'Horqueta'),
(22, 'Cambyreta'),
(23, 'Curuguaty'),
(24, 'Ypane'),
(25, 'Caacupe'),
(26, 'Santani'),
(27, 'JA Saldivar'),
(28, 'Villa Hayes'),
(29, 'Ita'),
(30, 'Villa Elisa'),
(31, 'Capiibary'),
(32, 'Santa Rosa del Aguaray'),
(33, 'Villeta'),
(34, 'Salto del Guaira'),
(35, 'San Juan Nepomuceno'),
(36, 'Guarambare'),
(37, 'J E Estigarribia'),
(38, 'Itakyry'),
(39, 'Carapegua'),
(40, 'Santa Rita'),
(41, 'San Pedro del Ycuamandiyu'),
(42, 'San Ignacio Guazu'),
(43, 'Yhu'),
(44, 'Yby Yau'),
(45, 'San Pedro del Parana'),
(46, 'Tobati'),
(47, 'Repatriacion'),
(48, 'Pilar'),
(49, 'Abai'),
(50, 'Yaguaron'),
(51, 'Guayaibi'),
(52, 'Piribebuy'),
(53, 'Mcal Jose Felix Estigarribia'),
(54, 'Chore'),
(55, 'Tomas Romero Pereira'),
(56, 'Ypacarai'),
(57, 'Tte Primero Manuel Irala Fernandez'),
(58, 'Yasy Cañy'),
(59, 'Independencia'),
(60, 'Paso Yobai'),
(61, 'Juan Emiliano Oleary'),
(62, 'Caazapa'),
(63, 'Arroyos y Esteros'),
(64, 'Ybycui'),
(65, 'Liberacion'),
(66, 'Dr Juan Manuel Frutos'),
(67, 'Gral Isidoro Resquin'),
(68, 'Eusebio Ayala'),
(69, 'San Juan Bautista'),
(70, 'Edelira'),
(71, 'Paraguari'),
(72, 'Gralk Elizardo Aquino'),
(73, 'Yuty'),
(74, 'San Rafael del Parana'),
(75, 'Mallorquin'),
(76, 'Quiindy'),
(77, 'Cnel Jose Felix Bogado'),
(78, 'Benjamin Aceval'),
(79, 'Natalio'),
(80, 'Emboscada'),
(81, 'San Jose de los Arroyos'),
(82, '3 de Mayo'),
(83, 'Carlos Antonio Lopez'),
(84, 'Filadelfia'),
(85, 'Ayolas'),
(86, 'Tavai'),
(87, 'Capitan Bado'),
(88, 'Loreto'),
(89, 'Santa Rosa de Lima'),
(90, 'Alto Vera'),
(91, 'San Joaquin'),
(92, 'Pirayu'),
(93, 'Bella Vista Norte'),
(94, 'Villa Ygatiomi'),
(95, 'Obligado'),
(96, 'Raul Arsenio Oviedo'),
(97, 'Loma Plata'),
(98, 'Atyra'),
(99, 'Itapua Poty'),
(100, 'Yrybucua'),
(101, 'Tacuati'),
(102, 'Acahay'),
(103, 'Carayao'),
(104, 'Hohenau'),
(105, 'Mayor Otaño'),
(106, 'Minga Pora'),
(107, 'Bella Vista'),
(108, 'Tembiapora'),
(109, 'Capitan Meza'),
(110, 'Altos'),
(111, ' Mbuyapey'),
(112, 'Capitan Miranda'),
(113, 'Ybyrarobana'),
(114, 'Caraguatay'),
(115, 'Yatytay'),
(116, 'Belen'),
(117, 'Gral Artigas'),
(118, 'Santa Rosa del Mbutuy'),
(119, 'Nueva Esperanza'),
(120, 'Nueva Italia'),
(121, 'San Roque Gonzalez'),
(122, 'Yataity del Norte'),
(123, 'San Bernardino'),
(124, 'Lima'),
(125, 'Puerto Pinasco'),
(126, 'Gral Francisco Caballero Alvarez'),
(127, 'San Lazaro'),
(128, 'Vaqueria'),
(129, 'Yby Pyta'),
(130, 'San Alberto'),
(131, 'Itacurubi del Rosario'),
(132, 'Jose Domingo Ocampos'),
(133, 'Yguazu'),
(134, 'San Cristobal'),
(135, 'Cap. Mauricio Jose Troche'),
(136, 'Itacurubi de la Cordillera'),
(137, 'Fram'),
(138, 'Villa del Rosario'),
(139, 'San Cosme y Damian'),
(140, 'Borja'),
(141, 'Los Cedrales'),
(142, '25 de Diciembre'),
(143, '3 de Febrero'),
(144, 'Trinidad'),
(145, 'San Juan del Parana'),
(146, 'Corpus Christi'),
(147, 'Dr Raul Peña'),
(148, 'Regimiento de Infantería Tres Corrales'),
(149, 'Alberdi'),
(150, 'Pirapo'),
(151, 'Azotey'),
(152, 'Ñacunday'),
(153, 'Carmen del Parana'),
(154, 'Santa María de Fe'),
(155, 'La Paloma del Espíritu Santo'),
(156, 'Mbocayaty del Guairá'),
(157, 'Ypejhu'),
(158, 'Iturbe'),
(159, 'Katuete'),
(160, 'Mbaracayu'),
(161, 'Escobar'),
(162, 'General Eugenio Alejandrino Garay'),
(163, 'Tavapy'),
(164, 'Caapucu'),
(165, 'Doctor Cecilio Báez'),
(166, 'General Delgado'),
(167, 'Zanja Pytá'),
(168, 'Isla Pucu'),
(169, 'Itape'),
(170, 'Nueva Alborada'),
(171, 'Santa Rosa del Monday'),
(172, 'Quyquyho'),
(173, 'Ybytymi'),
(174, 'Nueva Germania'),
(175, 'Coronel Martínez'),
(176, 'General Bernardino Caballero'),
(177, 'Union'),
(178, 'Sargento José Félix López'),
(179, 'Mariscal Francisco Solano López'),
(180, 'Valenzuela'),
(181, 'Juan de Mena'),
(182, 'José A. Fassardi'),
(183, 'Fulgencio Yegros'),
(184, 'Sapucai'),
(185, 'Puerto Casado'),
(186, 'Primero de Marzo'),
(187, 'Santiago'),
(188, 'Simón Bolívar'),
(189, 'Félix Pérez Cardozo'),
(190, 'Jesús'),
(191, 'General Higinio Morínigo'),
(192, 'Iruña'),
(193, 'Buena Vista'),
(194, 'San Miguel'),
(195, 'Nanawa'),
(196, 'San Juan Bautista del Ñeembucú'),
(197, 'San Alfredo'),
(198, 'Naranjal'),
(199, 'Dr Moisés Santiago Bertoni'),
(200, 'La Colmena'),
(201, 'Cerrito'),
(202, '	Domingo Martínez de Irala'),
(203, 'Karapaí'),
(204, 'La Pastora'),
(205, 'Natalicio Talavera'),
(206, 'Nueva Toledo'),
(207, 'Santa Elena'),
(208, 'Nueva Londres'),
(209, 'Maciel'),
(210, 'Yataity del Guairá'),
(211, 'José Leandro Oviedo'),
(212, '	Tebicuarymí'),
(213, 'Capitán Carmelo Peralta'),
(214, 'Fuerte Olimpo'),
(215, 'San José Obrero'),
(216, 'Antequera'),
(217, 'Mayor José Martínez'),
(218, 'José Falcón'),
(219, 'Mbocayaty del Yhaguy'),
(220, 'Paso Barreto'),
(221, 'Santa Fe del Paraná'),
(222, 'Gral José Eduvigis Díaz'),
(223, 'Tacuaras'),
(224, 'Nueva Colombia'),
(225, 'Villa Oliva'),
(226, 'Villa Florida'),
(227, 'San Patricio'),
(228, 'San Pablo'),
(229, 'Loma Grande'),
(230, '	Laureles'),
(231, 'Teniente Esteban Martínez'),
(232, 'Itanará'),
(233, 'Ñumí'),
(234, 'General José María Bruguez'),
(235, 'La Paz'),
(236, 'Tebicuary'),
(237, 'Humaitá'),
(238, 'Isla Umbú'),
(239, 'San Salvador'),
(240, 'Yabebyry'),
(241, 'Bahía Negra'),
(242, 'Villalbín'),
(243, 'Guazú Cuá'),
(244, 'Paso de Patria'),
(245, 'Desmochados'),
(246, 'Doctor Bottrell'),
(247, 'Villa Franca'),
(248, 'San Carlos del Apa'),
(249, 'Maracaná'),
(250, 'María Antonia'),
(251, 'San Vicente Pancholo'),
(252, 'Arroyito'),
(253, 'Nueva Asunción'),
(254, 'Paso Horqueta'),
(255, 'Cerro Corá'),
(256, 'Campo Aceval'),
(257, 'Laurel'),
(258, 'Paso Barreto'),
(259, 'San José del Rosario'),
(260, 'Boqueron');

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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `fiscal_cliente`, `telefono_cliente`, `email_cliente`, `direccion_cliente`, `status_cliente`, `date_added`, `facebook`, `instagram`, `twitter`, `tiktok`, `fec_nacimiento`, `ciudad`, `canal_comunicacion`, `hijos`, `pareja`, `int_mayorista`) VALUES
(13, 'TEST', 'TEST', '098512463', 'test@gmail.com', 'km 9', 1, '2022-12-01 18:26:48', 'test fb', 'test ig', 'twst tw', '', '2022-11-30', '54', 'WHATSAPP', 'S', 'S', 'N'),
(14, 'José Aguilera', '5971557-0', '0973118404', 'jose@gmail.com', 'AV. BLAS GARAY CASI AV. SAN JOSE', 1, '2022-12-02 20:05:34', 'José Aguilera ', '@joseaaguilera', '@joseaaguilera', '@joseaaguilera', '2022-12-08', '126', 'FACEBOOK', 'S', 'S', 'S'),
(19, 'NSHUIC', '789', '89', 'A', 'MKO', 1, '2023-01-01 17:15:39', '', '', '', '', '2023-01-01', '', 'WHATSAPP', 'N', 'N', 'N'),
(18, 'NEW CLIENTE', '985421', '985421', 'as', 'KM 19', 1, '2023-01-01 17:11:05', '', '', '', '', '2023-01-01', '90', 'WHATSAPP', 'N', 'N', 'N'),
(20, 'l', '1', '1', 'luz', 'k', 1, '2023-03-14 19:34:25', '', '', '', '', '2023-03-14', '252', 'WHATSAPP', 'N', 'N', 'N'),
(21, 'l', '2', '1', 'l', 'a', 1, '2023-03-14 19:35:04', '', '', '', '', '2023-03-14', '', 'WHATSAPP', 'N', 'N', 'N'),
(22, 'luz', 'w', 'a1', 'l', 'a', 1, '2023-03-15 18:58:33', '', '', '', '', '2023-03-15', '', 'WHATSAPP', 'N', 'N', 'N'),
(23, 'l', 'l', 'l', 'l', 'l', 1, '2023-03-15 18:58:41', '', '', '', '', '2023-03-15', '', 'WHATSAPP', 'N', 'N', 'N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobantes`
--

DROP TABLE IF EXISTS `comprobantes`;
CREATE TABLE IF NOT EXISTS `comprobantes` (
  `id_comp` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_comp` varchar(100) NOT NULL,
  `serie_comp` varchar(100) NOT NULL,
  `desde_comp` int(11) NOT NULL,
  `hasta_comp` int(11) NOT NULL,
  `long_comp` int(11) NOT NULL,
  `actual_comp` int(11) NOT NULL,
  `vencimiento_comp` date NOT NULL,
  `estado_comp` int(11) NOT NULL,
  PRIMARY KEY (`id_comp`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comprobantes`
--

INSERT INTO `comprobantes` (`id_comp`, `nombre_comp`, `serie_comp`, `desde_comp`, `hasta_comp`, `long_comp`, `actual_comp`, `vencimiento_comp`, `estado_comp`) VALUES
(3, 'FACTURA', '001-001', 1, 100, 6, 1, '2023-11-11', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditos`
--

DROP TABLE IF EXISTS `creditos`;
CREATE TABLE IF NOT EXISTS `creditos` (
  `id_credito` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` varchar(20) NOT NULL,
  `fecha_credito` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `monto_credito` double NOT NULL,
  `saldo_credito` double NOT NULL,
  `estado_credito` tinyint(1) NOT NULL,
  `id_users_credito` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  PRIMARY KEY (`id_credito`),
  UNIQUE KEY `numero_cotizacion` (`numero_factura`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `creditos`
--

INSERT INTO `creditos` (`id_credito`, `numero_factura`, `fecha_credito`, `id_cliente`, `id_vendedor`, `monto_credito`, `saldo_credito`, `estado_credito`, `id_users_credito`, `id_sucursal`) VALUES
(34, '001-001000001', '2022-12-02 17:07:19', 14, 1, 40000, 40000, 1, 1, 1),
(35, '001-001000005', '2023-03-19 13:44:05', 18, 1, 10000, 5000, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditos_abonos`
--

DROP TABLE IF EXISTS `creditos_abonos`;
CREATE TABLE IF NOT EXISTS `creditos_abonos` (
  `id_abono` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` varchar(20) NOT NULL,
  `fecha_abono` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `monto_abono` double NOT NULL,
  `abono` double NOT NULL,
  `saldo_abono` double NOT NULL,
  `id_users_abono` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `concepto_abono` varchar(255) NOT NULL,
  `id_credito` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_abono`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `creditos_abonos`
--

INSERT INTO `creditos_abonos` (`id_abono`, `numero_factura`, `fecha_abono`, `id_cliente`, `monto_abono`, `abono`, `saldo_abono`, `id_users_abono`, `id_sucursal`, `concepto_abono`, `id_credito`, `estado`) VALUES
(48, '001-001000001', '2022-12-02 17:07:19', 14, 40000, 0, 40000, 1, 1, 'CREDITO INICIAL', 34, 0),
(49, '001-001000005', '2023-03-19 13:44:05', 18, 10000, 0, 10000, 1, 1, 'CREDITO INICIAL', 35, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditos_abonos_prov`
--

DROP TABLE IF EXISTS `creditos_abonos_prov`;
CREATE TABLE IF NOT EXISTS `creditos_abonos_prov` (
  `id_abono` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` varchar(20) NOT NULL,
  `fecha_abono` datetime NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `monto_abono` double NOT NULL,
  `abono` double NOT NULL,
  `saldo_abono` double NOT NULL,
  `id_users_abono` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `concepto_abono` varchar(255) NOT NULL,
  PRIMARY KEY (`id_abono`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `creditos_abonos_prov`
--

INSERT INTO `creditos_abonos_prov` (`id_abono`, `numero_factura`, `fecha_abono`, `id_proveedor`, `monto_abono`, `abono`, `saldo_abono`, `id_users_abono`, `id_sucursal`, `concepto_abono`) VALUES
(6, 'FC-000002', '2022-12-02 17:02:17', 8, 105000, 0, 105000, 1, 1, 'CREDITO INICAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credito_proveedor`
--

DROP TABLE IF EXISTS `credito_proveedor`;
CREATE TABLE IF NOT EXISTS `credito_proveedor` (
  `id_credito` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` varchar(20) NOT NULL,
  `fecha_credito` datetime NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `monto_credito` double NOT NULL,
  `saldo_credito` double NOT NULL,
  `estado_credito` tinyint(1) NOT NULL,
  `id_users_credito` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  PRIMARY KEY (`id_credito`),
  UNIQUE KEY `numero_cotizacion` (`numero_factura`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `credito_proveedor`
--

INSERT INTO `credito_proveedor` (`id_credito`, `numero_factura`, `fecha_credito`, `id_proveedor`, `monto_credito`, `saldo_credito`, `estado_credito`, `id_users_credito`, `id_sucursal`) VALUES
(4, 'FC-000002', '2022-12-02 17:02:17', 8, 105000, 105000, 1, 1, 1);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `precision` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thousand_separator` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `decimal_separator` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`, `precision`, `thousand_separator`, `decimal_separator`, `code`) VALUES
(1, 'US Dollar', '$', '2', ',', '.', 'USD'),
(2, 'Libra Esterlina', '&pound;', '2', ',', '.', 'GBP'),
(3, 'Euro', 'â‚¬', '2', '.', ',', 'EUR'),
(4, 'South African Rand', 'R', '2', '.', ',', 'ZAR'),
(5, 'Guarani Paraguayo', 'Gs', '0', '.', ',', 'PYG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_fact_compra`
--

DROP TABLE IF EXISTS `detalle_fact_compra`;
CREATE TABLE IF NOT EXISTS `detalle_fact_compra` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_factura` int(11) NOT NULL,
  `numero_factura` varchar(50) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `precio_costo` double NOT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `numero_cotizacion` (`numero_factura`,`id_producto`),
  KEY `id_factura` (`id_factura`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_fact_compra`
--

INSERT INTO `detalle_fact_compra` (`id_detalle`, `id_factura`, `numero_factura`, `id_producto`, `cantidad`, `precio_costo`) VALUES
(21, 1, 'FC-000001', 35, 14, 5000),
(22, 16, 'FC-000002', 35, 21, 5000),
(23, 17, 'FC-000003', 35, 16, 5000),
(24, 18, 'FC-000004', 35, 30, 5000),
(25, 19, 'FC-000005', 35, 15, 5000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_fact_cot`
--

DROP TABLE IF EXISTS `detalle_fact_cot`;
CREATE TABLE IF NOT EXISTS `detalle_fact_cot` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_factura` int(11) NOT NULL,
  `numero_factura` varchar(25) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `desc_venta` int(11) NOT NULL,
  `precio_venta` double NOT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `numero_cotizacion` (`numero_factura`,`id_producto`),
  KEY `id_factura` (`id_factura`),
  KEY `numero_factura` (`numero_factura`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_fact_ventas`
--

DROP TABLE IF EXISTS `detalle_fact_ventas`;
CREATE TABLE IF NOT EXISTS `detalle_fact_ventas` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_factura` int(11) NOT NULL,
  `numero_factura` varchar(25) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `desc_venta` int(11) NOT NULL,
  `precio_venta` double NOT NULL,
  `importe_venta` double NOT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `numero_cotizacion` (`numero_factura`,`id_producto`),
  KEY `id_factura` (`id_factura`),
  KEY `numero_factura` (`numero_factura`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_fact_ventas`
--

INSERT INTO `detalle_fact_ventas` (`id_detalle`, `id_factura`, `numero_factura`, `id_producto`, `cantidad`, `desc_venta`, `precio_venta`, `importe_venta`) VALUES
(23, 1, '001-001000001', 36, 2, 0, 6750, 0),
(24, 1, '001-001000001', 35, 3, 0, 10000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_traslado`
--

DROP TABLE IF EXISTS `detalle_traslado`;
CREATE TABLE IF NOT EXISTS `detalle_traslado` (
  `id_detalle_traslado` int(11) NOT NULL AUTO_INCREMENT,
  `id_traslado` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` double NOT NULL,
  `num_transaccion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_detalle_traslado`),
  KEY `id_traslado` (`id_traslado`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos`
--

DROP TABLE IF EXISTS `egresos`;
CREATE TABLE IF NOT EXISTS `egresos` (
  `id_egreso` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `cuenta_contable` varchar(100) NOT NULL,
  `proveedor` int(11) NOT NULL DEFAULT '0',
  `concepto` varchar(150) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `nro_comprobante` varchar(50) NOT NULL DEFAULT '',
  `medio_pago` varchar(100) NOT NULL DEFAULT '',
  `importe` double NOT NULL DEFAULT '0',
  `fecha_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(11) NOT NULL DEFAULT '1',
  `users` int(11) NOT NULL,
  PRIMARY KEY (`id_egreso`),
  KEY `users` (`users`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `egresos`
--

INSERT INTO `egresos` (`id_egreso`, `fecha`, `cuenta_contable`, `proveedor`, `concepto`, `nro_comprobante`, `medio_pago`, `importe`, `fecha_added`, `estado`, `users`) VALUES
(13, '2022-12-07', 'Pago a Proveedores', 8, 'Tinta para impresora', '001-001-00000024', 'efectivo', 100000, '2022-12-07 17:48:02', 1, 0),
(14, '2022-12-10', 'compra de insumos', 10, 'Compra de resina', '852', 'efectivo', 85000, '2022-12-09 11:29:59', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_compras`
--

DROP TABLE IF EXISTS `facturas_compras`;
CREATE TABLE IF NOT EXISTS `facturas_compras` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` varchar(50) NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `condiciones` int(11) NOT NULL,
  `monto_factura` double NOT NULL,
  `estado_factura` tinyint(4) NOT NULL,
  `id_users_factura` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `ref_factura` varchar(50) NOT NULL,
  PRIMARY KEY (`id_factura`),
  UNIQUE KEY `numero_cotizacion` (`numero_factura`),
  KEY `id_sucursal` (`id_sucursal`),
  KEY `id_proveedor` (`id_proveedor`),
  KEY `id_vendedor` (`id_vendedor`),
  KEY `id_users_factura` (`id_users_factura`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facturas_compras`
--

INSERT INTO `facturas_compras` (`id_factura`, `numero_factura`, `fecha_factura`, `id_proveedor`, `id_vendedor`, `condiciones`, `monto_factura`, `estado_factura`, `id_users_factura`, `id_sucursal`, `ref_factura`) VALUES
(15, 'FC-000001', '2022-12-01 00:00:00', 8, 1, 1, 70000, 1, 1, 1, 'factura 001-001-00002525'),
(16, 'FC-000002', '2022-12-01 00:00:00', 8, 1, 4, 105000, 2, 1, 1, 'ASDASDASD'),
(17, 'FC-000003', '2023-03-19 00:00:00', 13, 1, 1, 80000, 1, 1, 1, ''),
(18, 'FC-000004', '2023-03-22 00:00:00', 8, 1, 1, 150000, 1, 1, 1, ''),
(19, 'FC-000005', '2023-03-29 00:00:00', 8, 1, 1, 75000, 1, 1, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_cot`
--

DROP TABLE IF EXISTS `facturas_cot`;
CREATE TABLE IF NOT EXISTS `facturas_cot` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` varchar(20) NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `condiciones` varchar(30) NOT NULL,
  `monto_factura` double NOT NULL,
  `estado_factura` tinyint(1) NOT NULL,
  `id_users_factura` int(11) NOT NULL,
  `validez` double NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  PRIMARY KEY (`id_factura`),
  UNIQUE KEY `numero_cotizacion` (`numero_factura`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_ventas`
--

DROP TABLE IF EXISTS `facturas_ventas`;
CREATE TABLE IF NOT EXISTS `facturas_ventas` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` varchar(20) NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `condiciones` varchar(30) NOT NULL,
  `monto_factura` double NOT NULL,
  `estado_factura` tinyint(1) NOT NULL,
  `id_users_factura` int(11) NOT NULL,
  `dinero_resibido_fac` double NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_comp_factura` int(11) NOT NULL,
  `num_trans_factura` varchar(50) DEFAULT NULL,
  `origen` varchar(30) NOT NULL,
  PRIMARY KEY (`id_factura`),
  UNIQUE KEY `numero_cotizacion` (`numero_factura`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facturas_ventas`
--

INSERT INTO `facturas_ventas` (`id_factura`, `numero_factura`, `fecha_factura`, `id_cliente`, `id_vendedor`, `condiciones`, `monto_factura`, `estado_factura`, `id_users_factura`, `dinero_resibido_fac`, `id_sucursal`, `id_comp_factura`, `num_trans_factura`, `origen`) VALUES
(1, '001-001000001', '2023-04-03 20:26:55', 13, 1, '1', 43500, 2, 1, 45000, 1, 3, '', 'productos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feria1`
--

DROP TABLE IF EXISTS `feria1`;
CREATE TABLE IF NOT EXISTS `feria1` (
  `id_feria` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `stock_producto` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_feria`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `feria1`
--

INSERT INTO `feria1` (`id_feria`, `id_producto`, `stock_producto`) VALUES
(1, 35, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feria2`
--

DROP TABLE IF EXISTS `feria2`;
CREATE TABLE IF NOT EXISTS `feria2` (
  `id_feria` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `stock_producto` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_feria`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `feria2`
--

INSERT INTO `feria2` (`id_feria`, `id_producto`, `stock_producto`) VALUES
(1, 35, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_productos`
--

DROP TABLE IF EXISTS `historial_productos`;
CREATE TABLE IF NOT EXISTS `historial_productos` (
  `id_historial` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `fecha_historial` datetime NOT NULL,
  `nota_historial` varchar(255) NOT NULL,
  `referencia_historial` varchar(100) NOT NULL,
  `cantidad_historial` double NOT NULL,
  `tipo_historial` int(11) NOT NULL,
  PRIMARY KEY (`id_historial`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

DROP TABLE IF EXISTS `ingresos`;
CREATE TABLE IF NOT EXISTS `ingresos` (
  `id_ingreso` int(11) NOT NULL AUTO_INCREMENT,
  `id_consulta` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `monto` double NOT NULL,
  `fecha_added` datetime NOT NULL,
  `users` int(11) NOT NULL,
  PRIMARY KEY (`id_ingreso`),
  KEY `id_consulta` (`id_consulta`),
  KEY `id_paciente` (`id_paciente`),
  KEY `users` (`users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex`
--

DROP TABLE IF EXISTS `kardex`;
CREATE TABLE IF NOT EXISTS `kardex` (
  `id_kardex` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_kardex` date NOT NULL,
  `cant_entrada` double NOT NULL,
  `producto_kardex` int(11) NOT NULL,
  `costo_entrada` double NOT NULL,
  `total_entrada` double NOT NULL,
  `cant_salida` double NOT NULL DEFAULT '0',
  `costo_salida` double NOT NULL DEFAULT '0',
  `total_salida` double NOT NULL DEFAULT '0',
  `cant_saldo` double NOT NULL,
  `costo_saldo` double NOT NULL,
  `total_saldo` double NOT NULL,
  `added_kardex` datetime NOT NULL,
  `users_kardex` int(11) NOT NULL,
  `tipo_movimiento` int(11) NOT NULL,
  PRIMARY KEY (`id_kardex`)
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `kardex`
--

INSERT INTO `kardex` (`id_kardex`, `fecha_kardex`, `cant_entrada`, `producto_kardex`, `costo_entrada`, `total_entrada`, `cant_salida`, `costo_salida`, `total_salida`, `cant_saldo`, `costo_saldo`, `total_saldo`, `added_kardex`, `users_kardex`, `tipo_movimiento`) VALUES
(200, '2022-12-02', 2, 35, 5000, 10000, 0, 0, 0, 2, 5000, 10000, '2022-12-02 17:00:46', 1, 5),
(201, '2022-12-01', 14, 35, 5000, 70000, 0, 0, 0, 16, 5000, 80000, '2022-12-01 00:00:00', 1, 1),
(202, '2022-12-01', 21, 35, 5000, 105000, 0, 0, 0, 37, 5000, 185000, '2022-12-01 00:00:00', 1, 1),
(203, '2022-12-02', 0, 35, 0, 0, 4, 5000, 20000, 33, 5000, 165000, '2022-12-02 17:07:19', 1, 2),
(204, '2023-03-19', 16, 35, 5000, 80000, 0, 0, 0, 49, 5000, 245000, '2023-03-19 00:00:00', 1, 1),
(205, '2023-03-22', 30, 35, 5000, 150000, 0, 0, 0, 79, 5000, 395000, '2023-03-22 00:00:00', 1, 1),
(206, '2023-03-29', 15, 35, 5000, 75000, 0, 0, 0, 94, 5000, 470000, '2023-03-29 00:00:00', 1, 1),
(207, '2023-04-03', 30, 36, 5000, 150000, 0, 0, 0, 30, 5000, 150000, '2023-04-03 19:20:35', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas`
--

DROP TABLE IF EXISTS `lineas`;
CREATE TABLE IF NOT EXISTS `lineas` (
  `id_linea` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_linea` varchar(255) NOT NULL,
  `descripcion_linea` text NOT NULL,
  `estado_linea` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id_linea`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lineas`
--

INSERT INTO `lineas` (`id_linea`, `nombre_linea`, `descripcion_linea`, `estado_linea`, `date_added`) VALUES
(4, 'COLLARES', '', 1, '2022-12-02 15:11:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

DROP TABLE IF EXISTS `modulos`;
CREATE TABLE IF NOT EXISTS `modulos` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_modulo` varchar(30) NOT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id_modulo`, `nombre_modulo`) VALUES
(1, 'Inicio'),
(2, 'Productos'),
(3, 'Proveedores'),
(4, 'Clientes'),
(5, 'Reportes'),
(6, 'Configuracion'),
(7, 'Usuarios'),
(8, 'Permisos'),
(9, 'Categorias'),
(10, 'Ventas'),
(11, 'Compras'),
(13, 'Gastos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paginaweb`
--

DROP TABLE IF EXISTS `paginaweb`;
CREATE TABLE IF NOT EXISTS `paginaweb` (
  `id_feria` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `stock_producto` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_feria`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paginaweb`
--

INSERT INTO `paginaweb` (`id_feria`, `id_producto`, `stock_producto`) VALUES
(1, 35, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(150) CHARACTER SET latin1 NOT NULL,
  `giro_empresa` text NOT NULL,
  `fiscal_empresa` varchar(25) NOT NULL,
  `direccion` varchar(255) CHARACTER SET latin1 NOT NULL,
  `ciudad` varchar(100) CHARACTER SET latin1 NOT NULL,
  `codigo_postal` varchar(100) CHARACTER SET latin1 NOT NULL,
  `estado` varchar(100) CHARACTER SET latin1 NOT NULL,
  `telefono` varchar(20) CHARACTER SET latin1 NOT NULL,
  `email` varchar(64) CHARACTER SET latin1 NOT NULL,
  `impuesto` int(11) NOT NULL,
  `nom_impuesto` varchar(50) NOT NULL,
  `moneda` varchar(6) CHARACTER SET latin1 NOT NULL,
  `logo_url` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nombre_empresa`, `giro_empresa`, `fiscal_empresa`, `direccion`, `ciudad`, `codigo_postal`, `estado`, `telefono`, `email`, `impuesto`, `nom_impuesto`, `moneda`, `logo_url`) VALUES
(1, 'ECLECTICA', 'SISTEMA DE VENTAS', '00000000-0', 'Calle Paseo de los Mitos', 'Yaguaron', '7000', 'Paraguarí', '0973 118 404', 'info@softys.com', 10, 'IVA', 'Gs', '../../img/1655304455_Logo-oroty.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_producto` varchar(255) CHARACTER SET latin1 NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `descripcion_producto` text NOT NULL,
  `id_linea_producto` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `inv_producto` tinyint(4) DEFAULT NULL,
  `iva_producto` tinyint(4) DEFAULT NULL,
  `estado_producto` tinyint(4) DEFAULT NULL,
  `costo_producto` double DEFAULT NULL,
  `utilidad_producto` double DEFAULT NULL,
  `moneda_producto` int(11) DEFAULT NULL,
  `valor1_producto` double DEFAULT NULL,
  `valor2_producto` double DEFAULT NULL,
  `valor3_producto` double DEFAULT NULL,
  `stock_producto` double DEFAULT NULL,
  `stock_min_producto` double DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `image_path` varchar(300) DEFAULT NULL,
  `id_imp_producto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_cat_producto` (`id_linea_producto`),
  KEY `id_proveedor` (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `codigo_producto`, `nombre_producto`, `descripcion_producto`, `id_linea_producto`, `id_proveedor`, `inv_producto`, `iva_producto`, `estado_producto`, `costo_producto`, `utilidad_producto`, `moneda_producto`, `valor1_producto`, `valor2_producto`, `valor3_producto`, `stock_producto`, `stock_min_producto`, `date_added`, `image_path`, `id_imp_producto`) VALUES
(35, '10000', 'COLLAR DE RESINA', 'COLLAR DE RESINA', 4, 8, 0, 10, 1, 5000, 100, NULL, 10000, 9000, 8000, 23, 1, '2022-12-02 17:00:46', NULL, 0),
(36, '5000', 'OTRO PRODUCTO', 'PARA TEST DE ANULACION', 4, 8, 0, 10, 1, 5000, 35, NULL, 6750, 6000, 6100, 32, 5, '2023-04-03 19:20:35', NULL, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre_proveedor`, `fiscal_proveedor`, `web_proveedor`, `direccion_proveedor`, `contacto_proveedor`, `email_proveedor`, `telefono_proveedor`, `date_added`, `estado_proveedor`, `facebook`, `instagram`, `twitter`, `tiktok`, `rubro`, `especialidad`) VALUES
(8, 'TEST2', '154161', 'ad@gmail.com', 'KM 12', 'LUZ', 'luz@gmail.com', '09145', '2022-12-01 09:22:56', 1, 'luz yanina', 'luzmi', 'yanina', '', 'Cuero', 'Ropas'),
(10, 'JUAN', '231211', 'jan ', 'KM 9', 'JUAN', '', '0985412365', '2022-12-09 06:03:03', 1, 'Test FB', 'Test IG', 'Test TW', 'Test TK', 'Hilo Encerado', 'Pulseras'),
(12, 'YANINA', '7864516', 'yani', 'KM 9', 'LUZ', '', '1861', '2022-12-11 19:04:28', 1, '', '', '', '', 'Hilo Encerado', 'pulseras'),
(13, 'Test', '192134', 'nsd', 'sad', 'f', 'h@hotmail.com', '3', '2023-03-19 13:45:23', 1, '3', '3', '3', '3', 'Hilo Encerado', 't');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id_stock` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto_stock` int(11) NOT NULL,
  `id_sucursal_stock` int(11) NOT NULL,
  `cantidad_stock` double NOT NULL,
  PRIMARY KEY (`id_stock`),
  KEY `id_producto_stock` (`id_producto_stock`),
  KEY `id_sucursal_stock` (`id_sucursal_stock`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

DROP TABLE IF EXISTS `sucursales`;
CREATE TABLE IF NOT EXISTS `sucursales` (
  `id_sucursal` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_sucursal` varchar(50) NOT NULL,
  `nombre_sucursal` varchar(255) NOT NULL,
  `direccion_sucursal` text NOT NULL,
  `limite_sucursal` double NOT NULL,
  `estado_sucursal` tinyint(4) NOT NULL,
  `fecha_added` datetime NOT NULL,
  PRIMARY KEY (`id_sucursal`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id_sucursal`, `codigo_sucursal`, `nombre_sucursal`, `direccion_sucursal`, `limite_sucursal`, `estado_sucursal`, `fecha_added`) VALUES
(1, 'SC001', 'CASA MATRIZ', 'AV. SAN BLAS', 40, 1, '2018-01-05 11:09:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp_compra`
--

DROP TABLE IF EXISTS `tmp_compra`;
CREATE TABLE IF NOT EXISTS `tmp_compra` (
  `id_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cantidad_tmp` double NOT NULL,
  `costo_tmp` double(8,2) DEFAULT NULL,
  `session_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tmp`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tmp_compra`
--

INSERT INTO `tmp_compra` (`id_tmp`, `id_producto`, `cantidad_tmp`, `costo_tmp`, `session_id`) VALUES
(39, 35, 2, 10000.00, 'tf4d5p0d0dbqvdsaolgc1rdq2n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp_cotizacion`
--

DROP TABLE IF EXISTS `tmp_cotizacion`;
CREATE TABLE IF NOT EXISTS `tmp_cotizacion` (
  `id_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cantidad_tmp` double NOT NULL,
  `precio_tmp` double DEFAULT NULL,
  `desc_tmp` int(11) NOT NULL,
  `session_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tmp`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tmp_cotizacion`
--

INSERT INTO `tmp_cotizacion` (`id_tmp`, `id_producto`, `cantidad_tmp`, `precio_tmp`, `desc_tmp`, `session_id`) VALUES
(37, 35, 4, 8000, 50, 'tf4d5p0d0dbqvdsaolgc1rdq2n'),
(38, 35, 6, 10000, 0, 'rvlibi9q71qqli8jt5s34qshm6'),
(39, 35, 1, 8000, 0, 'opt0o6nusffme81f54d6pls4f3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp_transferencia`
--

DROP TABLE IF EXISTS `tmp_transferencia`;
CREATE TABLE IF NOT EXISTS `tmp_transferencia` (
  `id_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cantidad_tmp` double NOT NULL,
  `session_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tmp`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp_ventas`
--

DROP TABLE IF EXISTS `tmp_ventas`;
CREATE TABLE IF NOT EXISTS `tmp_ventas` (
  `id_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cantidad_tmp` double NOT NULL,
  `precio_tmp` double DEFAULT NULL,
  `desc_tmp` int(11) NOT NULL,
  `session_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tmp`)
) ENGINE=MyISAM AUTO_INCREMENT=322 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transferencia`
--

DROP TABLE IF EXISTS `transferencia`;
CREATE TABLE IF NOT EXISTS `transferencia` (
  `id_transferencia` int(11) NOT NULL AUTO_INCREMENT,
  `origen` varchar(80) CHARACTER SET utf8 NOT NULL,
  `destino` varchar(80) CHARACTER SET utf8 NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `comentario` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_transferencia`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `nombre_users` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_users` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_users` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `con_users` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `email_users` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `tipo_users` tinyint(4) NOT NULL,
  `cargo_users` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `sucursal_users` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL,
  `comision_users` double NOT NULL,
  PRIMARY KEY (`id_users`),
  UNIQUE KEY `user_name` (`usuario_users`),
  UNIQUE KEY `user_email` (`email_users`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_users`, `nombre_users`, `apellido_users`, `usuario_users`, `con_users`, `email_users`, `tipo_users`, `cargo_users`, `sucursal_users`, `date_added`, `comision_users`) VALUES
(1, 'SUPER', 'ADMINISTRADOR', 'admin', '$2y$10$MPVHzZ2ZPOWmtUUGCq3RXu31OTB.jo7M9LZ7PmPQYmgETSNn19ejO', 'root@admin.com', 0, '1', 1, '2016-05-21 15:06:00', 0),
(4, 'AA', 'AA', 'aaaa', '$2y$10$21TbTeuPTyJeKII2fcwOEuNWLsShysR3R.2JYLlPMoJjKqUyFC8cS', 'aaaa@aaaa.com', 0, '1', 2, '2022-08-03 08:27:30', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_group`
--

DROP TABLE IF EXISTS `user_group`;
CREATE TABLE IF NOT EXISTS `user_group` (
  `user_group_id` int(11) NOT NULL,
  `name` varchar(64) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `permission` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`user_group_id`),
  KEY `user_group_id` (`user_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_group`
--

INSERT INTO `user_group` (`user_group_id`, `name`, `permission`, `date_added`) VALUES
(1, 'Super Administrador', 'Inicio,1,1,1;Productos,1,1,1;Proveedores,1,1,1;Clientes,1,1,1;Reportes,1,1,1;Configuracion,1,1,1;Usuarios,1,1,1;Permisos,1,1,1;Categorias,1,1,1;Ventas,1,1,1;Compras,1,1,1;Gastos,1,1,1;', '2017-08-09 10:22:15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
