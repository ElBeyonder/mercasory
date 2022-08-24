-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2022 a las 08:42:36
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mercasory`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(400) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` char(150) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` char(100) COLLATE utf8_spanish2_ci NOT NULL,
  `password` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre_completo`, `correo`, `usuario`, `password`, `fecha_creacion`, `fecha_modificacion`) VALUES
(1, 'asdasf', 'sdfsdf@sasf', 'sdfsd', '$2y$10$zSstD46LJfbUeizOCV7xqutPpRPOhRijL44qfuLwIUSsnTev1yoLK', '2022-08-21 20:39:04', '2022-08-21 20:39:04'),
(2, 'andres felipe chantre', 'andres@gmail.com', 'andres', '$2y$10$h4DnfDBKDSn59aT/.J4Dzuag2qkNR9OxfrS3HaseW2H6c4xUBeLWm', '2022-08-21 20:40:51', '2022-08-21 20:40:51'),
(3, 'sorelly trochez', 'sory@gmail.com', 'sory', '$2y$10$VAIL4vytDCw5.OsTLT9oCuAcvD.Pk3t/CsdMQfP3TkGxwjiRvGQOe', '2022-08-24 00:51:13', '2022-08-24 00:51:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
