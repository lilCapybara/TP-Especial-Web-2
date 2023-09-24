-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2023 a las 23:19:35
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cba&cba e-shop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campeones`
--

CREATE TABLE `campeones` (
  `Champion_id` int(3) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Rol` varchar(10) NOT NULL,
  `Precio` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `campeones`
--

INSERT INTO `campeones` (`Champion_id`, `Nombre`, `Rol`, `Precio`) VALUES
(1, 'Ashe', 'ADC', 1250),
(2, 'Braum', 'Support', 950);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chromas`
--

CREATE TABLE `chromas` (
  `Chroma_id` int(2) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Champion_id` int(3) NOT NULL,
  `Skin_id` int(2) NOT NULL,
  `Precio` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `skins`
--

CREATE TABLE `skins` (
  `Skin_id` int(2) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Champion_id` int(3) NOT NULL,
  `Precio` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `skins`
--

INSERT INTO `skins` (`Skin_id`, `Nombre`, `Champion_id`, `Precio`) VALUES
(1, 'Forajida', 1, 1250),
(2, 'Rey Poro', 2, 950);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `Transaction_id` int(10) NOT NULL,
  `User_id` int(10) NOT NULL,
  `E-mail` varchar(50) NOT NULL,
  `Product_id` int(3) NOT NULL,
  `Monto_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campeones`
--
ALTER TABLE `campeones`
  ADD PRIMARY KEY (`Champion_id`);

--
-- Indices de la tabla `chromas`
--
ALTER TABLE `chromas`
  ADD PRIMARY KEY (`Chroma_id`),
  ADD KEY `Skin_id` (`Skin_id`);

--
-- Indices de la tabla `skins`
--
ALTER TABLE `skins`
  ADD PRIMARY KEY (`Skin_id`),
  ADD KEY `Champion_id` (`Champion_id`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`Transaction_id`),
  ADD KEY `Product_id` (`Product_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campeones`
--
ALTER TABLE `campeones`
  MODIFY `Champion_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `chromas`
--
ALTER TABLE `chromas`
  MODIFY `Chroma_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `skins`
--
ALTER TABLE `skins`
  MODIFY `Skin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `Transaction_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chromas`
--
ALTER TABLE `chromas`
  ADD CONSTRAINT `chromas_ibfk_1` FOREIGN KEY (`Skin_id`) REFERENCES `skins` (`Skin_id`);

--
-- Filtros para la tabla `skins`
--
ALTER TABLE `skins`
  ADD CONSTRAINT `skins_ibfk_1` FOREIGN KEY (`Champion_id`) REFERENCES `campeones` (`Champion_id`);

--
-- Filtros para la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD CONSTRAINT `transacciones_ibfk_1` FOREIGN KEY (`Product_id`) REFERENCES `campeones` (`Champion_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
