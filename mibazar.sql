-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 03, 2022 at 09:51 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `descripcion`, `foto`, `fecha`, `estado`) VALUES
(1, 'pan', '0.60', 'Pan sarnita', 'imagenes/pan.jpg', '2022-09-03 16:44:08', 1),
(2, 'naranaj', '5.00', 'asdczxczxczxczxc', 'imagenes/naranja1.jpg', '2022-09-03 21:25:23', 1),
(3, 'chocolate', '6.50', 'qknsdkfhlksdfhlksdf', 'imagenes/chocolate.jpg', '2022-09-03 21:26:16', 1),
(4, 'chocolate blanco', '8.50', 'qweqweqweksdf', 'imagenes/galleta.jpg', '2022-09-03 17:28:03', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`id_venta`, `nit`, `fecha`, `estado`) VALUES
(1, '123456', '2022-09-03 17:38:18', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
