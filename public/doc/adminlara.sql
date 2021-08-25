-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2021 a las 22:57:14
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `adminlara`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `url_contrato_archivo` varchar(240) DEFAULT 'null',
  `url_anexo_archivo` varchar(240) DEFAULT 'null',
  `url_finiquito_archivo` varchar(240) DEFAULT 'null',
  `url_honorario_contrato` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodegas`
--

CREATE TABLE `bodegas` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bodegas`
--

INSERT INTO `bodegas` (`id`, `nombre`, `abreviatura`, `created_at`, `updated_at`) VALUES
(0, 'nn', 'PrdT', '2021-07-28 10:48:03', '2021-07-28 14:47:12'),
(1, 'Bodega 1', 'B1', '2021-07-07 09:18:22', '2021-07-07 09:18:22'),
(2, 'Bodega 2', 'B2', '2021-07-07 09:18:36', '2021-07-07 09:18:36'),
(4, 'Rengifo', 'Ren', '2021-07-07 17:49:57', '2021-07-07 17:49:57'),
(5, 'COTELE RENGIGO', 'CR', '2021-07-19 20:11:31', '2021-07-19 20:11:31'),
(6, 'RSQ', 'RSQ', '2021-07-19 21:23:49', '2021-07-19 21:23:49'),
(7, 'ARCNAGEL MATRIZ', 'AM', '2021-07-26 18:04:54', '2021-07-26 18:04:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario_events`
--

CREATE TABLE `calendario_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evento_nombre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evento_inicio` date NOT NULL,
  `evento_termino` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `calendario_events`
--

INSERT INTO `calendario_events` (`id`, `evento_nombre`, `evento_inicio`, `evento_termino`, `created_at`, `updated_at`) VALUES
(12, 'jesus', '2021-06-30', '2021-07-01', '2021-07-01 00:58:50', '2021-07-01 00:58:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` bigint(20) NOT NULL,
  `nombre_cargos` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `nombre_cargos`) VALUES
(1, 'Gerente'),
(2, 'Secretario(a)'),
(3, 'Administrativo'),
(4, 'Conserje'),
(5, 'Cocinero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `abreviatura`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'Panaderia', 'C1', 'pan-150x150.jpg', '2021-06-30 08:23:02', '2021-07-26 18:54:54'),
(2, 'Bebidas Alcoholicas', 'c2', 'alcohol.jpg', '2021-06-30 08:23:16', '2021-07-26 18:54:04'),
(3, 'Bebidas', 'C3', 'bebidas.jpg', '2021-06-30 08:23:28', '2021-07-26 18:53:43'),
(4, 'Carnes', 'CAR', 'TC.jfif', '2021-06-30 18:03:21', '2021-07-27 17:59:11'),
(5, 'Cocteles', 'COC', 'TC.jfif', '2021-07-27 17:52:28', '2021-07-27 17:52:28'),
(6, 'JUGOS', 'J', 'jugos.jfif', '2021-07-29 22:55:33', '2021-07-29 22:55:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comandas`
--

CREATE TABLE `comandas` (
  `id` bigint(20) NOT NULL,
  `rut_empresa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suc_empresa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lista_precio_id` bigint(20) DEFAULT NULL,
  `bodega_id` bigint(20) DEFAULT NULL,
  `vendedor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `propina` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `descuento` float DEFAULT NULL,
  `tipo_descuento` tinyint(4) DEFAULT NULL,
  `medio_pago` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `comandas`
--

INSERT INTO `comandas` (`id`, `rut_empresa`, `suc_empresa`, `lista_precio_id`, `bodega_id`, `vendedor`, `estado`, `propina`, `total`, `descuento`, `tipo_descuento`, `medio_pago`, `created_at`, `updated_at`) VALUES
(9, NULL, NULL, NULL, NULL, NULL, 0, 380, 3800, NULL, NULL, NULL, '2021-07-20 02:08:01', '2021-07-20 02:09:48'),
(10, NULL, NULL, 7, 6, NULL, 3, 4155, 41550, NULL, NULL, NULL, '2021-07-20 02:26:37', '2021-07-20 02:35:03'),
(11, NULL, NULL, 7, 6, NULL, 3, 3775, 37750, NULL, NULL, NULL, '2021-07-20 02:35:04', '2021-07-20 06:40:02'),
(12, NULL, NULL, NULL, NULL, NULL, 3, 3965, 39650, NULL, NULL, NULL, '2021-07-20 06:40:02', '2021-07-20 15:28:11'),
(13, NULL, NULL, 7, 6, NULL, 3, 7930, 79300, NULL, NULL, NULL, '2021-07-20 15:28:12', '2021-07-20 15:43:12'),
(14, NULL, NULL, 7, 6, NULL, 3, 7910, 79100, NULL, NULL, NULL, '2021-07-20 15:43:12', '2021-07-20 15:49:05'),
(15, NULL, NULL, 7, 6, NULL, 3, 3940, 39400, NULL, NULL, NULL, '2021-07-20 15:49:05', '2021-07-20 15:54:20'),
(16, NULL, NULL, 7, 6, NULL, 3, 3940, 39400, NULL, NULL, NULL, '2021-07-20 15:54:21', '2021-07-20 15:56:09'),
(17, NULL, NULL, 7, 6, NULL, 3, 5340, 53400, NULL, NULL, NULL, '2021-07-20 15:56:09', '2021-07-20 17:48:50'),
(18, NULL, NULL, 7, 6, NULL, 3, 3965, 39650, NULL, NULL, 'tarjeta', '2021-07-20 17:48:50', '2021-07-21 22:17:44'),
(19, NULL, NULL, 7, 6, NULL, 3, 9925, 99250, NULL, NULL, 'tarjeta', '2021-07-21 22:18:03', '2021-07-21 22:19:02'),
(20, NULL, NULL, 7, 6, NULL, 3, 6273, 62732, NULL, NULL, 'efectivo', '2021-07-22 17:18:07', '2021-07-22 17:21:01'),
(21, NULL, NULL, 7, 6, NULL, 3, 3750, 37500, NULL, NULL, 'efectivo', '2021-07-22 17:22:58', '2021-07-22 17:40:52'),
(22, NULL, NULL, 7, 6, NULL, 3, 0, 133600, NULL, NULL, 'tarjeta', '2021-07-22 17:41:05', '2021-07-26 16:31:54'),
(23, NULL, NULL, NULL, NULL, NULL, 3, 0, 70840, NULL, NULL, 'tarjeta', '2021-07-26 16:32:05', '2021-07-26 16:41:00'),
(24, NULL, NULL, NULL, NULL, NULL, 3, 0, 500, NULL, NULL, 'efectivo', '2021-07-26 16:41:09', '2021-07-26 17:45:37'),
(25, NULL, NULL, NULL, NULL, NULL, 3, 0, 125, NULL, NULL, 'tarjeta', '2021-07-26 17:45:53', '2021-07-26 19:16:22'),
(26, NULL, NULL, NULL, NULL, NULL, 3, 0, 250, NULL, NULL, 'efectivo', '2021-07-26 19:16:27', '2021-07-26 20:27:53'),
(27, NULL, NULL, NULL, NULL, NULL, 3, 0, 70840, NULL, NULL, 'tarjeta', '2021-07-26 20:28:07', '2021-07-26 21:02:53'),
(28, NULL, NULL, NULL, NULL, NULL, 3, 0, 16475, NULL, NULL, 'efectivo', '2021-07-26 21:02:58', '2021-07-26 21:40:47'),
(29, NULL, NULL, NULL, NULL, NULL, 3, 0, 500, NULL, NULL, 'efectivo', '2021-07-26 21:46:46', '2021-07-27 17:32:27'),
(30, NULL, NULL, NULL, NULL, NULL, 3, 0, 200, NULL, NULL, 'efectivo', '2021-07-27 17:41:51', '2021-07-27 17:55:33'),
(31, NULL, NULL, NULL, NULL, NULL, 3, 0, 5757, NULL, NULL, 'tarjeta', '2021-07-27 17:55:43', '2021-07-29 03:59:37'),
(32, NULL, NULL, NULL, NULL, NULL, 3, 0, 77499, 0, NULL, NULL, '2021-07-29 04:00:11', '2021-07-29 17:24:10'),
(33, NULL, NULL, NULL, NULL, NULL, 3, NULL, 38900, 500, NULL, NULL, '2021-07-29 17:24:11', '2021-07-29 18:01:19'),
(34, NULL, NULL, NULL, NULL, NULL, 3, NULL, 11275, 500, NULL, NULL, '2021-07-29 18:01:22', '2021-07-29 18:19:52'),
(35, NULL, NULL, 0, 0, NULL, 3, NULL, 14566, 50, NULL, NULL, '2021-07-29 18:19:56', '2021-07-29 20:24:34'),
(36, NULL, NULL, NULL, NULL, NULL, 3, NULL, 90172, 800, NULL, NULL, '2021-07-29 20:24:38', '2021-07-29 22:34:14'),
(37, NULL, NULL, NULL, NULL, NULL, 3, NULL, 13590, 10, NULL, NULL, '2021-07-29 22:34:16', '2021-07-29 23:07:59'),
(38, NULL, NULL, NULL, NULL, NULL, 4, NULL, 1500, NULL, NULL, NULL, '2021-07-29 23:08:06', '2021-07-29 23:09:39'),
(39, NULL, NULL, NULL, NULL, NULL, 4, NULL, 15960, 2740, NULL, NULL, '2021-07-29 23:09:39', '2021-07-30 00:53:06'),
(40, NULL, NULL, NULL, NULL, NULL, 3, NULL, 30300, 0, NULL, NULL, '2021-07-30 00:53:07', '2021-07-30 01:04:45'),
(41, NULL, NULL, NULL, NULL, NULL, 3, NULL, 30900, NULL, NULL, NULL, '2021-07-30 01:04:47', '2021-07-30 02:21:23'),
(42, NULL, NULL, NULL, NULL, NULL, 3, NULL, 1500, 0, NULL, NULL, '2021-07-30 02:21:25', '2021-07-30 19:50:07'),
(43, NULL, NULL, NULL, NULL, NULL, 3, NULL, 4250, 50, 1, NULL, '2021-07-30 19:50:10', '2021-07-31 23:02:05'),
(44, NULL, NULL, 1, 1, NULL, 3, NULL, 18575, 8.5, 1, NULL, '2021-07-31 23:02:10', '2021-08-02 16:25:57'),
(45, NULL, NULL, NULL, NULL, NULL, 4, NULL, 41700, NULL, NULL, NULL, '2021-08-02 16:26:00', '2021-08-02 18:19:06'),
(46, NULL, NULL, NULL, NULL, NULL, 3, NULL, 23490, 10, 1, NULL, '2021-08-02 18:19:06', '2021-08-02 18:22:14'),
(47, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1090, NULL, NULL, NULL, '2021-08-02 18:22:20', '2021-08-02 18:25:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunas`
--

CREATE TABLE `comunas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `comunas`
--

INSERT INTO `comunas` (`id`, `nombre`, `region_id`, `created_at`, `updated_at`) VALUES
(1, 'Arica', 1, NULL, NULL),
(2, 'Camarones', 1, NULL, NULL),
(3, 'General Lagos', 1, NULL, NULL),
(4, 'Putre', 1, NULL, NULL),
(5, 'Alto Hospicio', 2, NULL, NULL),
(6, 'Iquique', 2, NULL, NULL),
(7, 'Camiña', 2, NULL, NULL),
(8, 'Colchane', 2, NULL, NULL),
(9, 'Huara', 2, NULL, NULL),
(10, 'Pica', 2, NULL, NULL),
(11, 'Pozo Almonte', 2, NULL, NULL),
(12, 'Antofagasta', 3, NULL, NULL),
(13, 'Mejillones', 3, NULL, NULL),
(14, 'Sierra Gorda', 3, NULL, NULL),
(15, 'Taltal', 3, NULL, NULL),
(16, 'Calama', 3, NULL, NULL),
(17, 'Ollague', 3, NULL, NULL),
(18, 'San Pedro de Atacama', 3, NULL, NULL),
(19, 'María Elena', 3, NULL, NULL),
(20, 'Tocopilla', 3, NULL, NULL),
(21, 'Chañaral', 3, NULL, NULL),
(22, 'Diego de Almagro', 4, NULL, NULL),
(23, 'Caldera', 4, NULL, NULL),
(24, 'Copiapó', 4, NULL, NULL),
(25, 'Tierra Amarilla', 4, NULL, NULL),
(26, 'Alto del Carmen', 4, NULL, NULL),
(27, 'Freirina', 4, NULL, NULL),
(28, 'Huasco', 4, NULL, NULL),
(29, 'Vallenar', 4, NULL, NULL),
(30, 'Canela', 5, NULL, NULL),
(31, 'Illapel', 5, NULL, NULL),
(32, 'Los Vilos', 5, NULL, NULL),
(33, 'Salamanca', 5, NULL, NULL),
(34, 'Andacollo', 5, NULL, NULL),
(35, 'Coquimbo', 5, NULL, NULL),
(36, 'La Higuera', 5, NULL, NULL),
(37, 'La Serena', 5, NULL, NULL),
(38, 'Paihuaco', 5, NULL, NULL),
(39, 'Vicuña', 5, NULL, NULL),
(40, 'Combarbalá', 5, NULL, NULL),
(41, 'Monte Patria', 5, NULL, NULL),
(42, 'Ovalle', 5, NULL, NULL),
(43, 'Punitaqui', 5, NULL, NULL),
(44, 'Río Hurtado', 15, NULL, NULL),
(45, 'Isla de Pascua', 6, NULL, NULL),
(46, 'Calle Larga', 6, NULL, NULL),
(47, 'Los Andes', 6, NULL, NULL),
(48, 'Rinconada', 6, NULL, NULL),
(49, 'San Esteban', 6, NULL, NULL),
(50, 'La Ligua', 6, NULL, NULL),
(51, 'Papudo', 6, NULL, NULL),
(52, 'Petorca', 6, NULL, NULL),
(53, 'Zapallar', 6, NULL, NULL),
(54, 'Hijuelas', 6, NULL, NULL),
(55, 'La Calera', 6, NULL, NULL),
(56, 'La Cruz', 6, NULL, NULL),
(57, 'Limache', 6, NULL, NULL),
(58, 'Nogales', 6, NULL, NULL),
(59, 'Olmué', 6, NULL, NULL),
(60, 'Quillota', 6, NULL, NULL),
(61, 'Algarrobo', 6, NULL, NULL),
(62, 'Cartagena', 6, NULL, NULL),
(63, 'El Quisco', 6, NULL, NULL),
(64, 'El Tabo', 6, NULL, NULL),
(65, 'San Antonio', 6, NULL, NULL),
(66, 'Santo Domingo', 6, NULL, NULL),
(67, 'Catemu', 6, NULL, NULL),
(68, 'Llaillay', 6, NULL, NULL),
(69, 'Panquehue', 6, NULL, NULL),
(70, 'Putaendo', 6, NULL, NULL),
(71, 'San Felipe', 6, NULL, NULL),
(72, 'Santa María', 6, NULL, NULL),
(73, 'Casablanca', 6, NULL, NULL),
(74, 'Concón', 6, NULL, NULL),
(75, 'Juan Fernández', 6, NULL, NULL),
(76, 'Puchuncaví', 6, NULL, NULL),
(77, 'Quilpué', 6, NULL, NULL),
(78, 'Quintero', 6, NULL, NULL),
(79, 'Valparaíso', 6, NULL, NULL),
(80, 'Villa Alemana', 6, NULL, NULL),
(81, 'Viña del Mar', 6, NULL, NULL),
(82, 'Colina', 7, NULL, NULL),
(83, 'Lampa', 7, NULL, NULL),
(84, 'Tiltil', 7, NULL, NULL),
(85, 'Pirque', 7, NULL, NULL),
(86, 'Puente Alto', 7, NULL, NULL),
(87, 'San José de Maipo', 7, NULL, NULL),
(88, 'Buin', 7, NULL, NULL),
(89, 'Calera de Tango', 7, NULL, NULL),
(90, 'Paine', 7, NULL, NULL),
(91, 'San Bernardo', 7, NULL, NULL),
(92, 'Alhué', 7, NULL, NULL),
(93, 'Curacaví', 7, NULL, NULL),
(94, 'María Pinto', 7, NULL, NULL),
(95, 'Melipilla', 7, NULL, NULL),
(96, 'San Pedro', 7, NULL, NULL),
(97, 'Cerrillos', 7, NULL, NULL),
(98, 'Cerro Navia', 7, NULL, NULL),
(99, 'Conchalí', 7, NULL, NULL),
(100, 'El Bosque', 7, NULL, NULL),
(101, 'Estación Central', 7, NULL, NULL),
(102, 'Huechuraba', 7, NULL, NULL),
(103, 'Independencia', 7, NULL, NULL),
(104, 'La Cisterna', 7, NULL, NULL),
(105, 'La Granja', 7, NULL, NULL),
(106, 'La Florida', 7, NULL, NULL),
(107, 'La Pintana', 7, NULL, NULL),
(108, 'La Reina', 7, NULL, NULL),
(109, 'Las Condes', 7, NULL, NULL),
(110, 'Lo Barnechea', 7, NULL, NULL),
(111, 'Lo Espejo', 7, NULL, NULL),
(112, 'Lo Prado', 7, NULL, NULL),
(113, 'Macul', 7, NULL, NULL),
(114, 'Maipú', 7, NULL, NULL),
(115, 'Ñuñoa', 7, NULL, NULL),
(116, 'Pedro Aguirre Cerda', 7, NULL, NULL),
(117, 'Peñalolén', 7, NULL, NULL),
(118, 'Providencia', 7, NULL, NULL),
(119, 'Pudahuel', 7, NULL, NULL),
(120, 'Quilicura', 7, NULL, NULL),
(121, 'Quinta Normal', 7, NULL, NULL),
(122, 'Recoleta', 7, NULL, NULL),
(123, 'Renca', 7, NULL, NULL),
(124, 'San Miguel', 7, NULL, NULL),
(125, 'San Joaquín', 7, NULL, NULL),
(126, 'San Ramón', 7, NULL, NULL),
(127, 'Santiago', 7, NULL, NULL),
(128, 'Vitacura', 7, NULL, NULL),
(129, 'El Monte', 7, NULL, NULL),
(130, 'Isla de Maipo', 7, NULL, NULL),
(131, 'Padre Hurtado', 7, NULL, NULL),
(132, 'Peñaflor', 7, NULL, NULL),
(133, 'Talagante', 7, NULL, NULL),
(134, 'Codegua', 8, NULL, NULL),
(135, 'Coínco', 8, NULL, NULL),
(136, 'Coltauco', 8, NULL, NULL),
(137, 'Doñihue', 8, NULL, NULL),
(138, 'Graneros', 8, NULL, NULL),
(139, 'Las Cabras', 8, NULL, NULL),
(140, 'Machalí', 8, NULL, NULL),
(141, 'Malloa', 8, NULL, NULL),
(142, 'Mostazal', 8, NULL, NULL),
(143, 'Olivar', 8, NULL, NULL),
(144, 'Peumo', 8, NULL, NULL),
(145, 'Pichidegua', 8, NULL, NULL),
(146, 'Quinta de Tilcoco', 8, NULL, NULL),
(147, 'Rancagua', 8, NULL, NULL),
(148, 'Rengo', 8, NULL, NULL),
(149, 'Requínoa', 8, NULL, NULL),
(150, 'San Vicente de Tagua Tagua', 8, NULL, NULL),
(151, 'La Estrella', 8, NULL, NULL),
(152, 'Litueche', 8, NULL, NULL),
(153, 'Marchihue', 8, NULL, NULL),
(154, 'Navidad', 8, NULL, NULL),
(155, 'Peredones', 8, NULL, NULL),
(156, 'Pichilemu', 8, NULL, NULL),
(157, 'Chépica', 8, NULL, NULL),
(158, 'Chimbarongo', 8, NULL, NULL),
(159, 'Lolol', 8, NULL, NULL),
(160, 'Nancagua', 8, NULL, NULL),
(161, 'Palmilla', 8, NULL, NULL),
(162, 'Peralillo', 8, NULL, NULL),
(163, 'Placilla', 8, NULL, NULL),
(164, 'Pumanque', 8, NULL, NULL),
(165, 'San Fernando', 8, NULL, NULL),
(166, 'Santa Cruz', 8, NULL, NULL),
(167, 'Cauquenes', 9, NULL, NULL),
(168, 'Chanco', 9, NULL, NULL),
(169, 'Pelluhue', 9, NULL, NULL),
(170, 'Curicó', 9, NULL, NULL),
(171, 'Hualañé', 9, NULL, NULL),
(172, 'Licantén', 9, NULL, NULL),
(173, 'Molina', 9, NULL, NULL),
(174, 'Rauco', 9, NULL, NULL),
(175, 'Romeral', 9, NULL, NULL),
(176, 'Sagrada Familia', 9, NULL, NULL),
(177, 'Teno', 9, NULL, NULL),
(178, 'Vichuquén', 9, NULL, NULL),
(179, 'Colbún', 9, NULL, NULL),
(180, 'Linares', 9, NULL, NULL),
(181, 'Longaví', 9, NULL, NULL),
(182, 'Parral', 9, NULL, NULL),
(183, 'Retiro', 9, NULL, NULL),
(184, 'San Javier', 9, NULL, NULL),
(185, 'Villa Alegre', 9, NULL, NULL),
(186, 'Yerbas Buenas', 9, NULL, NULL),
(187, 'Constitución', 9, NULL, NULL),
(188, 'Curepto', 9, NULL, NULL),
(189, 'Empedrado', 9, NULL, NULL),
(190, 'Maule', 9, NULL, NULL),
(191, 'Pelarco', 9, NULL, NULL),
(192, 'Pencahue', 9, NULL, NULL),
(193, 'Río Claro', 9, NULL, NULL),
(194, 'San Clemente', 9, NULL, NULL),
(195, 'San Rafael', 9, NULL, NULL),
(196, 'Talca', 9, NULL, NULL),
(197, 'Arauco', 10, NULL, NULL),
(198, 'Cañete', 10, NULL, NULL),
(199, 'Contulmo', 10, NULL, NULL),
(200, 'Curanilahue', 10, NULL, NULL),
(201, 'Lebu', 10, NULL, NULL),
(202, 'Los Álamos', 10, NULL, NULL),
(203, 'Tirúa', 10, NULL, NULL),
(204, 'Alto Biobío', 10, NULL, NULL),
(205, 'Antuco', 10, NULL, NULL),
(206, 'Cabrero', 10, NULL, NULL),
(207, 'Laja', 10, NULL, NULL),
(208, 'Los Ángeles', 10, NULL, NULL),
(209, 'Mulchén', 10, NULL, NULL),
(210, 'Nacimiento', 10, NULL, NULL),
(211, 'Negrete', 10, NULL, NULL),
(212, 'Quilaco', 10, NULL, NULL),
(213, 'Quilleco', 10, NULL, NULL),
(214, 'San Rosendo', 10, NULL, NULL),
(215, 'Santa Bárbara', 10, NULL, NULL),
(216, 'Tucapel', 10, NULL, NULL),
(217, 'Yumbel', 10, NULL, NULL),
(218, 'Chiguayante', 10, NULL, NULL),
(219, 'Concepción', 10, NULL, NULL),
(220, 'Coronel', 10, NULL, NULL),
(221, 'Florida', 10, NULL, NULL),
(222, 'Hualpén', 10, NULL, NULL),
(223, 'Hualqui', 10, NULL, NULL),
(224, 'Lota', 10, NULL, NULL),
(225, 'Penco', 10, NULL, NULL),
(226, 'San Pedro de La Paz', 10, NULL, NULL),
(227, 'Santa Juana', 10, NULL, NULL),
(228, 'Talcahuano', 10, NULL, NULL),
(229, 'Tomé', 10, NULL, NULL),
(230, 'Bulnes', 10, NULL, NULL),
(231, 'Chillán', 10, NULL, NULL),
(232, 'Chillán Viejo', 10, NULL, NULL),
(233, 'Cobquecura', 10, NULL, NULL),
(234, 'Coelemu', 10, NULL, NULL),
(235, 'Coihueco', 10, NULL, NULL),
(236, 'El Carmen', 10, NULL, NULL),
(237, 'Ninhue', 10, NULL, NULL),
(238, 'Ñiquen', 10, NULL, NULL),
(239, 'Pemuco', 10, NULL, NULL),
(240, 'Pinto', 10, NULL, NULL),
(241, 'Portezuelo', 10, NULL, NULL),
(242, 'Quillón', 10, NULL, NULL),
(243, 'Quirihue', 10, NULL, NULL),
(244, 'Ránquil', 10, NULL, NULL),
(245, 'San Carlos', 10, NULL, NULL),
(246, 'San Fabián', 10, NULL, NULL),
(247, 'San Ignacio', 10, NULL, NULL),
(248, 'San Nicolás', 10, NULL, NULL),
(249, 'Treguaco', 10, NULL, NULL),
(250, 'Yungay', 10, NULL, NULL),
(251, 'Carahue', 11, NULL, NULL),
(252, 'Cholchol', 11, NULL, NULL),
(253, 'Cunco', 11, NULL, NULL),
(254, 'Curarrehue', 11, NULL, NULL),
(255, 'Freire', 11, NULL, NULL),
(256, 'Galvarino', 11, NULL, NULL),
(257, 'Gorbea', 11, NULL, NULL),
(258, 'Lautaro', 11, NULL, NULL),
(259, 'Loncoche', 11, NULL, NULL),
(260, 'Melipeuco', 11, NULL, NULL),
(261, 'Nueva Imperial', 11, NULL, NULL),
(262, 'Padre Las Casas', 11, NULL, NULL),
(263, 'Perquenco', 11, NULL, NULL),
(264, 'Pitrufquén', 11, NULL, NULL),
(265, 'Pucón', 11, NULL, NULL),
(266, 'Saavedra', 11, NULL, NULL),
(267, 'Temuco', 11, NULL, NULL),
(268, 'Teodoro Schmidt', 11, NULL, NULL),
(269, 'Toltén', 11, NULL, NULL),
(270, 'Vilcún', 11, NULL, NULL),
(271, 'Villarrica', 11, NULL, NULL),
(272, 'Angol', 11, NULL, NULL),
(273, 'Collipulli', 11, NULL, NULL),
(274, 'Curacautín', 11, NULL, NULL),
(275, 'Ercilla', 11, NULL, NULL),
(276, 'Lonquimay', 11, NULL, NULL),
(277, 'Los Sauces', 11, NULL, NULL),
(278, 'Lumaco', 11, NULL, NULL),
(279, 'Purén', 11, NULL, NULL),
(280, 'Renaico', 11, NULL, NULL),
(281, 'Traiguén', 11, NULL, NULL),
(282, 'Victoria', 11, NULL, NULL),
(283, 'Corral', 12, NULL, NULL),
(284, 'Lanco', 12, NULL, NULL),
(285, 'Los Lagos', 12, NULL, NULL),
(286, 'Máfil', 12, NULL, NULL),
(287, 'Mariquina', 12, NULL, NULL),
(288, 'Paillaco', 12, NULL, NULL),
(289, 'Panguipulli', 12, NULL, NULL),
(290, 'Valdivia', 12, NULL, NULL),
(291, 'Futrono', 12, NULL, NULL),
(292, 'La Unión', 12, NULL, NULL),
(293, 'Lago Ranco', 12, NULL, NULL),
(294, 'Río Bueno', 12, NULL, NULL),
(295, 'Ancud', 13, NULL, NULL),
(296, 'Castro', 13, NULL, NULL),
(297, 'Chonchi', 13, NULL, NULL),
(298, 'Curaco de Vélez', 13, NULL, NULL),
(299, 'Dalcahue', 13, NULL, NULL),
(300, 'Puqueldón', 13, NULL, NULL),
(301, 'Queilén', 13, NULL, NULL),
(302, 'Quemchi', 13, NULL, NULL),
(303, 'Quellón', 13, NULL, NULL),
(304, 'Quinchao', 13, NULL, NULL),
(305, 'Calbuco', 13, NULL, NULL),
(306, 'Cochamó', 13, NULL, NULL),
(307, 'Fresia', 13, NULL, NULL),
(308, 'Frutillar', 13, NULL, NULL),
(309, 'Llanquihue', 13, NULL, NULL),
(310, 'Los Muermos', 13, NULL, NULL),
(311, 'Maullín', 13, NULL, NULL),
(312, 'Puerto Montt', 13, NULL, NULL),
(313, 'Puerto Varas', 13, NULL, NULL),
(314, 'Osorno', 13, NULL, NULL),
(315, 'Puero Octay', 13, NULL, NULL),
(316, 'Purranque', 13, NULL, NULL),
(317, 'Puyehue', 13, NULL, NULL),
(318, 'Río Negro', 13, NULL, NULL),
(319, 'San Juan de la Costa', 13, NULL, NULL),
(320, 'San Pablo', 13, NULL, NULL),
(321, 'Chaitén', 13, NULL, NULL),
(322, 'Futaleufú', 13, NULL, NULL),
(323, 'Hualaihué', 13, NULL, NULL),
(324, 'Palena', 13, NULL, NULL),
(325, 'Aisén', 14, NULL, NULL),
(326, 'Cisnes', 14, NULL, NULL),
(327, 'Guaitecas', 14, NULL, NULL),
(328, 'Cochrane', 14, NULL, NULL),
(329, 'O\'higgins', 14, NULL, NULL),
(330, 'Tortel', 14, NULL, NULL),
(331, 'Coihaique', 14, NULL, NULL),
(332, 'Lago Verde', 14, NULL, NULL),
(333, 'Chile Chico', 14, NULL, NULL),
(334, 'Río Ibáñez', 14, NULL, NULL),
(335, 'Antártica', 15, NULL, NULL),
(336, 'Cabo de Hornos', 15, NULL, NULL),
(337, 'Laguna Blanca', 15, NULL, NULL),
(338, 'Punta Arenas', 15, NULL, NULL),
(339, 'Río Verde', 15, NULL, NULL),
(340, 'San Gregorio', 15, NULL, NULL),
(341, 'Porvenir', 15, NULL, NULL),
(342, 'Primavera', 15, NULL, NULL),
(343, 'Timaukel', 15, NULL, NULL),
(344, 'Natales', 15, NULL, NULL),
(345, 'Torres del Paine', 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `id` int(11) NOT NULL,
  `tipo_contrato_Id` int(11) NOT NULL,
  `fecha_ingreso_contrato` datetime NOT NULL,
  `fecha_termino_contrato` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_honorarios`
--

CREATE TABLE `detalle_honorarios` (
  `id` bigint(20) NOT NULL,
  `tipo_servicio` varchar(120) DEFAULT NULL,
  `cometario` varchar(120) DEFAULT NULL,
  `bruto` int(11) NOT NULL,
  `retencion` int(11) DEFAULT NULL,
  `liquido` int(11) DEFAULT NULL,
  `honorarios_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nombre_empresa` varchar(120) NOT NULL,
  `razon_social_empresa` varchar(120) DEFAULT NULL,
  `telefono_empresa` varchar(120) DEFAULT NULL,
  `direccion_empresa` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichaclientes`
--

CREATE TABLE `fichaclientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nacionalidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comuna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_actividad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sucursal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rut_rep_legal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_rep_legal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_sucursal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_sucursal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encargado_sucursal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_sucursal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comuna_sucursal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion_sucursal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estadoficha` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fichaclientes`
--

INSERT INTO `fichaclientes` (`id`, `email`, `direccion`, `rut`, `nombre_cliente`, `telefono`, `nacionalidad`, `region`, `comuna`, `giro`, `cod_actividad`, `sucursal`, `rut_rep_legal`, `nombre_rep_legal`, `nombre_sucursal`, `codigo_sucursal`, `encargado_sucursal`, `region_sucursal`, `comuna_sucursal`, `direccion_sucursal`, `nombre_contacto`, `telefono_contacto`, `email_contacto`, `cargo_contacto`, `imagen`, `created_at`, `updated_at`, `estadoficha`) VALUES
(1, 'dflores@sstecnologic.cl', 'direccion', '11.111.111-1', 'daniela', '342342343', 'Chilena', '7', '127', 'ventas', 'venta', 'sucursal 1', '44.444.444-4', 'representante 2', 'nombre sucursal', '001', 'encargado', '6', '51', 'iquique 123', 'contacto', '666666666', 'contacto@contacto.cl', 'admin', 'Lighthouse.jpg', '2021-06-16 21:01:36', '2021-07-02 09:48:13', '1'),
(2, 'rsq@gmail.com', 'av los primos 4', '76.863.627-3', 'SSTECNOLOGIC', '931897738', 'Chilena', '7', '88', 'DDA', 'DFAF', 'DFDFDF', '66.666.666-6', 'ROLANDO', 'casa matriz', 'CM', 'RSQ', '6', '64', 'LOS PRIMOS 4', 'ROLANDO', '931897759', 'RSQ@GMAIL.COM', 'JEFE', 'logo serviu.png', '2021-06-16 21:20:49', '2021-06-29 04:16:42', '1'),
(3, 'dflores@sstecnologic.cl', 'direccion 123', '33.333.333-3', 'cliente 3', '778789787', NULL, '11', '256', 'ventas', 'venta', 'sucursal 1', '11.111.111-1', 'representante 3', 'nombre sucursal', '001', 'encargado', '11', '269', 'iquique 123', 'contacto', '666666666', 'contacto@contacto.cl', 'admin', 'LogoDaem.png', '2021-06-18 18:54:12', '2021-06-29 04:12:18', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichapersonals`
--

CREATE TABLE `fichapersonals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rut` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_mat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_pat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fono` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comuna` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacionalidad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supervisor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proyecto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sueldo_base` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bono` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asignacion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `afp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salud` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_salud` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `tipo_contrato` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anexo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrato` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finiquito` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regla` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imple` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estadoficha` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fichapersonals`
--

INSERT INTO `fichapersonals` (`id`, `rut`, `nombre`, `apellido_mat`, `apellido_pat`, `direccion`, `fono`, `mail`, `region`, `comuna`, `nacionalidad`, `empresa`, `cargo`, `supervisor`, `proyecto`, `sueldo_base`, `bono`, `asignacion`, `afp`, `salud`, `plan_salud`, `fecha_ingreso`, `fecha_termino`, `tipo_contrato`, `imagen`, `anexo`, `contrato`, `finiquito`, `regla`, `imple`, `estadoficha`, `created_at`, `updated_at`) VALUES
(20, '17.095.843-8', 'Berenise Alejandra', 'Torres', 'Rivera', 'Mariano Latorre 16', '977755483', 'gperezv11@gmail.com', '2', '6', 'Chilena', 'GM Empresa', 'Cargo 2', 'Rolando Silva', 'Salmonera', '500.000', '0', 'Placeat omnis est', 'Provida', 'Fonasa', '0', '2021-06-01', '2021-06-30', 'Fijo', 'Celular 1.png', 'Sin Archivo', 'dummy.pdf', 'Sin Archivo', 'Sin Archivo', 'Sin Archivo', '0', '2021-06-11 21:52:29', '2021-06-18 10:24:00'),
(21, '16.636.149-4', 'Voluptatem Officiis', 'Nemo veniam sed ex', 'Qui pariatur Sit no', 'Qui et est dolore iu', 'Fugit a error non i', 'zezylydy@mailinator.com', '2', '6', 'Chilena', 'Buses Mayorga', 'Cargo 1', 'Rolando Silva', 'Petrolera', 'Quia accusamus atque', 'Ea amet dolores in', 'Molestiae ipsum dig', 'Provida', 'Fonasa', 'Omnis non rerum reru', '2021-06-01', '2021-06-30', 'Indefinido', 'dragon-shield.png', 'Sin Archivo', 'Sin Archivo', 'Sin Archivo', 'Sin Archivo', 'Sin Archivo', '1', '2021-06-15 00:09:21', '2021-06-15 00:09:21'),
(22, '14.003.611-0', 'rolando andres', 'quiroz', 'silva', 'aaaa 12', '9 31897759', 'rsq@gmail.com', '13', '312', 'Chilena', 'GM Empresa', 'Cargo 1', 'Rolando Silva', 'Salmonera', '590000', '90', '90', 'Provida', 'Fonasa', '5', '2021-06-01', '2023-05-31', 'Indefinido', '2021-03-10 02.09.14.jpg', 'Sin Archivo', 'guia 3.pdf', 'Sin Archivo', 'Sin Archivo', 'Sin Archivo', '1', '2021-06-15 00:16:24', '2021-06-15 00:16:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_producto_servicios`
--

CREATE TABLE `ficha_producto_servicios` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_barra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidad_medida` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inventario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_venta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `afecto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otro_impuesto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_critico` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_tipoProducto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_linea_negocio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_categoria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_subcategoria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_marca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_submarca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_maximo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ficha_producto_servicios`
--

INSERT INTO `ficha_producto_servicios` (`id`, `nombre`, `sku`, `codigo_barra`, `unidad_medida`, `inventario`, `estado_venta`, `afecto`, `otro_impuesto`, `stock_critico`, `id_tipoProducto`, `id_linea_negocio`, `id_categoria`, `id_subcategoria`, `id_marca`, `id_submarca`, `descripcion`, `imagen`, `stock_maximo`, `updated_at`, `created_at`) VALUES
(1, 'producto 1', 'sdad123123123', '31232132312', '1', '1', '0', NULL, NULL, '100', '1', '1', '2', '2', '3', '13', '32321321aawewe wqewwqeqeqw\r\n weqweqwe wq\r\newqe qweqw eqwe', 'gaviones.jpg', '1000', '2021-07-01 03:54:59', '2021-07-01 03:54:59'),
(6, 'producto 1', 'sdad123123123', '31232132312', '1', '1', '1', NULL, NULL, '1000', '2', '3', '2', '2', '2', '11', 'ewqeqweqwe wq eqwe e qeqwe weqw e', 'fit gato.jpg', '1000', '2021-07-02 18:01:08', '2021-07-02 09:49:27'),
(8, 'Actigor', '6777', '897878', NULL, '0', '0', NULL, NULL, '10', '2', '3', '2', '2', '1', '7', 'matdlkfjladjfldfkldslfjlkdsfjlkdsjfldslfjdslkfjlkadsjflkdsjfljadslkfjldskfjklsadjflsadjflkdsjlkfjdslfjlksadjflkdsjflkadsjlkfjsadlkfjladskjflkadsfj,', 'AG.jpg', '100', '2021-07-02 17:59:38', '2021-07-02 17:59:38'),
(9, 'Vino sour', '7878', '66565432345678', '5', '1', '1', NULL, NULL, '10', '8', '3', '2', '2', '4', '14', 'ertertret', 'cag.jpg', '100', '2021-07-29 22:33:41', '2021-07-02 18:00:49'),
(10, 'asesoria', 'yyu', '65e78', '1', '0', '0', '0', NULL, '10', '8', '3', '1', '1', '1', '7', 'ttwrt', 'caballo-mundo.png', '100', '2021-08-01 22:50:43', '2021-07-02 18:01:52'),
(11, 'Coforta', 'cofff01', '78767876', '4', '1', '1', NULL, NULL, '10', '1', '1', '1', '1', '1', '7', 'dfadfadf', 'COFOR.jpg', '100', '2021-07-02 19:12:22', '2021-07-02 18:20:56'),
(12, 'Carne kilo', 'fdfad', 'hhrt44', '5', '1', '1', '1', '0', '10', '2', '3', '4', '7', '4', '14', NULL, 'AG.jpg', '100', '2021-07-06 18:09:41', '2021-07-06 18:09:41'),
(13, 'producto 3', '4646454', '31232132312', '1', '1', '1', '1', '0', '100', '1', '1', '1', '1', '1', '7', NULL, 'consonantes.jpg', '1000', '2021-08-01 19:43:02', '2021-07-07 13:14:48'),
(14, 'Cuvee Carmenere Casa Silva 750cc', '677777777', '777777777', '4', '1', '1', '1', '1', '10', '1', '3', '4', '7', '4', '14', NULL, 'COFOR.jpg', '100', '2021-07-07 17:51:03', '2021-07-07 17:51:03'),
(15, 'Coca cola 350 cc', '1010', '78976756755655', '2', '1', '1', '1', '0', '10', '1', '3', '3', '8', '4', '14', NULL, 'coca 350.jpg', '100', '2021-07-29 22:32:07', '2021-07-19 20:03:20'),
(16, 'Filete Cotele', '1012', 'rtyu', '5', '1', '1', '1', '0', '10', '1', '3', '4', '7', '4', '14', NULL, 'filete kilo.jpg', '100', '2021-07-19 20:08:55', '2021-07-19 20:08:55'),
(17, 'Vino Cs Casillero del Diablo 750 cc', '1015', '5678987654', '2', '1', '1', '1', '0', '10', '1', '3', '4', '7', '4', '14', NULL, 'casillero.jpg', '100', '2021-07-19 20:09:59', '2021-07-19 20:09:59'),
(18, 'Pap 350cc', 'pap01', '5564333', '2', '1', '1', '1', '1', '10', '1', '4', '3', '8', '8', '22', NULL, 'pap lata.jfif', '100', '2021-07-27 19:07:12', '2021-07-27 19:06:20'),
(19, 'Jugo de Chirimoya', 'juchi', '678888', '2', '1', '1', '1', '0', '10', '1', '4', '6', NULL, NULL, NULL, NULL, 'jugos.jfif', '20', '2021-07-29 22:56:45', '2021-07-29 22:56:45'),
(20, 'Jugo de Maracuya', 'juma', '76876888', '2', '1', '1', '1', '0', NULL, '1', '4', '6', NULL, NULL, NULL, NULL, 'jugos.jfif', NULL, '2021-07-29 22:57:25', '2021-07-29 22:57:25'),
(21, 'Carne Filete 350 gramos', 'carfi', '56765', '2', '1', '1', '1', '0', NULL, '2', '4', '4', '7', '4', '14', NULL, 'bebidas.jfif', NULL, '2021-07-29 22:58:19', '2021-07-29 22:58:19'),
(22, 'Pan Frances', '5555555', 'e455555', NULL, '1', '1', '1', '0', NULL, NULL, '4', '1', '1', NULL, NULL, NULL, 'pan.jfif', NULL, '2021-07-29 23:03:33', '2021-07-29 23:03:33');

--
-- Disparadores `ficha_producto_servicios`
--
DELIMITER $$
CREATE TRIGGER `trigger_insertar_lista_precio` BEFORE INSERT ON `ficha_producto_servicios` FOR EACH ROW INSERT INTO producto_precios (id_producto, nombre, sku, codigo_barra, precio_venta_final) VALUES((SELECT MAX(ID) FROM ficha_producto_servicios)+1, new.nombre, new.sku, new.codigo_barra, '0')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pagos`
--

CREATE TABLE `forma_pagos` (
  `id` bigint(20) NOT NULL,
  `nombre_forma_pago` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `forma_pagos`
--

INSERT INTO `forma_pagos` (`id`, `nombre_forma_pago`) VALUES
(1, 'Efectivo'),
(2, 'Cheque'),
(3, 'Tarjeta de Debito'),
(4, 'Tarjeta de Credito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto_personal`
--

CREATE TABLE `foto_personal` (
  `id` int(11) NOT NULL,
  `url_foto_personal` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `honorarios`
--

CREATE TABLE `honorarios` (
  `id` bigint(20) NOT NULL,
  `n_documento_honorario` varchar(120) DEFAULT NULL,
  `fecha_emicion_honorario` datetime DEFAULT NULL,
  `fecha_vencimiento_honorario` datetime DEFAULT NULL,
  `plazo` int(11) DEFAULT NULL,
  `periodo` int(11) DEFAULT NULL,
  `forma_pago_id` bigint(20) DEFAULT NULL,
  `tipo_documento_honorario_Id` bigint(20) DEFAULT NULL,
  `comentario` varchar(240) DEFAULT NULL,
  `prestadors_id` bigint(20) DEFAULT NULL,
  `url_honorario` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `honorarios`
--

INSERT INTO `honorarios` (`id`, `n_documento_honorario`, `fecha_emicion_honorario`, `fecha_vencimiento_honorario`, `plazo`, `periodo`, `forma_pago_id`, `tipo_documento_honorario_Id`, `comentario`, `prestadors_id`, `url_honorario`) VALUES
(13, '9', '2021-08-16 00:00:00', '2021-08-16 00:00:00', 9, 9, 3, 1, 'qwe', 1, 'mevacuno.pdf'),
(15, '1', '2021-08-17 00:00:00', '2021-08-17 00:00:00', 1, 1, 2, 2, 'zxc', NULL, 'BATTLE BEAST (2011) - ENTER METAL WORLD (GOSER) by RMS_Angel.m4a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencias`
--

CREATE TABLE `licencias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `licencias`
--

INSERT INTO `licencias` (`id`, `nombre`, `abreviatura`, `created_at`, `updated_at`) VALUES
(1, 'Permiso con goce de sueldo', 'PCG', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_precios`
--

CREATE TABLE `lista_precios` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lista_precios`
--

INSERT INTO `lista_precios` (`id`, `nombre`, `abreviatura`, `created_at`, `updated_at`) VALUES
(0, 'nn', 'PP', '2021-07-28 10:48:20', '2021-07-28 14:47:36'),
(1, 'lista precio 1', 'LP1', '2021-07-07 09:09:20', '2021-07-07 09:09:20'),
(2, 'lista precio 2', 'LP2', '2021-07-07 09:09:38', '2021-07-07 09:09:38'),
(4, 'Rengifo', 'Ren', '2021-07-07 17:49:33', '2021-07-07 17:49:33'),
(5, 'Pelluco', 'Pell', '2021-07-08 01:08:49', '2021-07-08 01:08:49'),
(6, 'COTELE RENGIGO', 'COT', '2021-07-19 20:01:10', '2021-07-19 20:01:10'),
(7, 'RSQ', 'RSQ', '2021-07-19 21:23:34', '2021-07-19 21:23:34'),
(8, 'ARCANGEL RESTOBAR', 'AR', '2021-07-26 18:04:10', '2021-07-26 18:04:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `abreviatura`, `created_at`, `updated_at`) VALUES
(1, 'Marca 1', 'M1', '2021-06-30 08:32:13', '2021-06-30 08:32:13'),
(2, 'Marca 2', 'M2', '2021-06-30 08:32:24', '2021-06-30 08:32:24'),
(4, 'ANGUS', 'ANG', '2021-06-30 18:03:57', '2021-06-30 18:03:57'),
(5, 'Toyota', 'To', '2021-07-22 17:58:39', '2021-07-22 17:58:39'),
(7, 'Coca Cola', 'coca', '2021-07-27 18:58:39', '2021-07-27 18:58:39'),
(8, 'CCU', 'CCU', '2021-07-27 18:58:50', '2021-07-27 18:58:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2021_05_31_174520_create_regions_table', 2),
(12, '2021_05_31_174555_create_comunas_table', 2),
(13, '2021_06_01_192727_create_fichapersonals_table', 2),
(14, '2021_06_02_224642_create_datos_es_table', 3),
(15, '2021_06_02_224846_create_datos_rs_table', 3),
(16, '2021_06_02_224904_create_datos_cs_table', 3),
(17, '2021_06_02_225022_create_ent_docus_table', 3),
(22, '2021_06_02_233106_create_fichapersonals_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_marca` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`id`, `nombre`, `abreviatura`, `created_at`, `updated_at`, `id_marca`) VALUES
(1, 'Versa', 'NissVers', '2021-07-23 00:23:45', '2021-07-23 08:43:38', 7),
(2, 'Focus 2', 'FordFuc', '2021-07-23 08:25:34', '2021-07-23 09:12:53', 9),
(4, 'Impresa', 'NissImp', '2021-07-23 09:13:31', '2021-07-23 09:13:31', 7),
(5, 'Accent', 'HyunAcce', '2021-07-23 09:26:09', '2021-07-23 09:26:09', 13),
(6, 'Morning', 'KiaMorn', '2021-07-24 05:21:46', '2021-07-24 05:21:46', 12),
(7, 'Sail', 'ChevSail', '2021-07-26 00:06:57', '2021-07-26 00:06:57', 14),
(8, 'Rio', 'KiaRio', '2021-07-26 03:18:56', '2021-07-26 03:18:56', 12),
(9, 'Aveo', 'ChevAveo', '2021-07-26 03:37:24', '2021-07-26 03:37:24', 14),
(10, 'Rav4', 'ToyRav4', '2021-07-26 08:19:54', '2021-07-26 08:19:54', 8),
(11, 'Cactus c4', 'CitrCactus', '2021-07-26 08:34:08', '2021-07-26 08:34:08', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_a_fichapersonals`
--

CREATE TABLE `m_a_fichapersonals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rut` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_mat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_pat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fono` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comuna` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacionalidad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supervisor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proyecto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sueldo_base` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bono` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asignacion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `afp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salud` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_salud` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `tipo_contrato` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anexo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrato` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finiquito` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regla` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imple` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estadoficha` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `m_a_fichapersonals`
--

INSERT INTO `m_a_fichapersonals` (`id`, `rut`, `nombre`, `apellido_mat`, `apellido_pat`, `direccion`, `fono`, `mail`, `region`, `comuna`, `nacionalidad`, `empresa`, `cargo`, `supervisor`, `proyecto`, `sueldo_base`, `bono`, `asignacion`, `afp`, `salud`, `plan_salud`, `fecha_ingreso`, `fecha_termino`, `tipo_contrato`, `imagen`, `anexo`, `contrato`, `finiquito`, `regla`, `imple`, `estadoficha`, `created_at`, `updated_at`) VALUES
(1, '16.636.149-4', 'Gonzalo', 'Pérez', 'Gonzalo', 'Mariano Latorre 16', '977755483', 'gperezv11@gmail.com', '9', '180', 'Chilena', 'GM Empresa', 'Cargo 2', 'Rolando Silva', 'Salmonera', '500.000', '0', '0', 'Provida', 'Fonasa', '0', '2021-06-01', '2021-06-30', 'Fijo', 'test.jpg', 'Sin Archivo', 'Sin Archivo', 'Sin Archivo', 'Sin Archivo', 'Sin Archivo', '1', '2021-06-29 22:31:28', '2021-06-29 22:31:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidad`
--

CREATE TABLE `nacionalidad` (
  `id` int(11) NOT NULL,
  `nombre_nacionalidad` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('rsilva@mtobi.com', '$2y$10$xgMVMKgJoIKF5YFjKbb1aOqv74POwgn9hFX.niGb4rav92CTEvfGq', '2021-06-06 06:29:49'),
('wenceslaoruizlagos@gmail.com', '$2y$10$ycoWKmmjrY7bRkdmAQM0VuohaFy6VhjNbxjdrJTUzN9rbJITFaKSy', '2021-08-05 22:47:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patentes`
--

CREATE TABLE `patentes` (
  `id` bigint(20) NOT NULL,
  `patente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modelo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `patentes`
--

INSERT INTO `patentes` (`id`, `patente`, `marca`, `modelo`, `nombre`, `celular`, `email`, `created_at`, `updated_at`) VALUES
(1, 'GGKL18', 'Chevrolet', 'Aveo', 'Carlos Martinez', '967543234', 'carlos@gmail.com', '2021-07-25 06:37:20', '2021-07-25 10:37:20'),
(2, 'KTPB46', 'Citroen', 'C4 cactus', 'Julio Mansilla', '934875643', 'julio@gmail.com', '2021-07-25 19:36:49', '2021-07-25 19:36:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) NOT NULL,
  `comanda_id` bigint(20) NOT NULL,
  `producto_id` bigint(20) NOT NULL,
  `cantidad` float NOT NULL,
  `precio_venta` int(11) NOT NULL,
  `comentario` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `propina` int(11) DEFAULT NULL,
  `total_pago` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `descuento` float DEFAULT NULL,
  `tipo_descuento` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `comanda_id`, `producto_id`, `cantidad`, `precio_venta`, `comentario`, `total`, `subtotal`, `propina`, `total_pago`, `estado`, `descuento`, `tipo_descuento`, `created_at`, `updated_at`) VALUES
(16, 9, 15, 2, 1900, NULL, NULL, NULL, NULL, 3800, 0, NULL, NULL, '2021-07-20 02:09:48', '2021-07-20 02:09:48'),
(17, 10, 15, 2, 1900, NULL, NULL, NULL, NULL, 3800, 3, NULL, NULL, '2021-07-20 02:26:52', '2021-07-20 02:35:03'),
(18, 10, 16, 0.5, 39900, NULL, NULL, NULL, NULL, 19950, 3, NULL, NULL, '2021-07-20 02:32:45', '2021-07-20 02:35:03'),
(19, 10, 17, 1, 17800, NULL, NULL, NULL, NULL, 17800, 3, NULL, NULL, '2021-07-20 02:33:00', '2021-07-20 02:35:03'),
(20, 11, 16, 0.5, 39900, NULL, NULL, NULL, NULL, 19950, 3, NULL, NULL, '2021-07-20 02:35:48', '2021-07-20 06:40:02'),
(21, 11, 17, 1, 17800, NULL, NULL, NULL, NULL, 17800, 3, NULL, NULL, '2021-07-20 02:46:22', '2021-07-20 06:40:02'),
(22, 12, 15, 1, 1900, NULL, NULL, NULL, NULL, 1900, 3, NULL, NULL, '2021-07-20 06:40:33', '2021-07-20 15:28:11'),
(23, 12, 16, 0.5, 39900, NULL, NULL, NULL, NULL, 19950, 3, NULL, NULL, '2021-07-20 15:24:49', '2021-07-20 15:28:11'),
(24, 12, 17, 1, 17800, NULL, NULL, NULL, NULL, 17800, 3, NULL, NULL, '2021-07-20 15:27:20', '2021-07-20 15:28:11'),
(25, 13, 17, 2, 17800, NULL, NULL, NULL, NULL, 35600, 3, NULL, NULL, '2021-07-20 15:28:37', '2021-07-20 15:43:12'),
(26, 13, 15, 2, 1900, NULL, NULL, NULL, NULL, 3800, 3, NULL, NULL, '2021-07-20 15:33:40', '2021-07-20 15:43:12'),
(27, 13, 16, 1, 39900, NULL, NULL, NULL, NULL, 39900, 3, NULL, NULL, '2021-07-20 15:38:09', '2021-07-20 15:43:12'),
(28, 14, 17, 4, 17800, NULL, NULL, NULL, NULL, 35600, 3, NULL, NULL, '2021-07-20 15:47:53', '2021-07-20 15:49:05'),
(29, 14, 16, 1, 39900, NULL, NULL, NULL, NULL, 39900, 3, NULL, NULL, '2021-07-20 15:48:11', '2021-07-20 15:49:05'),
(30, 14, 15, 3, 1800, NULL, NULL, NULL, NULL, 3600, 3, NULL, NULL, '2021-07-20 15:48:19', '2021-07-20 15:49:05'),
(31, 15, 15, 3, 1900, NULL, NULL, NULL, NULL, 3800, 3, NULL, NULL, '2021-07-20 15:50:22', '2021-07-20 15:54:20'),
(32, 15, 17, 2, 17800, NULL, NULL, NULL, NULL, 35600, 3, NULL, NULL, '2021-07-20 15:50:37', '2021-07-20 15:54:20'),
(33, 16, 15, 2, 1900, NULL, NULL, NULL, NULL, 3800, 3, NULL, NULL, '2021-07-20 15:55:51', '2021-07-20 15:56:09'),
(34, 16, 17, 2, 17800, NULL, NULL, NULL, NULL, 35600, 3, NULL, NULL, '2021-07-20 15:56:00', '2021-07-20 15:56:09'),
(35, 17, 17, 3, 17800, NULL, NULL, NULL, NULL, 53400, 3, NULL, NULL, '2021-07-20 17:48:45', '2021-07-20 17:48:50'),
(36, 18, 17, 1, 17800, NULL, NULL, NULL, NULL, 17800, 3, NULL, NULL, '2021-07-20 18:05:13', '2021-07-21 22:17:44'),
(37, 18, 16, 1.18, 39900, '3,4', NULL, NULL, NULL, 19950, 3, NULL, NULL, '2021-07-20 18:05:31', '2021-07-21 22:17:44'),
(38, 18, 15, 1, 1900, NULL, NULL, NULL, NULL, 1900, 3, NULL, NULL, '2021-07-20 18:07:02', '2021-07-21 22:17:44'),
(39, 19, 15, 2, 1900, NULL, NULL, NULL, NULL, 3800, 3, NULL, NULL, '2021-07-21 22:18:36', '2021-07-21 22:19:02'),
(40, 19, 17, 2, 17800, NULL, NULL, NULL, NULL, 35600, 3, NULL, NULL, '2021-07-21 22:18:42', '2021-07-21 22:19:02'),
(41, 19, 16, 1.5, 39900, NULL, NULL, NULL, NULL, 59850, 3, NULL, NULL, '2021-07-21 22:18:49', '2021-07-21 22:19:02'),
(45, 20, 17, 2, 17800, NULL, NULL, NULL, NULL, 35600, 3, NULL, NULL, '2021-07-22 17:20:24', '2021-07-22 17:21:01'),
(46, 20, 16, 0.68, 39900, NULL, NULL, NULL, NULL, 27132, 3, NULL, NULL, '2021-07-22 17:20:44', '2021-07-22 17:21:01'),
(47, 21, 17, 2, 17800, NULL, NULL, NULL, NULL, 35600, 3, NULL, NULL, '2021-07-22 17:26:05', '2021-07-22 17:40:52'),
(48, 21, 15, 1, 1900, NULL, NULL, NULL, NULL, 1900, 3, NULL, NULL, '2021-07-22 17:39:41', '2021-07-22 17:40:52'),
(52, 22, 15, 2, 1900, NULL, NULL, NULL, NULL, 3600, 3, 900, NULL, '2021-07-26 16:19:23', '2021-07-26 16:31:54'),
(53, 22, 16, 2.5, 39900, NULL, NULL, NULL, NULL, 99750, 3, NULL, NULL, '2021-07-26 16:19:51', '2021-07-26 16:31:54'),
(54, 22, 17, 1, 17800, NULL, NULL, NULL, NULL, 17800, 3, NULL, NULL, '2021-07-26 16:19:59', '2021-07-26 16:31:54'),
(55, 22, 9, 1, 6000, NULL, NULL, NULL, NULL, 11950, 3, 50, NULL, '2021-07-26 16:22:23', '2021-07-26 16:31:54'),
(56, 22, 13, 2, 250, NULL, NULL, NULL, NULL, 500, 3, NULL, NULL, '2021-07-26 16:22:35', '2021-07-26 16:31:54'),
(57, 23, 16, 1.6, 39900, NULL, NULL, NULL, NULL, 63840, 3, NULL, NULL, '2021-07-26 16:39:58', '2021-07-26 16:41:00'),
(58, 23, 9, 1, 6000, NULL, NULL, NULL, NULL, 6000, 3, NULL, NULL, '2021-07-26 16:40:11', '2021-07-26 16:41:00'),
(59, 23, 15, 1, 1900, NULL, NULL, NULL, NULL, 1000, 3, 900, NULL, '2021-07-26 16:40:21', '2021-07-26 16:41:00'),
(60, 24, 13, 2, 250, 'ccccc', NULL, NULL, NULL, 500, 3, NULL, NULL, '2021-07-26 17:42:52', '2021-07-26 17:45:37'),
(61, 25, 13, 0.5, 250, NULL, NULL, NULL, NULL, 125, 3, NULL, NULL, '2021-07-26 17:48:26', '2021-07-26 19:16:22'),
(62, 26, 13, 1, 250, NULL, NULL, NULL, NULL, 250, 3, NULL, NULL, '2021-07-26 20:18:31', '2021-07-26 20:27:53'),
(63, 27, 9, 1, 6000, NULL, NULL, NULL, NULL, 6000, 3, NULL, NULL, '2021-07-26 21:02:05', '2021-07-26 21:02:53'),
(64, 27, 15, 1, 1800, NULL, NULL, NULL, NULL, 1000, 3, 800, NULL, '2021-07-26 21:02:23', '2021-07-26 21:02:53'),
(65, 27, 16, 1.6, 39900, NULL, NULL, NULL, NULL, 63840, 3, NULL, NULL, '2021-07-26 21:02:34', '2021-07-26 21:02:53'),
(68, 28, 13, 2, 250, NULL, NULL, NULL, NULL, 500, 3, NULL, NULL, '2021-07-26 21:35:29', '2021-07-26 21:40:47'),
(69, 28, 9, 1, 6000, NULL, NULL, NULL, NULL, 6000, 3, NULL, NULL, '2021-07-26 21:35:46', '2021-07-26 21:40:47'),
(70, 28, 16, 0.25, 39900, NULL, NULL, NULL, NULL, 9975, 3, NULL, NULL, '2021-07-26 21:40:00', '2021-07-26 21:40:47'),
(71, 29, 13, 2, 250, NULL, NULL, NULL, NULL, 500, 3, NULL, NULL, '2021-07-27 17:31:42', '2021-07-27 17:32:27'),
(73, 30, 13, 1, 250, NULL, NULL, NULL, NULL, 200, 3, 50, NULL, '2021-07-27 17:44:11', '2021-07-27 17:55:33'),
(78, 31, 9, 1, 6000, NULL, NULL, NULL, NULL, 5757, 3, 243, NULL, '2021-07-29 03:59:16', '2021-07-29 03:59:37'),
(79, 31, 15, 3, 1800, NULL, NULL, NULL, NULL, 489, 1, 1311, NULL, '2021-07-29 04:00:11', '2021-07-29 04:00:11'),
(80, 32, 13, 1, 250, NULL, NULL, NULL, NULL, 122, 3, 128, NULL, '2021-07-29 04:00:28', '2021-07-29 17:24:10'),
(81, 32, 9, 3, 6000, NULL, NULL, NULL, NULL, 17877, 3, 123, NULL, '2021-07-29 04:00:48', '2021-07-29 17:24:10'),
(82, 32, 16, 1, 39900, NULL, NULL, NULL, NULL, 39900, 3, NULL, NULL, '2021-07-29 16:50:23', '2021-07-29 17:24:10'),
(83, 32, 17, 1, 17800, NULL, NULL, NULL, NULL, 17800, 3, NULL, NULL, '2021-07-29 16:50:31', '2021-07-29 17:24:10'),
(84, 32, 15, 1, 1800, NULL, NULL, NULL, NULL, 1800, 3, NULL, NULL, '2021-07-29 16:57:03', '2021-07-29 17:24:10'),
(85, 33, 16, 1, 39900, NULL, NULL, NULL, NULL, 39400, 3, 500, NULL, '2021-07-29 18:00:23', '2021-07-29 18:01:19'),
(86, 34, 16, 1.5, 39900, NULL, NULL, NULL, NULL, 9975, 3, 29925, NULL, '2021-07-29 18:02:05', '2021-07-29 18:19:52'),
(87, 34, 15, 1, 1800, NULL, NULL, NULL, NULL, 1800, 3, NULL, NULL, '2021-07-29 18:19:26', '2021-07-29 18:19:52'),
(88, 35, 16, 0.68, 39900, NULL, NULL, NULL, NULL, 27132, 3, 0, NULL, '2021-07-29 20:20:45', '2021-07-29 20:24:34'),
(89, 35, 13, 1, 250, NULL, NULL, NULL, NULL, 200, 3, 50, NULL, '2021-07-29 20:21:34', '2021-07-29 20:24:34'),
(90, 35, 15, 1, 1800, NULL, NULL, NULL, NULL, 1800, 3, NULL, NULL, '2021-07-29 20:22:47', '2021-07-29 20:24:34'),
(91, 36, 16, 2.28, 39900, NULL, NULL, NULL, NULL, 90972, 3, NULL, NULL, '2021-07-29 20:25:25', '2021-07-29 22:34:14'),
(92, 37, 22, 0.6, 1500, NULL, NULL, NULL, NULL, 900, 3, NULL, NULL, '2021-07-29 23:04:59', '2021-07-29 23:07:59'),
(93, 37, 21, 1.25, 14990, NULL, NULL, NULL, NULL, 0, 3, NULL, NULL, '2021-07-29 23:05:21', '2021-07-29 23:07:59'),
(94, 37, 19, 1, 3500, NULL, NULL, NULL, NULL, 3500, 3, NULL, NULL, '2021-07-29 23:05:35', '2021-07-29 23:07:59'),
(95, 37, 15, 1, 1200, NULL, NULL, NULL, NULL, 1200, 3, NULL, NULL, '2021-07-29 23:05:46', '2021-07-29 23:07:59'),
(96, 37, 18, 1, 6000, NULL, NULL, NULL, NULL, 6000, 3, NULL, NULL, '2021-07-29 23:06:10', '2021-07-29 23:07:59'),
(98, 37, 20, 1, 3500, NULL, NULL, NULL, NULL, 3500, 3, NULL, NULL, '2021-07-29 23:07:13', '2021-07-29 23:07:59'),
(99, 38, 22, 1, 1500, NULL, NULL, NULL, NULL, 1500, 4, NULL, NULL, '2021-07-29 23:08:33', '2021-07-29 23:09:39'),
(104, 39, 21, 5, 0, NULL, NULL, NULL, NULL, -500, 4, 500, NULL, '2021-07-29 23:32:08', '2021-07-30 00:53:06'),
(105, 39, 22, 1, 0, NULL, NULL, NULL, NULL, 0, 4, NULL, NULL, '2021-07-29 23:32:23', '2021-07-30 00:53:06'),
(106, 39, 17, 1.5, 9800, NULL, NULL, NULL, NULL, 13800, 4, 900, NULL, '2021-07-29 23:32:47', '2021-07-30 00:53:06'),
(107, 39, 19, 3, 0, NULL, NULL, NULL, NULL, 0, 4, 0, NULL, '2021-07-29 23:32:53', '2021-07-30 00:53:06'),
(108, 39, 20, 3, 3500, NULL, NULL, NULL, NULL, 2660, 4, 840, NULL, '2021-07-29 23:33:46', '2021-07-30 00:53:06'),
(109, 40, 22, 0.2, 1500, NULL, NULL, NULL, NULL, 300, 3, NULL, NULL, '2021-07-30 01:00:51', '2021-07-30 01:04:45'),
(110, 40, 18, 5, 6000, NULL, NULL, NULL, NULL, 30000, 3, NULL, NULL, '2021-07-30 01:01:23', '2021-07-30 01:04:45'),
(112, 41, 22, 0.6, 1500, NULL, NULL, NULL, NULL, 900, 3, NULL, NULL, '2021-07-30 02:20:19', '2021-07-30 02:21:23'),
(113, 41, 18, 5, 6000, NULL, NULL, NULL, NULL, 30000, 3, NULL, NULL, '2021-07-30 02:20:48', '2021-07-30 02:21:23'),
(115, 42, 22, 1, 1500, NULL, NULL, NULL, NULL, 1500, 3, NULL, NULL, '2021-07-30 19:50:02', '2021-07-30 19:50:07'),
(116, 43, 19, 1, 3500, 'sin azucar', NULL, NULL, NULL, 1750, 3, 50, 1, '2021-07-30 20:57:19', '2021-07-31 23:02:05'),
(117, 43, 20, 3, 1000, NULL, NULL, NULL, NULL, 3000, 3, 100, 0, '2021-07-30 20:57:29', '2021-07-31 23:02:05'),
(118, 43, 22, 2.5, 1500, NULL, NULL, NULL, NULL, 3750, 3, 0, 0, '2021-07-31 23:00:21', '2021-07-31 23:02:05'),
(119, 44, 22, 1, 1500, NULL, NULL, NULL, NULL, 1500, 3, NULL, 0, '2021-08-01 19:50:01', '2021-08-02 16:25:57'),
(120, 44, 17, 1, 17800, NULL, NULL, NULL, NULL, 17800, 3, NULL, NULL, '2021-08-01 20:10:28', '2021-08-02 16:25:57'),
(121, 44, 19, 1, 1000, NULL, NULL, NULL, NULL, 1000, 3, NULL, NULL, '2021-08-02 16:19:40', '2021-08-02 16:25:57'),
(126, 45, 17, 2, 9800, NULL, NULL, NULL, NULL, 34700, 4, 900, 0, '2021-08-02 17:47:39', '2021-08-02 18:19:06'),
(127, 45, 20, 1, 1000, NULL, NULL, NULL, NULL, 1000, 4, NULL, NULL, '2021-08-02 18:12:28', '2021-08-02 18:19:06'),
(128, 45, 18, 1, 6000, NULL, NULL, NULL, NULL, 6000, 4, NULL, NULL, '2021-08-02 18:15:46', '2021-08-02 18:19:06'),
(129, 46, 20, 1, 1000, NULL, NULL, NULL, NULL, 1000, 3, NULL, 0, '2021-08-02 18:19:17', '2021-08-02 18:22:14'),
(130, 46, 17, 1, 17800, NULL, NULL, NULL, NULL, 17000, 3, 800, 0, '2021-08-02 18:19:39', '2021-08-02 18:22:14'),
(131, 46, 22, 6, 1500, NULL, NULL, NULL, NULL, 8100, 3, 10, 1, '2021-08-02 18:19:57', '2021-08-02 18:22:14'),
(132, 47, 15, 1, 1200, NULL, NULL, NULL, NULL, 1090, 1, 110, 0, '2021-08-02 18:25:29', '2021-08-02 18:25:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rut` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipopermiso` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finicio` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ftermino` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `rut`, `nombre`, `tipopermiso`, `finicio`, `ftermino`, `created_at`, `updated_at`) VALUES
(1, '17.095.843-8', 'Gonzalo Pérez', 'Permiso Medico', '2021-06-01', '2021-06-30', '2021-06-17 00:53:01', '2021-06-17 00:53:01'),
(2, '14.003.611-0', 'rolando silva', 'Permiso Laboral', '2021-06-17', '2021-06-20', '2021-06-17 18:49:28', '2021-06-17 18:49:28'),
(3, '14.003.611-0', 'rolando silva', 'Permiso Laboral', '2021-06-17', '2021-06-20', '2021-06-17 19:09:11', '2021-06-17 19:09:11'),
(4, '14003611-0', 'rolando silva', 'Permiso Laboral', '2021-06-17', '2021-06-20', '2021-06-17 19:19:00', '2021-06-17 19:19:00'),
(5, '14.003.611-0', 'rolando silva', 'PSG', '2021-06-17', '2021-06-20', '2021-06-17 19:28:41', '2021-06-17 19:28:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestadores`
--

CREATE TABLE `prestadores` (
  `id` bigint(255) NOT NULL,
  `rut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nacionalidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comuna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_ficha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prestadores`
--

INSERT INTO `prestadores` (`id`, `rut`, `nombre`, `email`, `telefono`, `nacionalidad`, `region`, `comuna`, `direccion`, `nombre_contacto`, `telefono_contacto`, `email_contacto`, `cargo_contacto`, `imagen`, `estado_ficha`, `created_at`, `updated_at`) VALUES
(1, '11.111.111-1', 'proveedor', 'proveedor@sst.cl', '954545454', NULL, '3', '14', 'direccionn 123', 'contacto', '987878778', 'contacto@contacto', 'cargo', 'oferta.jpg', '0', '2021-07-22 05:16:04', '2021-07-22 09:16:04'),
(3, '33.333.333-3', 'proveedor', 'proveedor@sst.cl', '954545454', 'Chilena', '5', '33', 'direccionn 123', 'contacto', '987878778', 'contacto@contacto', 'cargo', 'logo serviu.png', '1', '2021-07-22 05:16:03', '2021-07-22 09:16:03'),
(5, '14.003.611-0', 'rolando', 'rolandosilvaq@gmail.com', '931897759', 'Colombiana', '12', '294', 'jkdsjfdlkf', 'jesus', '931897759', 'RSQ@GMAIL.COM', 'flkdafjld', 'AG.jpg', '1', '2021-07-22 05:16:02', '2021-07-22 09:16:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestadors`
--

CREATE TABLE `prestadors` (
  `id` bigint(20) NOT NULL,
  `rut_prestador` varchar(120) NOT NULL,
  `nombre_prestador` varchar(120) NOT NULL,
  `apellido_p_prestador` varchar(120) NOT NULL,
  `apellido_m_prestador` varchar(120) DEFAULT NULL,
  `email_prestador` varchar(120) DEFAULT NULL,
  `telefono_prestador` varchar(120) DEFAULT NULL,
  `direccion_prestador` varchar(120) DEFAULT NULL,
  `comunas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `razon_social_prestador` varchar(120) DEFAULT NULL,
  `direccion_empresa_prestador` varchar(120) DEFAULT NULL,
  `telefono_empresa_prestador` varchar(120) DEFAULT NULL,
  `cargos_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestadors`
--

INSERT INTO `prestadors` (`id`, `rut_prestador`, `nombre_prestador`, `apellido_p_prestador`, `apellido_m_prestador`, `email_prestador`, `telefono_prestador`, `direccion_prestador`, `comunas_id`, `razon_social_prestador`, `direccion_empresa_prestador`, `telefono_empresa_prestador`, `cargos_id`) VALUES
(1, '17.758.447-9', 'Wenceslao', 'Ruiz', 'Lagos', 'wenceslaoruizlagos@gmail.cl', '982153146', 'Talca', 180, 'Venta de Computadores', 'Vara Gruesa', '82153146', 4),
(16, '16.758.447-9', 'Wenceslao', 'Ruiz', 'Lagos', 'wenceslaoruizlagos@gmail.cl', '982153146', 'Talca', 266, 'Venta de Computadores', 'Vara Gruesa', '82153146', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_precios`
--

CREATE TABLE `producto_precios` (
  `id` bigint(20) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_lista_precio` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_barra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_costo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `margen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_venta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descuento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_venta_neto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_venta_final` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_bodega` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iva` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otro_impuesto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_precios`
--

INSERT INTO `producto_precios` (`id`, `id_producto`, `id_lista_precio`, `nombre`, `sku`, `codigo_barra`, `precio_costo`, `margen`, `precio_venta`, `descuento`, `valor_venta_neto`, `precio_venta_final`, `id_bodega`, `iva`, `otro_impuesto`, `stock`, `created_at`, `updated_at`) VALUES
(27, 17, 7, 'Vino Cs Casillero del Diablo 750 cc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '17800', '6', NULL, NULL, '15', '2021-07-19 21:24:51', '2021-07-19 21:24:51'),
(29, 16, 7, 'Filete Cotele', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '39900', '6', NULL, NULL, '15.78', '2021-07-19 21:25:25', '2021-07-19 21:25:25'),
(30, 15, 7, 'Coca cola 350 cc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1800', '6', NULL, NULL, NULL, '2021-07-19 21:59:22', '2021-07-19 21:59:22'),
(31, 9, 7, 'Vino sour', NULL, NULL, NULL, NULL, NULL, '123', NULL, '6000', '6', NULL, NULL, NULL, '2021-07-26 16:21:34', '2021-07-26 16:21:34'),
(32, 13, 7, 'producto 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '250', '6', NULL, NULL, NULL, '2021-07-26 16:21:58', '2021-07-26 16:21:58'),
(34, 18, 8, 'Pap 350cc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6000', '7', NULL, NULL, NULL, '2021-07-28 14:45:26', '2021-07-28 14:45:26'),
(35, 15, 8, 'Coca cola 350 cc', NULL, NULL, NULL, NULL, NULL, '110', NULL, '1200', '7', NULL, NULL, NULL, '2021-07-29 22:29:28', '2021-07-29 22:29:28'),
(36, 17, 8, 'Vino Cs Casillero del Diablo 750 cc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9800', '7', NULL, NULL, NULL, '2021-07-29 22:30:26', '2021-07-29 22:30:26'),
(37, 12, 8, 'Carne kilo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8990', '7', NULL, NULL, NULL, '2021-07-29 22:30:59', '2021-07-29 22:30:59'),
(38, 19, 8, 'Jugo de Chirimoya', 'juchi', '678888', NULL, NULL, NULL, NULL, NULL, '1000', '7', NULL, NULL, NULL, '2021-07-30 16:51:59', '2021-07-29 18:56:45'),
(39, 20, 8, 'Jugo de Maracuya', 'juma', '76876888', NULL, NULL, NULL, NULL, NULL, '1000', '7', NULL, NULL, NULL, '2021-07-30 16:51:56', '2021-07-29 18:57:25'),
(40, 21, 8, 'Carne Filete 350 gramos', 'carfi', '56765', NULL, NULL, NULL, NULL, NULL, '1000', '7', NULL, NULL, NULL, '2021-07-30 16:51:51', '2021-07-29 18:58:19'),
(43, 21, 8, 'Carne Filete 350 gramos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '14990', '7', NULL, NULL, '100', '2021-07-29 22:59:46', '2021-07-29 22:59:46'),
(44, 22, 8, 'Pan Frances', '5555555', 'e455555', NULL, NULL, NULL, NULL, NULL, '1500', '7', NULL, NULL, NULL, '2021-07-30 16:51:43', '2021-07-29 19:03:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` bigint(20) NOT NULL,
  `rut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nacionalidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comuna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_ficha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `rut`, `nombre`, `email`, `telefono`, `nacionalidad`, `region`, `comuna`, `direccion`, `nombre_contacto`, `telefono_contacto`, `email_contacto`, `cargo_contacto`, `imagen`, `estado_ficha`, `created_at`, `updated_at`) VALUES
(2, '22.222.222-2', 'proveedor', 'proveedor@sst.cl', '994545454', 'Chilena', '2', NULL, 'direccion 123', 'contacto', '666666666', 'contacto@contacto.cl', 'cargo', 'oferta.jpg', '1', '2021-06-28 03:47:21', '2021-06-28 03:47:21'),
(3, '33.333.333-3', 'proveedor', 'proveedor@sst.cl', '954545454', 'Chilena', '5', '32', 'direccionn 123', 'contacto', '987878778', 'contacto@contacto', 'cargo', 'oferta.jpg', '1', '2021-06-28 00:23:57', '2021-06-28 04:23:57'),
(6, '76.863.627-3', 'directory', 'rolandosilvaq@gmail.com', '931897759', 'Colombiana', '11', '261', 'imperial 605', 'rolanod', '931897759', 'RSQ@GMAIL.COM', 'dkfjdlk', 'logo serviu.png', '1', '2021-06-29 00:17:12', '2021-06-29 04:17:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `regions`
--

INSERT INTO `regions` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Arica y Parinacota', NULL, NULL),
(2, 'Tarapacá', NULL, NULL),
(3, 'Antofagasta', NULL, NULL),
(4, 'Atacama', NULL, NULL),
(5, 'Coquimbo', NULL, NULL),
(6, 'Valparaiso', NULL, NULL),
(7, 'Metropolitana de Santiago', NULL, NULL),
(8, 'Libertador General Bernardo O\'Higgins', NULL, NULL),
(9, 'Maule', NULL, NULL),
(10, 'Biobío', NULL, NULL),
(11, 'La Araucanía', NULL, NULL),
(12, 'Los Ríos', NULL, NULL),
(13, 'Los Lagos', NULL, NULL),
(14, 'Aisén del General Carlos Ibáñez del Campo', NULL, NULL),
(15, 'Magallanes y de la Antártica Chilena', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rendidores`
--

CREATE TABLE `rendidores` (
  `id` bigint(20) NOT NULL,
  `rut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nacionalidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comuna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo_contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_ficha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_categoria` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `nombre`, `abreviatura`, `created_at`, `updated_at`, `id_categoria`) VALUES
(1, 'subcategoria 1', 'sub1', '2021-06-30 08:50:21', '2021-06-30 08:50:21', 1),
(2, 'subcategoria 2', 'SC2', '2021-06-30 08:56:39', '2021-06-30 08:56:39', 2),
(3, 'subcategoria 3', 'SC3', '2021-06-30 08:56:57', '2021-06-30 08:56:57', 1),
(4, 'subcategoria 4', 'SC4', '2021-06-30 08:57:17', '2021-06-30 08:57:17', 2),
(5, 'subcategoria 5', 'SC5', '2021-06-30 08:57:33', '2021-06-30 08:57:33', 2),
(6, 'subcategoria 6', 'SC6', '2021-06-30 08:57:53', '2021-06-30 08:57:53', 3),
(7, 'LOMO VETADO', 'LV', '2021-06-30 18:03:40', '2021-06-30 18:03:40', 4),
(8, 'Gaseosas', 'bg', '2021-07-27 18:57:42', '2021-07-27 18:57:42', 3),
(9, 'Energetica', 'be', '2021-07-27 18:57:58', '2021-07-27 18:57:58', 3),
(10, 'Agua Mineral', 'ba', '2021-07-27 18:58:11', '2021-07-27 18:58:11', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submarcas`
--

CREATE TABLE `submarcas` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_marca` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `submarcas`
--

INSERT INTO `submarcas` (`id`, `nombre`, `abreviatura`, `created_at`, `updated_at`, `id_marca`) VALUES
(7, 'submarca 1', 'SM1', '2021-06-30 09:10:27', '2021-06-30 09:10:27', 1),
(8, 'submarca 2', 'sm2', '2021-06-30 09:10:43', '2021-06-30 09:10:43', 1),
(9, 'submarca 3', 'sm3', '2021-06-30 09:11:11', '2021-06-30 09:11:11', 1),
(10, 'submarca 3', 'sm3', '2021-06-30 09:11:11', '2021-06-30 09:11:11', 1),
(11, 'submarca 4', 'sm4', '2021-06-30 09:11:26', '2021-06-30 09:11:26', 2),
(12, 'submarca 5', 'sm5', '2021-06-30 09:11:51', '2021-06-30 09:11:51', 2),
(13, 'submarca 6', 'sm6', '2021-06-30 09:12:05', '2021-06-30 09:12:05', 3),
(14, 'CRIOLLO', 'CR', '2021-06-30 18:04:15', '2021-06-30 18:04:15', 4),
(15, 'rav4', 'torav4', '2021-07-22 17:59:16', '2021-07-22 17:59:16', 5),
(16, 'Corola', 'Frd', '2021-07-23 00:17:18', '2021-07-23 00:17:18', 9),
(17, 'Camaro', 'ChevCam', '2021-07-23 01:48:13', '2021-07-23 01:48:13', 7),
(18, 'Rio', 'KiaRio', '2021-07-23 02:03:47', '2021-07-23 02:03:47', 12),
(19, 'Tida', 'NisTid', '2021-07-23 08:21:53', '2021-07-23 08:21:53', 7),
(20, 'Pepsi', 'pep', '2021-07-27 18:59:19', '2021-07-27 18:59:19', 8),
(21, 'Bilz', 'bil', '2021-07-27 18:59:31', '2021-07-27 18:59:31', 8),
(22, 'Pap', 'Pap', '2021-07-27 18:59:42', '2021-07-27 18:59:42', 8),
(23, 'Ginger', 'Ginger', '2021-07-27 18:59:58', '2021-07-27 18:59:58', 8),
(24, 'Coca Cola', 'c', '2021-07-27 19:00:09', '2021-07-27 19:00:09', 7),
(25, 'Fanta', 'Fan', '2021-07-27 19:00:22', '2021-07-27 19:00:22', 7),
(26, 'Vital', 'Vit', '2021-07-27 19:00:33', '2021-07-27 19:00:33', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursals`
--

CREATE TABLE `sucursals` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sucursals`
--

INSERT INTO `sucursals` (`id`, `nombre`, `abreviatura`, `created_at`, `updated_at`) VALUES
(1, 'Municipalidad Frutillar', 'Arturo pratt #3300', '2021-07-24 16:10:05', '2021-07-24 20:10:05'),
(2, 'Municipalidad Osorno', 'Los Carrera #1234', '2021-07-24 00:42:47', '2021-07-24 00:42:47'),
(4, 'Municipalidad Puerto Varas', 'Bernardo Ohiggins #1243', '2021-07-24 20:14:20', '2021-07-24 20:14:20'),
(5, 'Rio Negro', 'Villa pilmaiquen #134', '2021-07-30 10:39:48', '2021-07-30 10:39:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento_honorarios`
--

CREATE TABLE `tipo_documento_honorarios` (
  `id` bigint(20) NOT NULL,
  `nombre_tipo_documento_honorario` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_documento_honorarios`
--

INSERT INTO `tipo_documento_honorarios` (`id`, `nombre_tipo_documento_honorario`) VALUES
(1, 'Boleta Exenta'),
(2, 'Boleta Afecta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_negocios`
--

CREATE TABLE `tipo_negocios` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_negocios`
--

INSERT INTO `tipo_negocios` (`id`, `nombre`, `abreviatura`, `created_at`, `updated_at`) VALUES
(1, 'Negocio 1', 'N1', '2021-06-30 00:19:03', '2021-06-30 00:19:03'),
(3, 'RESTAURANTE', 'REST', '2021-06-30 18:03:04', '2021-06-30 18:03:04'),
(4, 'DISCOTHEQUE', 'D', '2021-07-26 18:05:20', '2021-07-26 18:05:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_productos`
--

CREATE TABLE `tipo_productos` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_productos`
--

INSERT INTO `tipo_productos` (`id`, `nombre`, `abreviatura`, `created_at`, `updated_at`) VALUES
(1, 'Producto Terminado', 'PrdT', '2021-06-29 23:47:06', '2021-06-29 23:47:06'),
(2, 'Materia Prima', 'MP', '2021-06-29 23:48:19', '2021-06-29 23:48:19'),
(8, 'MATERIAL DE EMPAQUE', 'ME', '2021-06-30 18:02:39', '2021-06-30 18:02:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medidas`
--

CREATE TABLE `unidad_medidas` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `unidad_medidas`
--

INSERT INTO `unidad_medidas` (`id`, `nombre`, `abreviatura`, `created_at`, `updated_at`) VALUES
(1, 'Metros', 'Mts', '2021-06-30 08:23:02', '2021-07-02 04:09:47'),
(2, 'unidad 2', 'c2', '2021-06-30 08:23:16', '2021-06-30 08:23:16'),
(4, 'unidad 4', 'U4', '2021-06-30 23:41:59', '2021-06-30 23:41:59'),
(5, 'Kilo', 'G', '2021-07-01 17:41:31', '2021-07-01 17:41:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `puesto` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `foto`, `email`, `empresa`, `puesto`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Gonzalo Pérez', NULL, 'gperez@sstecnologic.cl', NULL, NULL, NULL, '$2y$10$PeW18CeLfLSjFLgQIgpZmOMiEYOE9T8U4ZkHoBy5VZSvlIK9HG3fq', NULL, '2021-05-31 11:47:53', '2021-05-31 11:47:53'),
(2, 'Rolando Silva Quiroz', NULL, 'rsilva@mtobi.com', NULL, NULL, NULL, '$2y$10$HVXPX1UruVKMOJUNw3O04OoYDWP.SnjexqXnMyk3KsnArXbBcuYXy', '9HLv1X3IWJvA41p1xsEJlhbwzIm6FK2ItGIWvxQqMuZwp3UM8JLnwHHnvw3j', '2021-06-01 17:13:47', '2021-06-01 17:13:47'),
(3, 'Mundo Animal', 'test.jpg', 'jbarraza@clinicamundoanimal.cl ', 'Mundo Animal', 'Dueño', NULL, '$2y$10$TtJ54R2Ar4q5ronZkW.v3un4yiNvXEp2ezuiesN5Mjd99xR3fGPja', NULL, NULL, NULL),
(4, 'Wenceslao', NULL, 'wenceslaoruizlagos@gmail.com', NULL, NULL, NULL, '$2y$10$/eP2qe3heD9wy1Geu7Gv/.OXi.yOashtoF7CPU5fwLn1OGmMX9sJW', 'nC5UFDl6bzPyzT9jW3rAEDcAwXNYk7quBu2WrUahn9oi6QE2ViEajZB3LYFo', '2021-08-03 17:05:41', '2021-08-04 03:58:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `nombre`, `abreviatura`, `created_at`, `updated_at`) VALUES
(7, 'Nissan', 'Chev', '2021-07-22 22:27:23', '2021-07-23 01:49:44'),
(8, 'Toyota', 'Toy', '2021-07-22 22:28:00', '2021-07-22 22:28:00'),
(9, 'Ford', 'Frd', '2021-07-22 22:28:17', '2021-07-22 22:28:17'),
(11, 'Audi', 'AU', '2021-07-23 00:09:31', '2021-07-23 00:09:31'),
(12, 'Kia', 'Kia', '2021-07-23 02:02:51', '2021-07-23 02:02:51'),
(13, 'Hyundai', 'Hyun', '2021-07-23 08:30:07', '2021-07-23 08:30:07'),
(14, 'Chevrolet', 'Chev', '2021-07-25 11:50:14', '2021-07-25 11:50:30'),
(15, 'Citroen', 'Citr', '2021-07-26 08:33:38', '2021-07-26 08:33:38');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calendario_events`
--
ALTER TABLE `calendario_events`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `comandas`
--
ALTER TABLE `comandas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comunas`
--
ALTER TABLE `comunas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comunas_region_id_foreign` (`region_id`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_honorarios`
--
ALTER TABLE `detalle_honorarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_honorarios_honorarios` (`honorarios_id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `fichaclientes`
--
ALTER TABLE `fichaclientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fichapersonals`
--
ALTER TABLE `fichapersonals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ficha_producto_servicios`
--
ALTER TABLE `ficha_producto_servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `forma_pagos`
--
ALTER TABLE `forma_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `honorarios`
--
ALTER TABLE `honorarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_honorario_forma_pago` (`forma_pago_id`) USING BTREE,
  ADD KEY `fk_honorario_tipo_documento_honorario` (`tipo_documento_honorario_Id`) USING BTREE,
  ADD KEY `fk_honorario_prestadors` (`prestadors_id`);

--
-- Indices de la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lista_precios`
--
ALTER TABLE `lista_precios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m_a_fichapersonals`
--
ALTER TABLE `m_a_fichapersonals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nacionalidad`
--
ALTER TABLE `nacionalidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `patentes`
--
ALTER TABLE `patentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prestadores`
--
ALTER TABLE `prestadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prestadors`
--
ALTER TABLE `prestadors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prestador_comunas` (`comunas_id`) USING BTREE,
  ADD KEY `fk_prestador_cargos` (`cargos_id`);

--
-- Indices de la tabla `producto_precios`
--
ALTER TABLE `producto_precios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rendidores`
--
ALTER TABLE `rendidores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `submarcas`
--
ALTER TABLE `submarcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursals`
--
ALTER TABLE `sucursals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documento_honorarios`
--
ALTER TABLE `tipo_documento_honorarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_negocios`
--
ALTER TABLE `tipo_negocios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_productos`
--
ALTER TABLE `tipo_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidad_medidas`
--
ALTER TABLE `unidad_medidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `calendario_events`
--
ALTER TABLE `calendario_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `comandas`
--
ALTER TABLE `comandas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `comunas`
--
ALTER TABLE `comunas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT de la tabla `detalle_honorarios`
--
ALTER TABLE `detalle_honorarios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fichaclientes`
--
ALTER TABLE `fichaclientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `fichapersonals`
--
ALTER TABLE `fichapersonals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `ficha_producto_servicios`
--
ALTER TABLE `ficha_producto_servicios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `forma_pagos`
--
ALTER TABLE `forma_pagos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `honorarios`
--
ALTER TABLE `honorarios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `licencias`
--
ALTER TABLE `licencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `lista_precios`
--
ALTER TABLE `lista_precios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `m_a_fichapersonals`
--
ALTER TABLE `m_a_fichapersonals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `patentes`
--
ALTER TABLE `patentes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `prestadores`
--
ALTER TABLE `prestadores`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `prestadors`
--
ALTER TABLE `prestadors`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `producto_precios`
--
ALTER TABLE `producto_precios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `rendidores`
--
ALTER TABLE `rendidores`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `submarcas`
--
ALTER TABLE `submarcas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `sucursals`
--
ALTER TABLE `sucursals`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_documento_honorarios`
--
ALTER TABLE `tipo_documento_honorarios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_negocios`
--
ALTER TABLE `tipo_negocios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_productos`
--
ALTER TABLE `tipo_productos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `unidad_medidas`
--
ALTER TABLE `unidad_medidas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comunas`
--
ALTER TABLE `comunas`
  ADD CONSTRAINT `comunas_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Filtros para la tabla `detalle_honorarios`
--
ALTER TABLE `detalle_honorarios`
  ADD CONSTRAINT `fk_detalle_honorarios_honorarios` FOREIGN KEY (`honorarios_id`) REFERENCES `honorarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `honorarios`
--
ALTER TABLE `honorarios`
  ADD CONSTRAINT `fk_honorario_forma_pago` FOREIGN KEY (`forma_pago_id`) REFERENCES `forma_pagos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_honorario_prestadors` FOREIGN KEY (`prestadors_id`) REFERENCES `prestadors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_honorario_tipo_documento_honorario` FOREIGN KEY (`tipo_documento_honorario_Id`) REFERENCES `tipo_documento_honorarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prestadors`
--
ALTER TABLE `prestadors`
  ADD CONSTRAINT `fk_prestador_cargos` FOREIGN KEY (`cargos_id`) REFERENCES `cargos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prestador_comunas` FOREIGN KEY (`comunas_id`) REFERENCES `comunas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
