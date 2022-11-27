-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.21 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para sist_eclectica
CREATE DATABASE IF NOT EXISTS `sist_eclectica` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sist_eclectica`;

-- Volcando estructura para tabla sist_eclectica.caja_chica
CREATE TABLE IF NOT EXISTS `caja_chica` (
  `id_caja` int NOT NULL AUTO_INCREMENT,
  `referencia_caja` varchar(255) NOT NULL,
  `monto_caja` double NOT NULL,
  `descripcion_caja` varchar(255) NOT NULL,
  `tipo_caja` tinyint NOT NULL,
  `users_caja` int NOT NULL,
  `date_added_caja` datetime NOT NULL,
  PRIMARY KEY (`id_caja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.caja_chica: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sist_eclectica.cargo
CREATE TABLE IF NOT EXISTS `cargo` (
  `id_cargo` int NOT NULL AUTO_INCREMENT,
  `nombre_cargo` varchar(255) NOT NULL,
  `estado_cargo` varchar(11) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.cargo: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sist_eclectica.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(255) NOT NULL,
  `fiscal_cliente` varchar(255) NOT NULL,
  `telefono_cliente` char(30) NOT NULL,
  `email_cliente` varchar(64) NOT NULL,
  `direccion_cliente` varchar(255) NOT NULL,
  `status_cliente` tinyint NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.clientes: 0 rows
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla sist_eclectica.comprobantes
CREATE TABLE IF NOT EXISTS `comprobantes` (
  `id_comp` int NOT NULL AUTO_INCREMENT,
  `nombre_comp` varchar(100) NOT NULL,
  `serie_comp` varchar(100) NOT NULL,
  `desde_comp` int NOT NULL,
  `hasta_comp` int NOT NULL,
  `long_comp` int NOT NULL,
  `actual_comp` int NOT NULL,
  `vencimiento_comp` date NOT NULL,
  `estado_comp` int NOT NULL,
  PRIMARY KEY (`id_comp`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.comprobantes: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sist_eclectica.creditos
CREATE TABLE IF NOT EXISTS `creditos` (
  `id_credito` int NOT NULL AUTO_INCREMENT,
  `numero_factura` varchar(20) NOT NULL,
  `fecha_credito` datetime NOT NULL,
  `id_cliente` int NOT NULL,
  `id_vendedor` int NOT NULL,
  `monto_credito` double NOT NULL,
  `saldo_credito` double NOT NULL,
  `estado_credito` tinyint(1) NOT NULL,
  `id_users_credito` int NOT NULL,
  `id_sucursal` int NOT NULL,
  PRIMARY KEY (`id_credito`),
  UNIQUE KEY `numero_cotizacion` (`numero_factura`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.creditos: 0 rows
/*!40000 ALTER TABLE `creditos` DISABLE KEYS */;
/*!40000 ALTER TABLE `creditos` ENABLE KEYS */;

-- Volcando estructura para tabla sist_eclectica.creditos_abonos
CREATE TABLE IF NOT EXISTS `creditos_abonos` (
  `id_abono` int NOT NULL AUTO_INCREMENT,
  `numero_factura` varchar(20) NOT NULL,
  `fecha_abono` datetime NOT NULL,
  `id_cliente` int NOT NULL,
  `monto_abono` double NOT NULL,
  `abono` double NOT NULL,
  `saldo_abono` double NOT NULL,
  `id_users_abono` int NOT NULL,
  `id_sucursal` int NOT NULL,
  `concepto_abono` varchar(255) NOT NULL,
  `id_credito` int NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_abono`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.creditos_abonos: 0 rows
/*!40000 ALTER TABLE `creditos_abonos` DISABLE KEYS */;
/*!40000 ALTER TABLE `creditos_abonos` ENABLE KEYS */;

-- Volcando estructura para tabla sist_eclectica.creditos_abonos_prov
CREATE TABLE IF NOT EXISTS `creditos_abonos_prov` (
  `id_abono` int NOT NULL AUTO_INCREMENT,
  `numero_factura` varchar(20) NOT NULL,
  `fecha_abono` datetime NOT NULL,
  `id_proveedor` int NOT NULL,
  `monto_abono` double NOT NULL,
  `abono` double NOT NULL,
  `saldo_abono` double NOT NULL,
  `id_users_abono` int NOT NULL,
  `id_sucursal` int NOT NULL,
  `concepto_abono` varchar(255) NOT NULL,
  PRIMARY KEY (`id_abono`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.creditos_abonos_prov: 0 rows
/*!40000 ALTER TABLE `creditos_abonos_prov` DISABLE KEYS */;
/*!40000 ALTER TABLE `creditos_abonos_prov` ENABLE KEYS */;

-- Volcando estructura para tabla sist_eclectica.credito_proveedor
CREATE TABLE IF NOT EXISTS `credito_proveedor` (
  `id_credito` int NOT NULL AUTO_INCREMENT,
  `numero_factura` varchar(20) NOT NULL,
  `fecha_credito` datetime NOT NULL,
  `id_proveedor` int NOT NULL,
  `monto_credito` double NOT NULL,
  `saldo_credito` double NOT NULL,
  `estado_credito` tinyint(1) NOT NULL,
  `id_users_credito` int NOT NULL,
  `id_sucursal` int NOT NULL,
  PRIMARY KEY (`id_credito`),
  UNIQUE KEY `numero_cotizacion` (`numero_factura`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.credito_proveedor: 0 rows
/*!40000 ALTER TABLE `credito_proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `credito_proveedor` ENABLE KEYS */;

-- Volcando estructura para tabla sist_eclectica.currencies
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `precision` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thousand_separator` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `decimal_separator` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.currencies: ~5 rows (aproximadamente)
INSERT INTO `currencies` (`id`, `name`, `symbol`, `precision`, `thousand_separator`, `decimal_separator`, `code`) VALUES
	(1, 'US Dollar', '$', '2', ',', '.', 'USD'),
	(2, 'Libra Esterlina', '&pound;', '2', ',', '.', 'GBP'),
	(3, 'Euro', 'â‚¬', '2', '.', ',', 'EUR'),
	(4, 'South African Rand', 'R', '2', '.', ',', 'ZAR'),
	(5, 'Guarani Paraguayo', 'Gs', '0', '.', ',', 'PYG');

-- Volcando estructura para tabla sist_eclectica.detalle_fact_compra
CREATE TABLE IF NOT EXISTS `detalle_fact_compra` (
  `id_detalle` int NOT NULL AUTO_INCREMENT,
  `id_factura` int NOT NULL,
  `numero_factura` varchar(50) NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad` double NOT NULL,
  `precio_costo` double NOT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `numero_cotizacion` (`numero_factura`,`id_producto`),
  KEY `id_factura` (`id_factura`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.detalle_fact_compra: 0 rows
/*!40000 ALTER TABLE `detalle_fact_compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_fact_compra` ENABLE KEYS */;

-- Volcando estructura para tabla sist_eclectica.detalle_fact_cot
CREATE TABLE IF NOT EXISTS `detalle_fact_cot` (
  `id_detalle` int NOT NULL AUTO_INCREMENT,
  `id_factura` int NOT NULL,
  `numero_factura` varchar(25) NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad` int NOT NULL,
  `desc_venta` int NOT NULL,
  `precio_venta` double NOT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `numero_cotizacion` (`numero_factura`,`id_producto`),
  KEY `id_factura` (`id_factura`),
  KEY `numero_factura` (`numero_factura`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.detalle_fact_cot: 0 rows
/*!40000 ALTER TABLE `detalle_fact_cot` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_fact_cot` ENABLE KEYS */;

-- Volcando estructura para tabla sist_eclectica.detalle_fact_ventas
CREATE TABLE IF NOT EXISTS `detalle_fact_ventas` (
  `id_detalle` int NOT NULL AUTO_INCREMENT,
  `id_factura` int NOT NULL,
  `numero_factura` varchar(25) NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad` int NOT NULL,
  `desc_venta` int NOT NULL,
  `precio_venta` double NOT NULL,
  `importe_venta` double NOT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `numero_cotizacion` (`numero_factura`,`id_producto`),
  KEY `id_factura` (`id_factura`),
  KEY `numero_factura` (`numero_factura`)
) ENGINE=MyISAM AUTO_INCREMENT=151 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.detalle_fact_ventas: 0 rows
/*!40000 ALTER TABLE `detalle_fact_ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_fact_ventas` ENABLE KEYS */;

-- Volcando estructura para tabla sist_eclectica.detalle_traslado
CREATE TABLE IF NOT EXISTS `detalle_traslado` (
  `id_detalle_traslado` int NOT NULL AUTO_INCREMENT,
  `id_traslado` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad` int NOT NULL,
  `precio_venta` double NOT NULL,
  `num_transaccion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_detalle_traslado`),
  KEY `id_traslado` (`id_traslado`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.detalle_traslado: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sist_eclectica.egresos
CREATE TABLE IF NOT EXISTS `egresos` (
  `id_egreso` int NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `cuenta_contable` int NOT NULL,
  `proveedor` int NOT NULL DEFAULT '0',
  `concepto` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `nro_comprobante` varchar(50) NOT NULL DEFAULT '',
  `medio_pago` varchar(100) NOT NULL DEFAULT '',
  `importe` double NOT NULL DEFAULT '0',
  `fecha_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int NOT NULL DEFAULT '1',
  `users` int NOT NULL,
  PRIMARY KEY (`id_egreso`),
  KEY `users` (`users`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.egresos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sist_eclectica.facturas_compras
CREATE TABLE IF NOT EXISTS `facturas_compras` (
  `id_factura` int NOT NULL AUTO_INCREMENT,
  `numero_factura` varchar(50) NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `id_proveedor` int NOT NULL,
  `id_vendedor` int NOT NULL,
  `condiciones` int NOT NULL,
  `monto_factura` double NOT NULL,
  `estado_factura` tinyint NOT NULL,
  `id_users_factura` int NOT NULL,
  `id_sucursal` int NOT NULL,
  `ref_factura` varchar(50) NOT NULL,
  PRIMARY KEY (`id_factura`),
  UNIQUE KEY `numero_cotizacion` (`numero_factura`),
  KEY `id_sucursal` (`id_sucursal`),
  KEY `id_proveedor` (`id_proveedor`),
  KEY `id_vendedor` (`id_vendedor`),
  KEY `id_users_factura` (`id_users_factura`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.facturas_compras: 0 rows
/*!40000 ALTER TABLE `facturas_compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `facturas_compras` ENABLE KEYS */;

-- Volcando estructura para tabla sist_eclectica.facturas_cot
CREATE TABLE IF NOT EXISTS `facturas_cot` (
  `id_factura` int NOT NULL AUTO_INCREMENT,
  `numero_factura` varchar(20) NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `id_cliente` int NOT NULL,
  `id_vendedor` int NOT NULL,
  `condiciones` varchar(30) NOT NULL,
  `monto_factura` double NOT NULL,
  `estado_factura` tinyint(1) NOT NULL,
  `id_users_factura` int NOT NULL,
  `validez` double NOT NULL,
  `id_sucursal` int NOT NULL,
  PRIMARY KEY (`id_factura`),
  UNIQUE KEY `numero_cotizacion` (`numero_factura`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.facturas_cot: 0 rows
/*!40000 ALTER TABLE `facturas_cot` DISABLE KEYS */;
/*!40000 ALTER TABLE `facturas_cot` ENABLE KEYS */;

-- Volcando estructura para tabla sist_eclectica.facturas_ventas
CREATE TABLE IF NOT EXISTS `facturas_ventas` (
  `id_factura` int NOT NULL AUTO_INCREMENT,
  `numero_factura` varchar(20) NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `id_cliente` int NOT NULL,
  `id_vendedor` int NOT NULL,
  `condiciones` varchar(30) NOT NULL,
  `monto_factura` double NOT NULL,
  `estado_factura` tinyint(1) NOT NULL,
  `id_users_factura` int NOT NULL,
  `dinero_resibido_fac` double NOT NULL,
  `id_sucursal` int NOT NULL,
  `id_comp_factura` int NOT NULL,
  `num_trans_factura` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_factura`),
  UNIQUE KEY `numero_cotizacion` (`numero_factura`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.facturas_ventas: 0 rows
/*!40000 ALTER TABLE `facturas_ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `facturas_ventas` ENABLE KEYS */;

-- Volcando estructura para tabla sist_eclectica.historial_productos
CREATE TABLE IF NOT EXISTS `historial_productos` (
  `id_historial` int NOT NULL AUTO_INCREMENT,
  `id_producto` int NOT NULL,
  `id_users` int NOT NULL,
  `fecha_historial` datetime NOT NULL,
  `nota_historial` varchar(255) NOT NULL,
  `referencia_historial` varchar(100) NOT NULL,
  `cantidad_historial` double NOT NULL,
  `tipo_historial` int NOT NULL,
  PRIMARY KEY (`id_historial`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sist_eclectica.historial_productos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sist_eclectica.ingresos
CREATE TABLE IF NOT EXISTS `ingresos` (
  `id_ingreso` int NOT NULL AUTO_INCREMENT,
  `id_consulta` int NOT NULL,
  `id_paciente` int NOT NULL,
  `monto` double NOT NULL,
  `fecha_added` datetime NOT NULL,
  `users` int NOT NULL,
  PRIMARY KEY (`id_ingreso`),
  KEY `id_consulta` (`id_consulta`),
  KEY `id_paciente` (`id_paciente`),
  KEY `users` (`users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.ingresos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sist_eclectica.kardex
CREATE TABLE IF NOT EXISTS `kardex` (
  `id_kardex` int NOT NULL AUTO_INCREMENT,
  `fecha_kardex` date NOT NULL,
  `cant_entrada` double NOT NULL,
  `producto_kardex` int NOT NULL,
  `costo_entrada` double NOT NULL,
  `total_entrada` double NOT NULL,
  `cant_salida` double NOT NULL DEFAULT '0',
  `costo_salida` double NOT NULL DEFAULT '0',
  `total_salida` double NOT NULL DEFAULT '0',
  `cant_saldo` double NOT NULL,
  `costo_saldo` double NOT NULL,
  `total_saldo` double NOT NULL,
  `added_kardex` datetime NOT NULL,
  `users_kardex` int NOT NULL,
  `tipo_movimiento` int NOT NULL,
  PRIMARY KEY (`id_kardex`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.kardex: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sist_eclectica.lineas
CREATE TABLE IF NOT EXISTS `lineas` (
  `id_linea` int NOT NULL AUTO_INCREMENT,
  `nombre_linea` varchar(255) NOT NULL,
  `descripcion_linea` text NOT NULL,
  `estado_linea` int NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id_linea`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.lineas: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sist_eclectica.modulos
CREATE TABLE IF NOT EXISTS `modulos` (
  `id_modulo` int NOT NULL AUTO_INCREMENT,
  `nombre_modulo` varchar(30) NOT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.modulos: ~12 rows (aproximadamente)
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

-- Volcando estructura para tabla sist_eclectica.perfil
CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `giro_empresa` text NOT NULL,
  `fiscal_empresa` varchar(25) NOT NULL,
  `direccion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ciudad` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `codigo_postal` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telefono` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `impuesto` int NOT NULL,
  `nom_impuesto` varchar(50) NOT NULL,
  `moneda` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `logo_url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.perfil: ~0 rows (aproximadamente)
INSERT INTO `perfil` (`id_perfil`, `nombre_empresa`, `giro_empresa`, `fiscal_empresa`, `direccion`, `ciudad`, `codigo_postal`, `estado`, `telefono`, `email`, `impuesto`, `nom_impuesto`, `moneda`, `logo_url`) VALUES
	(1, 'ECLECTICA', 'SISTEMA DE VENTAS', '00000000-0', 'Calle Paseo de los Mitos', 'Yaguaron', '7000', 'Paraguarí', '0973 118 404', 'info@softys.com', 10, 'IVA', 'Gs', '../../img/1655304455_Logo-oroty.png');

-- Volcando estructura para tabla sist_eclectica.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `codigo_producto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `descripcion_producto` text NOT NULL,
  `id_linea_producto` int NOT NULL,
  `id_proveedor` int NOT NULL,
  `inv_producto` tinyint DEFAULT NULL,
  `iva_producto` tinyint DEFAULT NULL,
  `estado_producto` tinyint DEFAULT NULL,
  `costo_producto` double DEFAULT NULL,
  `utilidad_producto` double DEFAULT NULL,
  `moneda_producto` int DEFAULT NULL,
  `valor1_producto` double DEFAULT NULL,
  `valor2_producto` double DEFAULT NULL,
  `valor3_producto` double DEFAULT NULL,
  `stock_producto` double DEFAULT NULL,
  `stock_min_producto` double DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `image_path` varchar(300) DEFAULT NULL,
  `id_imp_producto` int DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_cat_producto` (`id_linea_producto`),
  KEY `id_proveedor` (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla sist_eclectica.productos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sist_eclectica.proveedores
CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` int NOT NULL AUTO_INCREMENT,
  `nombre_proveedor` varchar(255) NOT NULL,
  `fiscal_proveedor` varchar(100) NOT NULL,
  `web_proveedor` varchar(255) NOT NULL,
  `direccion_proveedor` text NOT NULL,
  `contacto_proveedor` varchar(255) NOT NULL,
  `email_proveedor` varchar(255) NOT NULL,
  `telefono_proveedor` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL,
  `estado_proveedor` tinyint NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.proveedores: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sist_eclectica.stock
CREATE TABLE IF NOT EXISTS `stock` (
  `id_stock` int NOT NULL AUTO_INCREMENT,
  `id_producto_stock` int NOT NULL,
  `id_sucursal_stock` int NOT NULL,
  `cantidad_stock` double NOT NULL,
  PRIMARY KEY (`id_stock`),
  KEY `id_producto_stock` (`id_producto_stock`),
  KEY `id_sucursal_stock` (`id_sucursal_stock`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.stock: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sist_eclectica.sucursales
CREATE TABLE IF NOT EXISTS `sucursales` (
  `id_sucursal` int NOT NULL AUTO_INCREMENT,
  `codigo_sucursal` varchar(50) NOT NULL,
  `nombre_sucursal` varchar(255) NOT NULL,
  `direccion_sucursal` text NOT NULL,
  `limite_sucursal` double NOT NULL,
  `estado_sucursal` tinyint NOT NULL,
  `fecha_added` datetime NOT NULL,
  PRIMARY KEY (`id_sucursal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.sucursales: ~0 rows (aproximadamente)
INSERT INTO `sucursales` (`id_sucursal`, `codigo_sucursal`, `nombre_sucursal`, `direccion_sucursal`, `limite_sucursal`, `estado_sucursal`, `fecha_added`) VALUES
	(1, 'SC001', 'CASA MATRIZ', 'AV. SAN BLAS', 40, 1, '2018-01-05 11:09:49');

-- Volcando estructura para tabla sist_eclectica.tmp_compra
CREATE TABLE IF NOT EXISTS `tmp_compra` (
  `id_tmp` int NOT NULL AUTO_INCREMENT,
  `id_producto` int NOT NULL,
  `cantidad_tmp` double NOT NULL,
  `costo_tmp` double(8,2) DEFAULT NULL,
  `session_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tmp`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla sist_eclectica.tmp_compra: 0 rows
/*!40000 ALTER TABLE `tmp_compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmp_compra` ENABLE KEYS */;

-- Volcando estructura para tabla sist_eclectica.tmp_cotizacion
CREATE TABLE IF NOT EXISTS `tmp_cotizacion` (
  `id_tmp` int NOT NULL AUTO_INCREMENT,
  `id_producto` int NOT NULL,
  `cantidad_tmp` double NOT NULL,
  `precio_tmp` double DEFAULT NULL,
  `desc_tmp` int NOT NULL,
  `session_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tmp`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla sist_eclectica.tmp_cotizacion: 0 rows
/*!40000 ALTER TABLE `tmp_cotizacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmp_cotizacion` ENABLE KEYS */;

-- Volcando estructura para tabla sist_eclectica.tmp_ventas
CREATE TABLE IF NOT EXISTS `tmp_ventas` (
  `id_tmp` int NOT NULL AUTO_INCREMENT,
  `id_producto` int NOT NULL,
  `cantidad_tmp` double NOT NULL,
  `precio_tmp` double DEFAULT NULL,
  `desc_tmp` int NOT NULL,
  `session_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tmp`)
) ENGINE=MyISAM AUTO_INCREMENT=180 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla sist_eclectica.tmp_ventas: 0 rows
/*!40000 ALTER TABLE `tmp_ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmp_ventas` ENABLE KEYS */;

-- Volcando estructura para tabla sist_eclectica.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `nombre_users` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apellido_users` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `usuario_users` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `con_users` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `email_users` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `tipo_users` tinyint NOT NULL,
  `cargo_users` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sucursal_users` tinyint NOT NULL,
  `date_added` datetime NOT NULL,
  `comision_users` double NOT NULL,
  PRIMARY KEY (`id_users`),
  UNIQUE KEY `user_name` (`usuario_users`),
  UNIQUE KEY `user_email` (`email_users`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

-- Volcando datos para la tabla sist_eclectica.users: ~2 rows (aproximadamente)
INSERT INTO `users` (`id_users`, `nombre_users`, `apellido_users`, `usuario_users`, `con_users`, `email_users`, `tipo_users`, `cargo_users`, `sucursal_users`, `date_added`, `comision_users`) VALUES
	(1, 'SUPER', 'ADMINISTRADOR', 'admin', '$2y$10$MPVHzZ2ZPOWmtUUGCq3RXu31OTB.jo7M9LZ7PmPQYmgETSNn19ejO', 'root@admin.com', 0, '1', 1, '2016-05-21 15:06:00', 0),
	(4, 'AA', 'AA', 'aaaa', '$2y$10$21TbTeuPTyJeKII2fcwOEuNWLsShysR3R.2JYLlPMoJjKqUyFC8cS', 'aaaa@aaaa.com', 0, '1', 2, '2022-08-03 08:27:30', 0);

-- Volcando estructura para tabla sist_eclectica.user_group
CREATE TABLE IF NOT EXISTS `user_group` (
  `user_group_id` int NOT NULL,
  `name` varchar(64) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `permission` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`user_group_id`),
  KEY `user_group_id` (`user_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sist_eclectica.user_group: ~0 rows (aproximadamente)
INSERT INTO `user_group` (`user_group_id`, `name`, `permission`, `date_added`) VALUES
	(1, 'Super Administrador', 'Inicio,1,1,1;Productos,1,1,1;Proveedores,1,1,1;Clientes,1,1,1;Reportes,1,1,1;Configuracion,1,1,1;Usuarios,1,1,1;Permisos,1,1,1;Categorias,1,1,1;Ventas,1,1,1;Compras,1,1,1;Gastos,1,1,1;', '2017-08-09 10:22:15');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
