-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 10, 2022 at 09:14 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `compras`
--

INSERT INTO `compras` (`id_compra`, `id_producto`, `precio`, `cantidad`, `total`, `fecha`, `estado`) VALUES
(1, 3, '0.50', '10.00', '5.00', '2022-09-10 15:49:10', 1),
(2, 5, '2.50', '15.00', '37.50', '2022-09-10 15:49:10', 1),
(3, 3, '2.00', '50.00', '100.00', '2022-09-09 16:57:06', 1);

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
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `id_venta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nit` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`id_venta`, `nit`, `fecha`, `estado`) VALUES
(1, '123456', '2022-09-03 17:38:18', 1),
(2, '', '2022-09-10 17:04:29', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
