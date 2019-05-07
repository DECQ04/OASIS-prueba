-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2019 a las 18:11:15
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `Matricula` int(11) NOT NULL,
  `Nombre` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Carrera` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `e-mail` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `PK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`Matricula`, `Nombre`, `Carrera`, `e-mail`, `telefono`, `PK`) VALUES
(1530057, 'Daniel Eduardo Cervantes Quintanilla', 'ITI', '1530057@upv.edu.mx', '22222255', 1),
(1530057, 'Daniel Eduardo Cervantes Quintanilla', 'ITI', '1530057@upv.edu.mx', '22222255', 2),
(1530057, 'DNIEL', 'ITI', '1530057@UPV.EDU.MX', '1234567890', 3),
(1530057, 'Eduardo', 'ITI', '1530057@upv.edu.mx', '0101011101', 4),
(1530057, 'Eduardo', 'ITI', '1530057@upv.edu.mx', '0101011101', 5),
(1530057, 'Eduardo', 'ITI', '1530057@upv.edu.mx', '0101011101', 6),
(1233312, 'qw', 'trr', 'qwee', '23456', 7),
(1233312, 'qw', 'trr', 'qwee', '23456', 8),
(1, 'wef', 'rte', '1530057@upv.edu.mx', '0101011101', 9),
(1, 'wef', 'rte', '1530057@upv.edu.mx', '0101011101', 10),
(1, 'wef', 'rte', '1530057@upv.edu.mx', '0101011101', 11),
(0, 'Eduardo', 'ITI', '', '23456', 12),
(0, 'TYUUIYUO', 'ITI', '', '0101011101', 13),
(0, 'Eduardo', 'ITI', '', '0101011101', 14),
(0, 'Eduardo', 'ITI', '', '0101011101', 15),
(0, 'Eduardo', 'ITI', '', '0101011101', 16),
(0, 'Eduardo', 'ITI', '', '0101011101', 17),
(0, 'Eduardo', 'ITI', '', '0101011101', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `no. empleado` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `carrera` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `PK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`no. empleado`, `nombre`, `carrera`, `telefono`, `PK`) VALUES
(21, 'Mario Humberto Rodríguez Chavez', 'ITI', '0010101010', 1),
(21, 'Mario Humberto Rodríguez Chavez', 'ITI', '0010101010', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`PK`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`PK`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
