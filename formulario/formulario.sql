-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 10:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `credenciales`
--

-- --------------------------------------------------------

--
-- Table structure for table `formulario`
--

CREATE TABLE `formulario` (
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formulario`
--

INSERT INTO `formulario` (`nombres`, `apellidos`, `correo`, `contrasena`) VALUES
('wewe', 'ewew', 'we@dsd.com', 'ewewe'),
('Luis Miguel', 'Lopez Garcia', 'luis1234@dsd.com', '123456'),
('Fulano de tal', 'Pérez', 'fn2023@gen.com', '202324'),
('Juan Mateo', 'Delgado', 'jm1895@gen.com', '1895'),
('Catarino', 'Cruz', 'cc@gen.com', '123456'),
('Tiburcio', 'Ponce', 'tp@gen.com', '123456'),
('Canelo', 'Alvarez', 'ca@gen.com', '123456'),
('Jose', 'Garza', 'nuevo@gen.com', '123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
