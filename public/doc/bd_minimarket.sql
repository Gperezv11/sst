-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2020 a las 05:52:10
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_minimarket`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `rut_cliente` varchar(12) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`rut_cliente`, `nombre`, `apellido`, `edad`) VALUES
('12', 'max', 'lillo', 40),
('19878531-8', 'Maximiliano', 'Lillo', 22),
('9547157-4', 'Maria', 'Fuentes', 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `cod_venta` int(11) NOT NULL,
  `cod_detalle` int(11) NOT NULL,
  `cod_productos` int(11) NOT NULL,
  `rut_usuario` varchar(12) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`cod_venta`, `cod_detalle`, `cod_productos`, `rut_usuario`, `fecha`) VALUES
(1, 1, 3, '19547125-8', '2020-11-27'),
(1, 2, 1, '19547125-8', '2020-11-27'),
(1, 3, 2, '19547125-8', '2020-11-27'),
(2, 1, 7, '19547125-8', '2020-11-27'),
(2, 2, 1, '19547125-8', '2020-11-27'),
(2, 3, 10, '19547125-8', '2020-11-27'),
(2, 4, 9, '19547125-8', '2020-11-27'),
(3, 1, 1, '19547125-8', '2020-11-27'),
(3, 2, 2, '19547125-8', '2020-11-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE `entrega` (
  `cod_entrega` int(11) NOT NULL,
  `cod_productos` int(11) NOT NULL,
  `rut_pro` varchar(30) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrega`
--

INSERT INTO `entrega` (`cod_entrega`, `cod_productos`, `rut_pro`, `fecha`) VALUES
(1, 3, '15457854-7', '2020-11-27'),
(1, 7, '15457854-7', '2020-11-27'),
(1, 8, '15457854-7', '2020-11-27'),
(2, 1, '13458784-2', '2020-11-27'),
(2, 2, '13458784-2', '2020-11-27'),
(2, 4, '13458784-2', '2020-11-27'),
(2, 5, '13458784-2', '2020-11-27'),
(2, 6, '13458784-2', '2020-11-27'),
(2, 9, '13458784-2', '2020-11-27'),
(3, 1, '13458784-2', '2020-11-27'),
(3, 2, '13458784-2', '2020-11-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega_temporal`
--

CREATE TABLE `entrega_temporal` (
  `codigo` int(11) NOT NULL,
  `proveedor` varchar(50) NOT NULL,
  `producto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `cod_productos` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `precio` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `rut_usuario` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`cod_productos`, `nombre`, `precio`, `stock`, `rut_usuario`) VALUES
(1, 'Azucar', 1000, 49, '20458784-4'),
(2, 'Aceite', 1200, 19, '20458784-4'),
(3, 'Bebida coca-cola 3L', 1600, 50, '20458784-4'),
(4, 'Jugo sprim', 150, 50, '20458784-4'),
(5, 'Sal', 600, 40, '20458784-4'),
(6, 'Mayonesa 900 gr.', 1300, 50, '20458784-4'),
(7, 'Bebida Fanta 3L', 1600, 50, '20458784-4'),
(8, 'Bebida Sprite 3L', 1600, 50, '20458784-4'),
(9, 'Margarina 250 gr', 500, 25, '20458784-4'),
(10, 'Manjar 500 gr.', 1000, 15, '20458784-4'),
(11, 'tapsin caliente dia', 600, 50, '20458784-4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `rut_pro` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `telefono` int(11) NOT NULL,
  `rut_usuario` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`rut_pro`, `nombre`, `correo`, `telefono`, `rut_usuario`) VALUES
('13458784-2', 'La oferta', 'laoferta@gmail.com', 947812512, '20458784-4'),
('15457854-7', 'Coca-Cola', 'coca.cola@gmail.com', 947512545, '20458784-4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporal`
--

CREATE TABLE `temporal` (
  `codigo` int(11) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `cliente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `cod_tipo_u` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`cod_tipo_u`, `nombre`) VALUES
(1, 'administrador'),
(2, 'vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `rut_usuario` varchar(12) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `nom_usuario` varchar(30) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `cod_tipo_u` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`rut_usuario`, `nombre`, `apellido`, `nom_usuario`, `pass`, `cod_tipo_u`) VALUES
('19547125-8', 'Lucia', 'Antillanca', 'luci.lla', 'antillanca.1980', 2),
('20458784-4', 'Nataly', 'Antillanca', 'nataly.anti', 'nat.2000', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `cod_venta` int(11) NOT NULL,
  `cant_productos` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `hora` time NOT NULL DEFAULT current_timestamp(),
  `valor_total` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `rut_cliente` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`cod_venta`, `cant_productos`, `fecha`, `hora`, `valor_total`, `descuento`, `rut_cliente`) VALUES
(1, 20, '2020-11-27', '14:23:54', 10000, 0, '19878531-8'),
(2, 10, '2020-11-27', '14:23:54', 20000, 2500, '9547157-4'),
(3, 2, '2020-11-27', '15:28:18', 2200, 0, '12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`rut_cliente`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`cod_venta`,`cod_detalle`),
  ADD KEY `cod_productos` (`cod_productos`),
  ADD KEY `rut_usuario` (`rut_usuario`);

--
-- Indices de la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`cod_entrega`,`cod_productos`),
  ADD KEY `cod_productos` (`cod_productos`),
  ADD KEY `rut_pro` (`rut_pro`);

--
-- Indices de la tabla `entrega_temporal`
--
ALTER TABLE `entrega_temporal`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`cod_productos`),
  ADD KEY `rut_usuario` (`rut_usuario`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`rut_pro`),
  ADD KEY `rut_usuario` (`rut_usuario`);

--
-- Indices de la tabla `temporal`
--
ALTER TABLE `temporal`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`cod_tipo_u`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`rut_usuario`),
  ADD KEY `cod_tipo_u` (`cod_tipo_u`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`cod_venta`),
  ADD KEY `rut_cliente` (`rut_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entrega_temporal`
--
ALTER TABLE `entrega_temporal`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `cod_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `cod_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`cod_venta`) REFERENCES `venta` (`cod_venta`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`cod_productos`) REFERENCES `producto` (`cod_productos`),
  ADD CONSTRAINT `detalle_venta_ibfk_3` FOREIGN KEY (`rut_usuario`) REFERENCES `usuario` (`rut_usuario`);

--
-- Filtros para la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD CONSTRAINT `entrega_ibfk_1` FOREIGN KEY (`cod_productos`) REFERENCES `producto` (`cod_productos`),
  ADD CONSTRAINT `entrega_ibfk_2` FOREIGN KEY (`rut_pro`) REFERENCES `proveedor` (`rut_pro`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`rut_usuario`) REFERENCES `usuario` (`rut_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
