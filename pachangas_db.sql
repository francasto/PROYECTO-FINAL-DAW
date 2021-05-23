-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2021 a las 09:50:46
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pachangas_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE `amigos` (
  `id_usuario` int(11) NOT NULL,
  `id_amigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido1` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido2` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `movil` int(9) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apodo` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id_usuario`, `nombre`, `apellido1`, `apellido2`, `email`, `movil`, `password`, `foto`, `apodo`, `token`) VALUES
(11, 'Pepita', 'Pulgarcita', 'Chiquitita', 'pepita@fran.com', 954121242, '$2y$10$wSAgpg8QzuV7hJmU34nRL.uNQkmATSe9sTQejRHyuRDGJAZvlHPMO', '../img/fotos_perfil/pepita@fran.com.png', 'El pelusita', '9fc91a425cc97c79731ebc418e735733'),
(13, 'Fran', 'Casto', 'Ramos', 'francasto@gmail.com', 654927642, '$2y$10$XOEx8murFWzJSTwzT7p.TuuHxBvPV4Z97kHjbNFZsID1SL4sfF69.', '../img/fotos_perfil/francasto@gmail.com.jpg', 'to yo, to yo', 'e051bc479aa6d59dfe09aede632fe3f2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pabellones`
--

CREATE TABLE `pabellones` (
  `id_pabellon` int(11) NOT NULL,
  `nombre_pab` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `localidad` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  `id_creador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `pabellones`
--

INSERT INTO `pabellones` (`id_pabellon`, `nombre_pab`, `direccion`, `localidad`, `telefono`, `id_creador`) VALUES
(19, 'Bami', 'c/Castillo de Alcal&aacute;', 'Sevilla', 234234234, 13),
(20, 'La concha de la lora', 'la mism&iacute;sima concha', 'Zihuatanejo', 234222111, 11),
(21, 'Polideportivo Ram&oacute;n y Cajal Pista interior ', 'C/Ram&oacute;n y Cajal', 'Dos Hermanas', 234234234, 13),
(22, 'Vel&oacute;dromo', 'C/Del vel&oacute;dromo', 'Dos Hermanas', 654654654, 13),
(23, 'Pista Bermejales', 'C/Los Bermejales, s/n', 'Sevilla', 222333222, 13),
(24, 'Estadio de la Cartuja', 'Avenida de los descubrimientos s/n', 'Sevilla', 954668554, 11),
(25, 'Benito Villamar&iacute;n', 'Avenida de la palmera n&ordm;1', 'Sevilla', 954878998, 11),
(26, 'Wembley', 'C/Freddie Mercury, s/n', 'Londres', 5489778, 11),
(27, 'Pabell&oacute;n de Bellavista', 'Av. de Bellavista, 22', 'Sevilla', 954887998, 11),
(28, 'Maracan&aacute;', 'C/del estadio, s/n', 'R&iacute;o de Janeiro', 654654654, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pachangas`
--

CREATE TABLE `pachangas` (
  `id_pachanga` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_pabellon` int(11) NOT NULL,
  `precio` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `codigo_pachanga` varchar(12) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '000000',
  `participantes` int(11) NOT NULL,
  `id_creador` int(11) NOT NULL,
  `activa` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `pachangas`
--

INSERT INTO `pachangas` (`id_pachanga`, `fecha`, `hora`, `id_pabellon`, `precio`, `codigo_pachanga`, `participantes`, `id_creador`, `activa`) VALUES
(82, '2021-05-09', '08:09:00', 26, '98', '000000', 8, 11, 1),
(83, '2021-05-13', '09:08:00', 25, '8', '000000', 9, 11, 1),
(91, '2021-05-11', '08:08:00', 19, '8', '000000', 8, 13, 1),
(92, '2021-05-12', '09:09:00', 23, '9', '000000', 9, 13, 1),
(93, '2021-05-14', '11:00:00', 21, '1', '000000', 10, 13, 1),
(119, '2021-05-25', '05:55:00', 20, '5', '000000', 5, 11, 1),
(120, '2021-05-26', '05:05:00', 20, '5', '000000', 5, 11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `id_usuario_partido` int(11) NOT NULL,
  `id_pachanga_partido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id_usuario_partido`, `id_pachanga_partido`) VALUES
(11, 82),
(11, 83),
(13, 82),
(13, 83),
(13, 91),
(13, 92),
(13, 93),
(11, 119),
(11, 120);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_amigo` (`id_amigo`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `pabellones`
--
ALTER TABLE `pabellones`
  ADD PRIMARY KEY (`id_pabellon`),
  ADD KEY `id_creador` (`id_creador`);

--
-- Indices de la tabla `pachangas`
--
ALTER TABLE `pachangas`
  ADD PRIMARY KEY (`id_pachanga`),
  ADD KEY `pachangas_ibfk_1` (`id_pabellon`),
  ADD KEY `pachangas_ibfk_2` (`id_creador`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD KEY `partidos_ibfk_1` (`id_pachanga_partido`),
  ADD KEY `partidos_ibfk_2` (`id_usuario_partido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `pabellones`
--
ALTER TABLE `pabellones`
  MODIFY `id_pabellon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `pachangas`
--
ALTER TABLE `pachangas`
  MODIFY `id_pachanga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD CONSTRAINT `amigos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `jugadores` (`id_usuario`),
  ADD CONSTRAINT `amigos_ibfk_2` FOREIGN KEY (`id_amigo`) REFERENCES `jugadores` (`id_usuario`);

--
-- Filtros para la tabla `pabellones`
--
ALTER TABLE `pabellones`
  ADD CONSTRAINT `pabellones_ibfk_1` FOREIGN KEY (`id_creador`) REFERENCES `jugadores` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
