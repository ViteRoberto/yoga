-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2019 a las 05:07:17
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yoga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slide`
--

CREATE TABLE `slide` (
  `idSlide` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `link` varchar(200) DEFAULT NULL,
  `url` varchar(100) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `slide`
--

INSERT INTO `slide` (`idSlide`, `titulo`, `link`, `url`, `tipo`, `activo`) VALUES
(22, 'lolo', 'lolo', 'vistas/img/slides/lolo-17.jpg', 'Principal', 1),
(29, 'tgt', 'tgt', 'vistas/img/slides/tgt-27.jpg', 'Principal', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `perfil` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `ultimoLogin` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `usuario`, `password`, `perfil`, `url`, `estado`, `ultimoLogin`, `fecha`) VALUES
(1, 'Administrador', 'admin', 'Admin123!', 'Administrador', 'vistas/img/usuarios/default.png', 1, '2019-05-16 00:00:00', '2019-05-16 17:04:45');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`idSlide`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `slide`
--
ALTER TABLE `slide`
  MODIFY `idSlide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
