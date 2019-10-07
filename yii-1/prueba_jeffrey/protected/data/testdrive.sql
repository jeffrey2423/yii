-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2019 a las 15:31:23
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `testdrive`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`) VALUES
(6, 'test6', 'pass6', 'test6@example.com'),
(7, 'test7', 'pass7', 'test7@example.com'),
(8, 'test8', 'pass8', 'test8@example.com'),
(9, 'test9', 'pass9', 'test9@example.com'),
(10, 'test10', 'pass10', 'test10@example.com'),
(11, 'test11', 'pass11', 'test11@example.com'),
(12, 'test12', 'pass12', 'test12@example.com'),
(13, 'test13', 'pass13', 'test13@example.com'),
(14, 'test14', 'pass14', 'test14@example.com'),
(15, 'test15', 'pass15', 'test15@example.com'),
(16, 'test16', 'pass16', 'test16@example.com'),
(17, 'test17', 'pass17', 'test17@example.com'),
(18, 'test18', 'pass18', 'test18@example.com'),
(19, 'test19', 'pass19', 'test19@example.com'),
(30, 'dsds', 'dsdsds', 'dsdsdsdsmod');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `template`
--

CREATE TABLE IF NOT EXISTS `template` (
  `tmpl_code` int(255) NOT NULL,
  `tmpl_apellido` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `template`
--

INSERT INTO `template` (`tmpl_code`, `tmpl_apellido`) VALUES
(1, 'aqdsas');

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
(1, 'prueba', 'prueba', 'contralor', '2019-10-03 10:00:00');

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
-- Indices de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `template`
--
ALTER TABLE `template`
 ADD PRIMARY KEY (`tmpl_code`);

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
-- AUTO_INCREMENT de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
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

INSERT INTO `votaciones_roles` (`id_rol`, `nombre`, `descripcion`, `fecha_creacion`) VALUES (NULL, 'admin', 'administrador del sitio', current_timestamp()), (NULL, 'votante', 'podra afectuar el voto', current_timestamp());
