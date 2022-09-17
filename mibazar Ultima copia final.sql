-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 17, 2022 at 10:14 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mibazar`
--

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `id_compra` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `precio` decimal(17,2) NOT NULL,
  `cantidad` decimal(17,2) NOT NULL,
  `total` decimal(17,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_compra`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `compras`
--

INSERT INTO `compras` (`id_compra`, `id_producto`, `precio`, `cantidad`, `total`, `fecha`, `estado`) VALUES
(1, 3, '0.50', '10.00', '5.00', '2022-09-10 15:49:10', 1),
(2, 5, '2.50', '15.00', '37.50', '2022-09-10 15:49:10', 1),
(3, 3, '2.00', '50.00', '100.00', '2022-09-09 16:57:06', 1),
(4, 6, '5.00', '25.00', '125.00', '2022-09-17 14:32:23', 1),
(5, 1, '0.50', '30.00', '15.00', '2022-09-17 13:32:23', 1),
(6, 2, '5.00', '20.00', '100.00', '2022-09-17 13:33:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `descripcion`, `foto`, `fecha`, `estado`) VALUES
(1, 'pan', '0.60', 'Pan sarnita', 'imagenes/pan.jpg', '2022-09-03 16:44:08', 0),
(2, 'leche', '5.00', 'leche normal', 'imagenes/leche.jpg', '2022-09-03 21:25:23', 1),
(3, 'chocolate', '6.50', 'qknsdkfhlksdfhlksdf', 'imagenes/chocolate.jpg', '2022-09-03 21:26:16', 1),
(4, 'chocolate blanco', '8.50', 'qweqweqweksdf', 'imagenes/galleta.jpg', '2022-09-03 17:28:03', 1),
(5, 'naranja', '5.00', 'qweqwe', 'imagenes/naranja.jpg', '2022-09-10 13:37:28', 1),
(6, 'galleta oreo', '5.00', 'qeqweasd', 'imagenes/galleta.jpg', '2022-09-10 14:05:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_paterno` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_materno` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `usu` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `contra` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombres`, `apellido_paterno`, `apellido_materno`, `usu`, `contra`, `nivel`) VALUES
(1, 'Roger', 'Mamani', 'Lima', 'roger', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
(2, 'Yesenia', 'Almanza', 'Paredes', 'yese', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3),
(3, 'JUan', 'Medina', 'Flores', 'juanito', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 2);

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `id_venta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombrecliente` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nitcliente` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `totalgeneral` decimal(15,2) NOT NULL,
  `cancelado` decimal(15,2) NOT NULL,
  `cambio` decimal(15,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`id_venta`, `nombrecliente`, `nitcliente`, `totalgeneral`, `cancelado`, `cambio`, `fecha`, `estado`) VALUES
(7, 'Mamani', '87965464', '40.00', '40.00', '0.00', '2022-09-17 14:40:28', 1),
(8, 'Soledad', '5465412', '67.50', '80.00', '12.50', '2022-09-17 14:41:45', 1),
(9, 'Raul', '4534545', '26.00', '30.00', '4.00', '2022-09-17 14:43:51', 1),
(10, 'Espinoza', '345345345', '10.00', '25.00', '15.00', '2022-09-17 15:02:51', 1),
(11, 'GÃ³mez NuÃ±ez', '123123123', '26.00', '30.00', '4.00', '2022-09-17 16:29:22', 1),
(12, 'Luchito Perez', '3455345345', '75.00', '100.00', '25.00', '2022-09-17 17:38:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `venta_detalle`
--

DROP TABLE IF EXISTS `venta_detalle`;
CREATE TABLE IF NOT EXISTS `venta_detalle` (
  `id_venta_detalle` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_venta` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `cantidad` decimal(15,2) NOT NULL,
  `precio` decimal(15,2) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_venta_detalle`),
  KEY `id_producto` (`id_producto`),
  KEY `id_venta` (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `venta_detalle`
--

INSERT INTO `venta_detalle` (`id_venta_detalle`, `id_venta`, `id_producto`, `cantidad`, `precio`, `total`, `fecha`, `estado`) VALUES
(1, 7, 5, '3.00', '5.00', '15.00', '2022-09-17 14:40:28', 1),
(2, 7, 6, '5.00', '5.00', '25.00', '2022-09-17 14:40:28', 1),
(3, 8, 6, '3.00', '5.00', '15.00', '2022-09-17 14:41:45', 1),
(4, 8, 2, '4.00', '5.00', '20.00', '2022-09-17 14:41:45', 1),
(5, 8, 3, '5.00', '6.50', '32.50', '2022-09-17 14:41:45', 1),
(6, 9, 3, '4.00', '6.50', '26.00', '2022-09-17 14:43:51', 1),
(7, 10, 2, '2.00', '5.00', '10.00', '2022-09-17 15:02:51', 1),
(8, 11, 3, '4.00', '6.50', '26.00', '2022-09-17 16:29:22', 1),
(9, 12, 2, '15.00', '5.00', '75.00', '2022-09-17 17:38:46', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `venta_detalle`
--
ALTER TABLE `venta_detalle`
  ADD CONSTRAINT `venta_detalle_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_detalle_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
