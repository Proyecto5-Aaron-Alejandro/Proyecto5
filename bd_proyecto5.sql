-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2017 a las 16:09:14
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_proyecto5`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contactos`
--

CREATE TABLE `tbl_contactos` (
  `con_id` int(3) NOT NULL,
  `con_nombre` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `con_apellido` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `con_tlf1` int(9) NOT NULL,
  `con_tlf2` int(9) DEFAULT NULL,
  `con_correo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `con_latitud` double(20,10) NOT NULL,
  `con_longitud` double(20,10) NOT NULL,
  `con_latitud1` double(20,10) DEFAULT NULL,
  `con_longitud1` double(20,10) DEFAULT NULL,
  `con_estado` varchar(10) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'alta',
  `usuc_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_contactos`
--

INSERT INTO `tbl_contactos` (`con_id`, `con_nombre`, `con_apellido`, `con_tlf1`, `con_tlf2`, `con_correo`, `con_latitud`, `con_longitud`, `con_latitud1`, `con_longitud1`, `con_estado`, `usuc_id`) VALUES
(1, 'Aarón', 'Muñoz', 667500340, NULL, 'aaron.munoz@hotmail.es', 41.3522344000, 2.1066750000, NULL, NULL, 'alta', 1),
(3, 'Alejandro', 'Rodriguez', 123456789, NULL, 'asdf@fje.edu', 47.2342340000, 4.3243240000, NULL, NULL, 'alta', 1),
(4, 'Ivan', 'Rubio', 932438946, NULL, 'lkwdjdfirjf', 43.1000000000, 32.9000000000, NULL, NULL, 'alta', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `usu_id` int(3) NOT NULL,
  `usu_nombre` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `usu_pass` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`usu_id`, `usu_nombre`, `usu_pass`) VALUES
(1, 'dmarin', 1234),
(3, 'sjimenez', 1234);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_contactos`
--
ALTER TABLE `tbl_contactos`
  ADD PRIMARY KEY (`con_id`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_contactos`
--
ALTER TABLE `tbl_contactos`
  MODIFY `con_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `usu_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
