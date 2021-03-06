-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2020 a las 18:47:09
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbsockedop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `id_calendario` int(4) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `funcionario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calendario`
--

INSERT INTO `calendario` (`id_calendario`, `nombre`, `estado`, `fecha`, `descripcion`, `funcionario`) VALUES
(1, 'Entrenamiento', 'Activo', '2021-01-20', 'Entrenamiento con Juvenil', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(4) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `condicion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`, `condicion`) VALUES
(1, 'Benjamines', 'Niños de 7-10 Años', 0),
(4, 'Nueva Jimmy', 'Prueba de Función y de Edición', 1),
(7, 'Chikis', 'Descripción breve de la categoría', 1),
(8, 'Juvenil', 'Esta es una prueba de adición de registro en el módulo Categoría.', 1),
(9, 'Prejuvenil', 'Prueba de Condición', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `no_documento` int(15) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `barrio` varchar(20) NOT NULL,
  `celular` varchar(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `nombre_acudiente` varchar(50) NOT NULL,
  `apellidos_acudiente` varchar(50) NOT NULL,
  `tel_acudiente` varchar(15) NOT NULL,
  `email_acudiente` varchar(50) NOT NULL,
  `parentesco_acu` varchar(10) NOT NULL,
  `funcionario` int(4) NOT NULL,
  `categoria` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`no_documento`, `tipo_documento`, `nombres`, `apellidos`, `estado`, `direccion`, `barrio`, `celular`, `email`, `foto`, `nombre_acudiente`, `apellidos_acudiente`, `tel_acudiente`, `email_acudiente`, `parentesco_acu`, `funcionario`, `categoria`) VALUES
(1024550460, 'T.I', 'Alan Felipe', 'Rivera Vallejos', 'Activo', 'Kra 45 67 43 ', 'Olarte', '3219828370', 'alan_vallejos@hotmai', 'bacca.jpg', 'Martha Patricia', 'Mejia Lopez', '7777777', 'mejia@hotmail.com', 'tia', 3, 8),
(1165489887, 'C.C', 'Juan Gillermo', 'Cuadrado', 'Activo', 'Trv 34 87-45 Sur', 'Chuniza', '3214567834', 'juancuadrado@gmail.c', 'cuadrado.jpg', 'Maria', 'Castillo', '7777270', 'catillo1245@gmail.com', 'Tia', 1, 1),
(2147483647, 'T.I', 'fv vdfvv', 'asdvasdv', 'Activo', 'asdvdsva', 'asdvasdvasc', '2346546454', 'fdvdfvadfvd@vsdvfdvf', 'logo.jpg', 'afvasdvasfvas', 'sdvasdvsv', 'vasdvasdvasdv', 'asdvasvasdv@gsfdbvdfv', 'dvasvasfva', 3, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_tecnica`
--

CREATE TABLE `ficha_tecnica` (
  `id_ficha_tecnica` int(4) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `rh` varchar(3) NOT NULL,
  `edad` int(11) NOT NULL,
  `eps` varchar(50) NOT NULL,
  `estatura` varchar(50) NOT NULL,
  `peso` varchar(50) NOT NULL,
  `talla` varchar(50) NOT NULL,
  `n_calzada` varchar(50) NOT NULL,
  `posicion` varchar(50) DEFAULT NULL,
  `club_otro` varchar(50) DEFAULT NULL,
  `estudiante` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(4) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `usuario`, `tipo_documento`, `nombres`, `apellidos`, `celular`, `direccion`, `estado`) VALUES
(1, '1000366300', 'C.C', 'Angie', 'Castillo', '3219334849', 'tv 97 b sur # 45-45', 'Activo'),
(2, '1000366269', 'C.C', 'Jimmy', 'Benavides', '3219337719', 'tv 5 b este # 45-32', 'Activo'),
(3, '465464363', 'C.C', 'JUANITO ANTONIO', 'PEREZ CASTRO', '324632546546', 'Kra 9 123 98 34 ap 10-01', 'Activo'),
(4, '1111111', 'C.C', 'Juan Alejandro', 'Parra Gonzalez', '3111111111', 'call1 1 11-11', 'Activo'),
(10, '345245245345', 'C.C', 'AMANDA TERESA', 'MENDEZ LOPEZ', '345245', 'sfdvsfvfvdfv', 'Activo'),
(11, '222222222', 'C.C', 'PRUEBA ', 'NUMERO 2', '3112233445', 'CALLE 1 3 4', 'Activo'),
(12, '4565645645', 'C.C', 'PEDRO NEL', 'DUARTE QUIROZ', '3208374593', 'KRA 56 75 89', 'Activo'),
(13, '333333333', 'C.C', 'AMADA ROSA', 'PEREZ', '3112456789', 'CALL 45 87 34', 'Activo'),
(14, '55555555555', 'C.C', 'Ana Maria', 'Veloza Sarmiento', '3555555555', 'Kra 55 55 55', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensualidad`
--

CREATE TABLE `mensualidad` (
  `id_mensualidad` int(4) NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `fecha_pago` date NOT NULL,
  `mes` varchar(20) NOT NULL,
  `estudiante` int(15) NOT NULL,
  `funcionario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensualidad`
--

INSERT INTO `mensualidad` (`id_mensualidad`, `valor`, `fecha_pago`, `mes`, `estudiante`, `funcionario`) VALUES
(1, '43000.00', '2020-06-07', 'junio', 1165489887, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rendimiento`
--

CREATE TABLE `rendimiento` (
  `id_rendimiento` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `progreso` varchar(300) NOT NULL,
  `ficha_tecnica` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `doc_usuario` varchar(20) NOT NULL,
  `clave_usuario` varchar(20) NOT NULL,
  `mail_usuario` varchar(40) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`doc_usuario`, `clave_usuario`, `mail_usuario`, `tipo_usuario`) VALUES
('1000366269', '12546', 'jimmybrandon03@gmail.com', 'Administrador'),
('1000366300', '12345', 'angiecastillo11@gmail.com', 'Administrador'),
('1024463821', '1024', 'patriciariveravallejso@outlook.com', 'Admi'),
('1111111', '1111', 'juanparra@homail.com', 'Entrenador'),
('222222222', '2222', 'prueba@hotmail.com', 'Contador'),
('333333333', '3333', 'adamaris@hotmail.com', 'Contador'),
('345245245345', 'casdsadcawd', 'fsvfvfsvefv@advasfvfv', 'Contador'),
('4565645645', '5645', 'pedro@gmail.com', 'Contador'),
('465464363', '12345', 'mvlsdfnb@hotmail.com', 'Entrenador'),
('55555555555', '5555', 'anamaria@gmail.com', 'Contador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`id_calendario`),
  ADD KEY `funcionario` (`funcionario`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`no_documento`),
  ADD KEY `funcionario` (`funcionario`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `ficha_tecnica`
--
ALTER TABLE `ficha_tecnica`
  ADD PRIMARY KEY (`id_ficha_tecnica`),
  ADD KEY `estudiante` (`estudiante`);

--
-- Indices de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `mensualidad`
--
ALTER TABLE `mensualidad`
  ADD PRIMARY KEY (`id_mensualidad`),
  ADD KEY `estudiante` (`estudiante`),
  ADD KEY `funcionario` (`funcionario`);

--
-- Indices de la tabla `rendimiento`
--
ALTER TABLE `rendimiento`
  ADD PRIMARY KEY (`id_rendimiento`),
  ADD KEY `ficha_tecnica` (`ficha_tecnica`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`doc_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calendario`
--
ALTER TABLE `calendario`
  MODIFY `id_calendario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ficha_tecnica`
--
ALTER TABLE `ficha_tecnica`
  MODIFY `id_ficha_tecnica` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `mensualidad`
--
ALTER TABLE `mensualidad`
  MODIFY `id_mensualidad` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rendimiento`
--
ALTER TABLE `rendimiento`
  MODIFY `id_rendimiento` int(4) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD CONSTRAINT `calendario_ibfk_1` FOREIGN KEY (`funcionario`) REFERENCES `funcionario` (`id_funcionario`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`funcionario`) REFERENCES `funcionario` (`id_funcionario`),
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `ficha_tecnica`
--
ALTER TABLE `ficha_tecnica`
  ADD CONSTRAINT `ficha_tecnica_ibfk_1` FOREIGN KEY (`estudiante`) REFERENCES `estudiante` (`no_documento`);

--
-- Filtros para la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`doc_usuario`);

--
-- Filtros para la tabla `mensualidad`
--
ALTER TABLE `mensualidad`
  ADD CONSTRAINT `mensualidad_ibfk_1` FOREIGN KEY (`estudiante`) REFERENCES `estudiante` (`no_documento`),
  ADD CONSTRAINT `mensualidad_ibfk_2` FOREIGN KEY (`funcionario`) REFERENCES `funcionario` (`id_funcionario`);

--
-- Filtros para la tabla `rendimiento`
--
ALTER TABLE `rendimiento`
  ADD CONSTRAINT `rendimiento_ibfk_1` FOREIGN KEY (`ficha_tecnica`) REFERENCES `ficha_tecnica` (`id_ficha_tecnica`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
