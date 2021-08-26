-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2021 a las 19:15:07
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
-- Base de datos: `cotele`
--

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
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id` bigint(20) NOT NULL,
  `sector` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mesa` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacidad` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id`, `sector`, `mesa`, `descripcion`, `capacidad`, `created_at`, `updated_at`) VALUES
(7, '7', '1', 'Mesa Simple', '2', '2021-08-06 03:41:31', '2021-08-09 23:00:54'),
(8, '8', '2', 'Mesa Normal', '4', '2021-08-06 03:41:47', '2021-08-09 23:01:01'),
(9, '9', '3', 'Mesa Normal', '4', '2021-08-06 05:31:58', '2021-08-09 23:01:09'),
(11, '11', '4', 'Mesa Simple', '2', '2021-08-06 12:13:47', '2021-08-09 23:01:15'),
(16, '16', '5', 'Mesa Familiar', '8', '2021-08-07 02:11:04', '2021-08-09 23:01:21'),
(19, '19', '6', 'Mesa Familiar', '8', '2021-08-09 23:00:22', '2021-08-09 23:01:29');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sucursal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adultos` int(30) NOT NULL,
  `niños` int(20) NOT NULL,
  `cantidad` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` int(20) NOT NULL,
  `comentario` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mesa` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `nombre`, `sucursal`, `dia`, `hora`, `adultos`, `niños`, `cantidad`, `email`, `celular`, `comentario`, `mesa`, `created_at`, `updated_at`) VALUES
(6, 'Carlos Saez  Ruiz', 'LLanquihue', '2021-08-19', '12:30 - 14:30', 3, 1, '4', 'carlos.csr@gmail.com', 97865456, 'cliente nuevo', 4, '2021-07-30 22:21:17', '2021-07-30 22:21:17'),
(7, 'katherinne mansilla', 'Puerto Varas', '2021-08-16', '18:30 - 20:30', 2, 1, '3', 'kmvaras@hotmail.com', 971713973, 'cliente nuevo', 7, '2021-07-31 01:56:32', '2021-07-31 01:56:32'),
(8, 'Rolando Silva', 'Frutillar', '2021-07-30', '20:30 - 22:30', 1, 1, '2', 'rsilva@directorybi.com', 931897759, 'Cliente frecuente', 1, '2021-08-02 11:58:23', '2021-08-02 15:58:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectores`
--

CREATE TABLE `sectores` (
  `id` bigint(20) NOT NULL,
  `id_sucursal` bigint(20) NOT NULL,
  `sucursal` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacidad` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sectores`
--

INSERT INTO `sectores` (`id`, `id_sucursal`, `sucursal`, `sector`, `capacidad`, `created_at`, `updated_at`) VALUES
(2, 4, 'Puerto Varas', 'Sector 2', '25', '2021-08-06 10:41:06', '2021-08-07 01:12:13'),
(3, 4, 'Puerto Varas', 'Terrazas', '20', '2021-08-06 10:42:47', '2021-08-06 10:42:47'),
(4, 4, 'Puerto Varas', 'Vip', '200', '2021-08-06 11:21:48', '2021-08-06 11:21:48'),
(5, 4, 'Puerto Varas', 'Terrazas2', '15', '2021-08-06 11:26:31', '2021-08-06 11:26:31'),
(12, 4, 'Puerto Varas', 'Salon 1', '100', '2021-08-06 12:27:53', '2021-08-09 21:07:16'),
(16, 4, 'Puerto Varas', 'Vip 2', '50', '2021-08-06 22:48:54', '2021-08-06 22:48:54'),
(17, 4, 'Puerto Varas', 'salon 2', '40', '2021-08-06 22:53:37', '2021-08-06 22:53:37'),
(19, 1, 'Frutillar', 'Pataguas', '50', '2021-08-06 23:14:51', '2021-08-06 23:14:51'),
(20, 1, 'Frutillar', 'Pampilla', '10', '2021-08-07 00:54:44', '2021-08-07 00:54:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursals`
--

CREATE TABLE `sucursals` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sucursals`
--

INSERT INTO `sucursals` (`id`, `nombre`, `abreviatura`, `created_at`, `updated_at`) VALUES
(1, 'Frutillar', 'Arturo pratt #3300', '2021-08-09 16:14:22', '2021-08-09 20:14:22'),
(2, 'Osorno', 'Los Carrera #1234', '2021-08-09 16:14:37', '2021-08-09 20:14:37'),
(4, 'Puerto Varas', 'Bernardo Ohiggins #1243', '2021-08-09 16:14:48', '2021-08-09 20:14:48'),
(5, 'Rio Negro', 'Villa pilmaiquen #134', '2021-07-30 14:39:48', '2021-07-30 14:39:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `puesto` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `puesto`) VALUES
(1, 'Wenceslao Ruiz', 'wenceslaoruizlagos@gmail.com', NULL, '$2y$10$ERa3y1W7MNTke0T6vdR84.hjAhWpwlQ4Cfrv23UaNUP.Af/vaH9gC', NULL, NULL, NULL, 'Administrativo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
