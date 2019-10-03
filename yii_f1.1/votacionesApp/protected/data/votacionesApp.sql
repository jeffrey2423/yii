-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-10-2019 a las 22:48:33
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `votacionesApp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votaciones_candidato`
--

CREATE TABLE IF NOT EXISTS `votaciones_candidato` (
`id_candidato` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `votaciones_candidato`
--

INSERT INTO `votaciones_candidato` (`id_candidato`, `nombre`, `apellido`, `tipo`, `fecha_creacion`) VALUES
(1, 'prueba', 'prueba', 'contralor', '2019-10-03 05:00:00');

--
-- Disparadores `votaciones_candidato`
--
DELIMITER //
CREATE TRIGGER `poblar_votos` AFTER INSERT ON `votaciones_candidato`
 FOR EACH ROW BEGIN
INSERT INTO votaciones_votos VALUES(NEW.id_candidato,0);
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votaciones_permisos`
--

CREATE TABLE IF NOT EXISTS `votaciones_permisos` (
`id_permiso` int(11) NOT NULL,
  `rol` int(11) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votaciones_roles`
--

CREATE TABLE IF NOT EXISTS `votaciones_roles` (
`id_rol` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votaciones_usuario`
--

CREATE TABLE IF NOT EXISTS `votaciones_usuario` (
`id_user` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `clave` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votaciones_usuario_extendido`
--

CREATE TABLE IF NOT EXISTS `votaciones_usuario_extendido` (
  `id_user` int(11) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votaciones_votos`
--

CREATE TABLE IF NOT EXISTS `votaciones_votos` (
  `id_candidato` int(11) DEFAULT NULL,
  `cantidad_voto` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `votaciones_votos`
--

INSERT INTO `votaciones_votos` (`id_candidato`, `cantidad_voto`) VALUES
(1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `votaciones_candidato`
--
ALTER TABLE `votaciones_candidato`
 ADD PRIMARY KEY (`id_candidato`);

--
-- Indices de la tabla `votaciones_permisos`
--
ALTER TABLE `votaciones_permisos`
 ADD PRIMARY KEY (`id_permiso`), ADD KEY `FK_rol` (`rol`);

--
-- Indices de la tabla `votaciones_roles`
--
ALTER TABLE `votaciones_roles`
 ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `votaciones_usuario`
--
ALTER TABLE `votaciones_usuario`
 ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `votaciones_usuario_extendido`
--
ALTER TABLE `votaciones_usuario_extendido`
 ADD KEY `FK_tipo` (`id_rol`), ADD KEY `FK_user` (`id_user`);

--
-- Indices de la tabla `votaciones_votos`
--
ALTER TABLE `votaciones_votos`
 ADD KEY `FK_candidato` (`id_candidato`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `votaciones_candidato`
--
ALTER TABLE `votaciones_candidato`
MODIFY `id_candidato` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `votaciones_permisos`
--
ALTER TABLE `votaciones_permisos`
MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `votaciones_roles`
--
ALTER TABLE `votaciones_roles`
MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `votaciones_usuario`
--
ALTER TABLE `votaciones_usuario`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `votaciones_permisos`
--
ALTER TABLE `votaciones_permisos`
ADD CONSTRAINT `FK_rol` FOREIGN KEY (`rol`) REFERENCES `votaciones_roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `votaciones_usuario_extendido`
--
ALTER TABLE `votaciones_usuario_extendido`
ADD CONSTRAINT `FK_tipo` FOREIGN KEY (`id_rol`) REFERENCES `votaciones_roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_user` FOREIGN KEY (`id_user`) REFERENCES `votaciones_usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `votaciones_votos`
--
ALTER TABLE `votaciones_votos`
ADD CONSTRAINT `FK_candidato` FOREIGN KEY (`id_candidato`) REFERENCES `votaciones_candidato` (`id_candidato`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
