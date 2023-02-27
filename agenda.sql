-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2023 a las 01:36:11
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaboradores`
--

CREATE TABLE `colaboradores` (
  `id` int(255) NOT NULL,
  `indent` int(100) NOT NULL,
  `nombreCol` varchar(100) NOT NULL,
  `apellidoCol` varchar(100) NOT NULL,
  `cargoCol` varchar(100) NOT NULL,
  `cronometro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `colaboradores`
--

INSERT INTO `colaboradores` (`id`, `indent`, `nombreCol`, `apellidoCol`, `cargoCol`, `cronometro_id`) VALUES
(35, 1054, 'a', 'b', 'Técnico de Información', 0),
(36, 4444, 'Juan', 'Ruiz', 'Analista de Información', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cronometro`
--

CREATE TABLE `cronometro` (
  `id` int(11) NOT NULL,
  `indent` int(100) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `inicio` datetime DEFAULT NULL,
  `cronometro_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cronometro`
--

INSERT INTO `cronometro` (`id`, `indent`, `usuario`, `estado`, `inicio`, `cronometro_id`) VALUES
(5, 1054658857, 'Helver', 0, NULL, 34),
(6, 1054, 'a', 0, NULL, 35),
(7, 4444, 'Juan', 0, NULL, 36);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cronometro_id` (`cronometro_id`);

--
-- Indices de la tabla `cronometro`
--
ALTER TABLE `cronometro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cronometro_id` (`cronometro_id`),
  ADD KEY `indent` (`indent`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `cronometro`
--
ALTER TABLE `cronometro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
