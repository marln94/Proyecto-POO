-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2016 a las 04:47:55
-- Versión del servidor: 5.7.9
-- Versión de PHP: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_bibliotec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_autores`
--

DROP TABLE IF EXISTS `tbl_autores`;
CREATE TABLE IF NOT EXISTS `tbl_autores` (
  `codigo_autor` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_nacionalidad` int(11) NOT NULL,
  `codigo_lengua_materna` int(11) NOT NULL,
  `nombre_apellido` varchar(60) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_fallecimiento` date DEFAULT NULL,
  `imagen_autor` mediumblob,
  PRIMARY KEY (`codigo_autor`),
  KEY `fk_tbl_autores_tbl_nacionalidades1_idx` (`codigo_nacionalidad`),
  KEY `fk_tbl_autores_tbl_lenguas_maternas1_idx` (`codigo_lengua_materna`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_años_publicaciones`
--

DROP TABLE IF EXISTS `tbl_años_publicaciones`;
CREATE TABLE IF NOT EXISTS `tbl_años_publicaciones` (
  `codigo_año_publicacion` int(11) NOT NULL AUTO_INCREMENT,
  `año_publicacion` int(11) NOT NULL,
  PRIMARY KEY (`codigo_año_publicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categorias`
--

DROP TABLE IF EXISTS `tbl_categorias`;
CREATE TABLE IF NOT EXISTS `tbl_categorias` (
  `codigo_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(45) NOT NULL,
  `cantidad_libros` int(11) NOT NULL,
  `imagen_categoria` mediumblob,
  PRIMARY KEY (`codigo_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categorias_x_colecciones`
--

DROP TABLE IF EXISTS `tbl_categorias_x_colecciones`;
CREATE TABLE IF NOT EXISTS `tbl_categorias_x_colecciones` (
  `codigo_categoria` int(11) NOT NULL,
  `codigo_coleccion` int(11) NOT NULL,
  PRIMARY KEY (`codigo_categoria`,`codigo_coleccion`),
  KEY `fk_tbl_categorias_has_tbl_colecciones_tbl_colecciones1_idx` (`codigo_coleccion`),
  KEY `fk_tbl_categorias_has_tbl_colecciones_tbl_categorias1_idx` (`codigo_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categorias_x_libros`
--

DROP TABLE IF EXISTS `tbl_categorias_x_libros`;
CREATE TABLE IF NOT EXISTS `tbl_categorias_x_libros` (
  `codigo_categoria` int(11) NOT NULL,
  `codigo_libro` int(11) NOT NULL,
  PRIMARY KEY (`codigo_categoria`,`codigo_libro`),
  KEY `fk_tbl_categorias_has_tbl_libros_tbl_libros1_idx` (`codigo_libro`),
  KEY `fk_tbl_categorias_has_tbl_libros_tbl_categorias_idx` (`codigo_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_colecciones`
--

DROP TABLE IF EXISTS `tbl_colecciones`;
CREATE TABLE IF NOT EXISTS `tbl_colecciones` (
  `codigo_coleccion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_coleccion` varchar(45) NOT NULL,
  `cantidad_libros` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo_coleccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_disponibilidades`
--

DROP TABLE IF EXISTS `tbl_disponibilidades`;
CREATE TABLE IF NOT EXISTS `tbl_disponibilidades` (
  `codigo_disponibilidad` int(11) NOT NULL,
  `nombre_disponibilidad` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo_disponibilidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_editoriales`
--

DROP TABLE IF EXISTS `tbl_editoriales`;
CREATE TABLE IF NOT EXISTS `tbl_editoriales` (
  `codigo_editorial` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_editorial` varchar(45) NOT NULL,
  `nombre_abreviado` varchar(45) DEFAULT NULL,
  `direccion` varchar(60) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `correo_electronico` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo_editorial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_lenguas_maternas`
--

DROP TABLE IF EXISTS `tbl_lenguas_maternas`;
CREATE TABLE IF NOT EXISTS `tbl_lenguas_maternas` (
  `codigo_lengua_materna` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_lengua_materna` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo_lengua_materna`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_libros`
--

DROP TABLE IF EXISTS `tbl_libros`;
CREATE TABLE IF NOT EXISTS `tbl_libros` (
  `codigo_libro` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_tipo_libro` int(11) NOT NULL,
  `codigo_autor` int(11) NOT NULL,
  `codigo_editorial` int(11) NOT NULL,
  `codigo_año_publicacion` int(11) NOT NULL,
  `codigo_coleccion` int(11) NOT NULL,
  `codigo_disponibilidad` int(11) NOT NULL,
  `titulo_libro` varchar(45) NOT NULL,
  `cantidad_libros` int(11) DEFAULT NULL,
  `descripcion_fisica` varchar(200) DEFAULT NULL,
  `ISBN` varchar(45) NOT NULL,
  `imagen_libro` mediumblob,
  `tipo_imagen_libro` varchar(30) DEFAULT NULL,
  `imagen_codigo_qr` blob NOT NULL,
  PRIMARY KEY (`codigo_libro`),
  KEY `fk_tbl_libros_tbl_tipos_libros1_idx` (`codigo_tipo_libro`),
  KEY `fk_tbl_libros_tbl_editoriales1_idx` (`codigo_editorial`),
  KEY `fk_tbl_libros_tbl_coleccion1_idx` (`codigo_coleccion`),
  KEY `fk_tbl_libros_tbl_autores1_idx` (`codigo_autor`),
  KEY `fk_tbl_libros_tbl_años_publicaciones1_idx` (`codigo_año_publicacion`),
  KEY `fk_tbl_libros_tbl_disponibilidades1_idx` (`codigo_disponibilidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_libros_x_sucursales`
--

DROP TABLE IF EXISTS `tbl_libros_x_sucursales`;
CREATE TABLE IF NOT EXISTS `tbl_libros_x_sucursales` (
  `codigo_libro` int(11) NOT NULL,
  `codigo_sucursal` int(11) NOT NULL,
  PRIMARY KEY (`codigo_libro`,`codigo_sucursal`),
  KEY `fk_tbl_libros_has_tbl_sucursales_tbl_sucursales1_idx` (`codigo_sucursal`),
  KEY `fk_tbl_libros_has_tbl_sucursales_tbl_libros1_idx` (`codigo_libro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_nacionalidades`
--

DROP TABLE IF EXISTS `tbl_nacionalidades`;
CREATE TABLE IF NOT EXISTS `tbl_nacionalidades` (
  `codigo_nacionalidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_nacionalidad` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo_nacionalidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_prestamos`
--

DROP TABLE IF EXISTS `tbl_prestamos`;
CREATE TABLE IF NOT EXISTS `tbl_prestamos` (
  `codigo_prestamo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_usuario` int(11) NOT NULL,
  `codigo_libro` int(11) NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `fecha_devolucion` date NOT NULL,
  PRIMARY KEY (`codigo_prestamo`),
  KEY `fk_tbl_prestamo_tbl_personas1_idx` (`codigo_usuario`),
  KEY `fk_tbl_prestamo_tbl_libros1_idx` (`codigo_libro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sucursales`
--

DROP TABLE IF EXISTS `tbl_sucursales`;
CREATE TABLE IF NOT EXISTS `tbl_sucursales` (
  `codigo_sucursal` int(11) NOT NULL AUTO_INCREMENT,
  `direccion_sucursal` varchar(45) NOT NULL,
  `telefono_sucursal` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo_sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_libros`
--

DROP TABLE IF EXISTS `tbl_tipos_libros`;
CREATE TABLE IF NOT EXISTS `tbl_tipos_libros` (
  `codigo_tipo_libro` int(11) NOT NULL,
  `nombre_tipo_libro` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo_tipo_libro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_usuarios`
--

DROP TABLE IF EXISTS `tbl_tipos_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_tipos_usuarios` (
  `codigo_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_usuario` varchar(20) NOT NULL,
  PRIMARY KEY (`codigo_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipos_usuarios`
--

INSERT INTO `tbl_tipos_usuarios` (`codigo_tipo_usuario`, `nombre_tipo_usuario`) VALUES
(1, 'Administrador'),
(2, 'Bibliotecario'),
(3, 'Registrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `codigo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_tipo_usuario` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo_electronico` varchar(45) NOT NULL,
  `nombre_usuario` varchar(45) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `domicilio` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `imagen_usuario` mediumblob,
  PRIMARY KEY (`codigo_usuario`),
  KEY `fk_tbl_personas_tbl_tipos_personas1_idx` (`codigo_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`codigo_usuario`, `codigo_tipo_usuario`, `nombre`, `apellido`, `correo_electronico`, `nombre_usuario`, `contrasena`, `domicilio`, `telefono`, `imagen_usuario`) VALUES
(19, 3, 'asd', 'asd', 'bnm@u.u', 'asd', 'asd.456', NULL, NULL, NULL),
(20, 3, 'asd', 'asd', 'bnm@u.u', 'asd', 'asd.456', NULL, NULL, NULL),
(21, 3, 'asd', 'asd', 'bnm@u.u', 'asd', 'asd.456', NULL, NULL, NULL),
(22, 3, 'sdf', 'sdf', 'bnm@u.u', 'sdf', 'sdf', NULL, NULL, NULL),
(23, 3, 'zxc', 'zxc', 'zxc@zxc.zxc', 'zxc', 'zxc', NULL, NULL, NULL),
(24, 3, 'zxc', 'zxc', 'zxc@zxc.zxc', 'zxc', 'zxc', NULL, NULL, NULL),
(25, 3, 'qwe', 'qwe', 'qwe@qwe.qwe', 'qwe', 'qwe', NULL, NULL, NULL),
(26, 3, 'll', 'll', 'll@ll.ll', 'll', 'll', NULL, NULL, NULL),
(27, 3, 'gg', 'gg', 'gg@gg.gg', 'gg', 'gg', NULL, NULL, NULL),
(28, 3, 'ff', 'ff', 'ff@ff.ff', 'ff', 'ff', NULL, NULL, NULL),
(29, 3, 'yy', 'yy', 'yy@yy.yy', 'yy', 'yy', NULL, NULL, NULL),
(30, 3, 'ss', 'ss', 'ss@ss.ss', 'ss', 'ss', NULL, NULL, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_autores`
--
ALTER TABLE `tbl_autores`
  ADD CONSTRAINT `fk_tbl_autores_tbl_lenguas_maternas1` FOREIGN KEY (`codigo_lengua_materna`) REFERENCES `tbl_lenguas_maternas` (`codigo_lengua_materna`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_autores_tbl_nacionalidades1` FOREIGN KEY (`codigo_nacionalidad`) REFERENCES `tbl_nacionalidades` (`codigo_nacionalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_categorias_x_colecciones`
--
ALTER TABLE `tbl_categorias_x_colecciones`
  ADD CONSTRAINT `fk_tbl_categorias_has_tbl_colecciones_tbl_categorias1` FOREIGN KEY (`codigo_categoria`) REFERENCES `tbl_categorias` (`codigo_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_categorias_has_tbl_colecciones_tbl_colecciones1` FOREIGN KEY (`codigo_coleccion`) REFERENCES `tbl_colecciones` (`codigo_coleccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_categorias_x_libros`
--
ALTER TABLE `tbl_categorias_x_libros`
  ADD CONSTRAINT `fk_tbl_categorias_has_tbl_libros_tbl_categorias` FOREIGN KEY (`codigo_categoria`) REFERENCES `tbl_categorias` (`codigo_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_categorias_has_tbl_libros_tbl_libros1` FOREIGN KEY (`codigo_libro`) REFERENCES `tbl_libros` (`codigo_libro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_libros`
--
ALTER TABLE `tbl_libros`
  ADD CONSTRAINT `fk_tbl_libros_tbl_autores1` FOREIGN KEY (`codigo_autor`) REFERENCES `tbl_autores` (`codigo_autor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_libros_tbl_años_publicaciones1` FOREIGN KEY (`codigo_año_publicacion`) REFERENCES `tbl_años_publicaciones` (`codigo_año_publicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_libros_tbl_coleccion1` FOREIGN KEY (`codigo_coleccion`) REFERENCES `tbl_colecciones` (`codigo_coleccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_libros_tbl_disponibilidades1` FOREIGN KEY (`codigo_disponibilidad`) REFERENCES `tbl_disponibilidades` (`codigo_disponibilidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_libros_tbl_editoriales1` FOREIGN KEY (`codigo_editorial`) REFERENCES `tbl_editoriales` (`codigo_editorial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_libros_tbl_tipos_libros1` FOREIGN KEY (`codigo_tipo_libro`) REFERENCES `tbl_tipos_libros` (`codigo_tipo_libro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_libros_x_sucursales`
--
ALTER TABLE `tbl_libros_x_sucursales`
  ADD CONSTRAINT `fk_tbl_libros_has_tbl_sucursales_tbl_libros1` FOREIGN KEY (`codigo_libro`) REFERENCES `tbl_libros` (`codigo_libro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_libros_has_tbl_sucursales_tbl_sucursales1` FOREIGN KEY (`codigo_sucursal`) REFERENCES `tbl_sucursales` (`codigo_sucursal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_prestamos`
--
ALTER TABLE `tbl_prestamos`
  ADD CONSTRAINT `fk_tbl_prestamo_tbl_libros1` FOREIGN KEY (`codigo_libro`) REFERENCES `tbl_libros` (`codigo_libro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_prestamo_tbl_personas1` FOREIGN KEY (`codigo_usuario`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `fk_tbl_personas_tbl_tipos_personas1` FOREIGN KEY (`codigo_tipo_usuario`) REFERENCES `tbl_tipos_usuarios` (`codigo_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
