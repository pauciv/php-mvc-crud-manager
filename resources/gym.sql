-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2022 a las 14:04:48
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
-- Base de datos: `gym`
--

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `members`
--

-- Database creation
DROP DATABASE IF EXISTS gym;
CREATE DATABASE IF NOT EXISTS gym;
USE gym;

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `sport_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `members`
--

INSERT INTO `members` (`id`, `name`, `last_name`, `email`, `password`, `sport_id`) VALUES
(1, 'Rafael', 'Nadal', 'rafanadal@gmail.com', '$2y$10$lB2wM5MYLiSZ9wWMF.3M9OKGh4djSer7Y/PQUa.ECvyPMx8BLVtES', 3),
(2, 'Fernando ', 'Alonso', 'falonso@gmail.com', '$2y$10$Yy/UueX.RDDzCH7aHheUDejGqdP16URdvkVIs/EY5ftPnAk.lQl7q', 2),
(3, 'Arnold', 'Schwarzenegger', 'chuache@gmail.com', '$2y$10$NBZA7uer4zmj36k9e7IrYekfApQh387jEvNr6Y9W78h2FpLzyzre6', 1),
(4, 'Muhammad', 'Ali', 'ali@gmail.com', '$2y$10$xg.TgxU.eEShR1grXbn6IO0he.Hy5aWwIQzrfF0IyMkYZ9U31woQG', 2),
(5, 'Carolina', 'Marín', 'cmarin@gmail.com', '$2y$10$JgLjTjoch/Ha15ZZKeCVGOiglc6z79V79wZwSH74PbiwnirniN5e2', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sports`
--

CREATE TABLE `sports` (
  `id` int(11) NOT NULL,
  `sport` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sports`
--

INSERT INTO `sports` (`id`, `sport`) VALUES
(1, 'Pilates'),
(2, 'Powerlifiting'),
(3, 'Padel');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sport_id` (`sport_id`);

--
-- Indices de la tabla `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`sport_id`) REFERENCES `sports` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
