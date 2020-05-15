-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2020 a las 02:19:53
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyec_nutricion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controles`
--

CREATE TABLE `controles` (
  `idControl` int(10) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `idMedicamento` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `siguiente` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `controles`
--

INSERT INTO `controles` (`idControl`, `idUsuario`, `tipo`, `idMedicamento`, `fecha`, `siguiente`) VALUES
(21, 60, 'azucar', 11, '2020-05-22', '2020-05-15'),
(22, 61, 'fiebre', 12, '2020-05-22', '2020-05-21'),
(23, 63, 'gripe', 12, '2020-05-06', '2020-05-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

CREATE TABLE `horas` (
  `numero` int(10) NOT NULL,
  `tiempo` varchar(30) NOT NULL,
  `idHora` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horas`
--

INSERT INTO `horas` (`numero`, `tiempo`, `idHora`) VALUES
(1, 'Desayuno', 1),
(2, 'Almuerzo', 2),
(3, 'cena', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(303) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `correo`, `usuario`, `clave`) VALUES
(12, 'geovan8@gmail.com', 'kevin', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413'),
(13, 'hsmsjs@hdhd.com', 'oscar', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `codigom` varchar(15) NOT NULL,
  `nombrem` varchar(20) NOT NULL,
  `cantidad` varchar(50) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `ingreso` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `registro` date NOT NULL,
  `idMedicamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`codigom`, `nombrem`, `cantidad`, `tipo`, `ingreso`, `fecha`, `registro`, `idMedicamento`) VALUES
('ft3', 'acetaminofen', '52', 'dolores', 'propio', '2020-05-29', '0000-00-00', 11),
('uf7', 'sudagrip', '15', 'gripe', 'propio', '2020-05-27', '0000-00-00', 12),
('fy7', 'anestecia', '52', 'dolores', 'propios', '2020-05-15', '2020-05-04', 13),
('01', 'Ninguno', '4', 'na', 'na', '2020-05-29', '2020-05-29', 14),
('dd14', 'acetaminofen', '50', 'dolores', 'donacion', '2020-05-03', '2020-05-22', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutriciones`
--

CREATE TABLE `nutriciones` (
  `idNutricion` int(10) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `idReceta` int(10) NOT NULL,
  `idHora` int(10) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nutriciones`
--

INSERT INTO `nutriciones` (`idNutricion`, `idUsuario`, `idReceta`, `idHora`, `fecha`) VALUES
(1, 13, 4, 3, '2020-04-10'),
(3, 14, 3, 2, '2020-04-15'),
(4, 28, 8, 2, '2020-05-13'),
(6, 16, 5, 3, '2020-05-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` varchar(40) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `registro` date NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `nombre`, `cantidad`, `tipo`, `fecha`, `registro`, `idProducto`) VALUES
('PR01', 'Lonja', '25', 'carne blanda', '2020-05-15', '0000-00-00', 4),
('PR03', 'Acetaminofen', '250', 'medicamentos', '2020-07-18', '0000-00-00', 7),
('PR05', 'Queso', '58', 'Lacteos', '2020-05-29', '0000-00-00', 12),
('PR06', 'Pollo', '45', 'Carne Blanda', '2020-05-29', '0000-00-00', 13),
('PR07', 'Arroz', '78', 'Granos', '2020-06-19', '0000-00-00', 16),
('PR08', 'Frijoles', '78', 'Granos', '2020-05-22', '0000-00-00', 17),
('PR09', 'Fresas', '23', 'Fruta', '2020-05-14', '0000-00-00', 18),
('PR10', 'Papaya', '5', 'Fruta', '2020-05-07', '0000-00-00', 19),
('PR11', 'Tomate', '12', 'Verdura', '2020-05-07', '0000-00-00', 20),
('PRus5', 'acetaminofen', '100', 'medicamento', '2024-01-20', '0000-00-00', 21),
('ufr', 'sodas', '52', 'antidiabeticos', '2020-05-07', '2020-05-28', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `codigo` varchar(10) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `ingrediente` varchar(100) NOT NULL,
  `informacion` varchar(100) NOT NULL,
  `registro` date NOT NULL,
  `idReceta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`codigo`, `nombres`, `ingrediente`, `informacion`, `registro`, `idReceta`) VALUES
('RC01', 'Lonja', 'Lonja, tomates, arroz', '2h de preparación', '0000-00-00', 3),
('usua11', 'carne', 'agua', 'xkjk', '0000-00-00', 5),
('usis225', 'agua', 'aseite', 'kskjk', '0000-00-00', 6),
('RC05', 'Pescado', 'Pescado, tomate, arroz', 'Tiempo de preparacion 2h', '0000-00-00', 8),
('frt74', 'carne', 'carne y sal', 'receta para todos', '2020-05-05', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `edad` date NOT NULL,
  `inicial` varchar(10) NOT NULL,
  `libras` varchar(50) NOT NULL,
  `fechaini` date NOT NULL,
  `actual` varchar(10) NOT NULL,
  `fechaac` date NOT NULL,
  `idMedicamento` int(10) NOT NULL,
  `enfermedad` varchar(100) NOT NULL,
  `nacimiento` varchar(10) NOT NULL,
  `observacion` varchar(100) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `nombre`, `edad`, `inicial`, `libras`, `fechaini`, `actual`, `fechaac`, `idMedicamento`, `enfermedad`, `nacimiento`, `observacion`, `idUsuario`) VALUES
('ft2', 'melisa alvarado gutierez', '1910-10-09', '14lb', '', '2020-05-06', 'Femenino', '2020-05-20', 11, 'n/a', '110', 'paracetamol', 60),
('f47', 'oscar', '1969-12-12', '14', 'Libras', '2020-05-06', 'Masculino', '2020-05-29', 11, 'azucar', '51', 'n/a', 61),
('t7f', 'carlos', '1969-12-19', '14', 'Kilogramos', '2020-05-07', 'Masculino', '2020-05-22', 11, 'gastritis', '51', 'al paracetamol', 62),
('ft47', 'carmela', '1969-12-04', '14', 'Libras', '2020-05-07', 'Femenino', '2020-05-02', 11, 'Ninguna', '51', 'acetaminofen', 63),
('yt7', 'carmen zosa alvarado', '1969-11-21', '15', 'Libras', '2020-05-14', 'Femenino', '2020-05-21', 11, 'Ninguna', '51', 'alergica', 64),
('ftre7', 'emilia', '1969-12-05', '14', 'Libras', '2020-05-08', 'Masculino', '2020-05-22', 11, 'Ninguna', '51', 'asetaminofen', 65);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `controles`
--
ALTER TABLE `controles`
  ADD PRIMARY KEY (`idControl`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idMedicamento` (`idMedicamento`);

--
-- Indices de la tabla `horas`
--
ALTER TABLE `horas`
  ADD PRIMARY KEY (`idHora`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`idMedicamento`);

--
-- Indices de la tabla `nutriciones`
--
ALTER TABLE `nutriciones`
  ADD PRIMARY KEY (`idNutricion`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idReceta` (`idReceta`),
  ADD KEY `idHora` (`idHora`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`idReceta`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `idMedicamento` (`idMedicamento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `controles`
--
ALTER TABLE `controles`
  MODIFY `idControl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `horas`
--
ALTER TABLE `horas`
  MODIFY `idHora` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `idMedicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `nutriciones`
--
ALTER TABLE `nutriciones`
  MODIFY `idNutricion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `idReceta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
