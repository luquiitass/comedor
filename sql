-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-08-2016 a las 14:31:23
-- Versión del servidor: 5.5.50-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `comedor.dev`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE IF NOT EXISTS `anuncios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cuerpo` longtext COLLATE utf8_unicode_ci NOT NULL,
  `hasta` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `anuncios_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id`, `titulo`, `cuerpo`, `hasta`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 'mama', 'jooj', '2016-08-19', '2016-08-10 15:22:15', '2016-08-10 15:22:15', 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_semanal`
--

CREATE TABLE IF NOT EXISTS `estados_semanal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lunes` tinyint(1) NOT NULL,
  `martes` tinyint(1) NOT NULL,
  `miercoles` tinyint(1) NOT NULL,
  `jueves` tinyint(1) NOT NULL,
  `viernes` tinyint(1) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `estados_semanal_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `estados_semanal`
--

INSERT INTO `estados_semanal` (`id`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `user_id`) VALUES
(28, 1, 1, 1, 1, 1, 46),
(35, 0, 0, 0, 0, 0, 55),
(36, 0, 0, 0, 0, 0, 56);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_usuarios`
--

CREATE TABLE IF NOT EXISTS `estado_usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `estado_usuarios`
--

INSERT INTO `estado_usuarios` (`id`, `nombre`, `descripcion`) VALUES
(2, 'activo', 'Este usuario se encuentra activo en el sistema'),
(3, 'inactivo', 'No asiste al comedor'),
(4, 'pendiente', 'Solicitud de registro por parte del usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faltas`
--

CREATE TABLE IF NOT EXISTS `faltas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `faltas_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `faltas`
--

INSERT INTO `faltas` (`id`, `fecha`, `user_id`) VALUES
(1, '2016-08-02', 46),
(16, '2016-08-04', 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_10_31_162633_scaffoldinterfaces', 2),
('2016_07_01_021145_estadossemanals', 3),
('2016_07_01_022414_alter_users_table', 4),
('2016_07_01_144004_alter1_users_table', 5),
('2016_07_06_041144_faltas', 6),
('2016_07_06_050307_anuncios', 7),
('2016_07_06_051250_anuncios', 8),
('2016_07_07_045314_estado_usuarios', 9),
('2016_07_07_165608_alter2UserTable', 10),
('2016_07_07_170922_alter2Estado_usuarioTable', 11),
('2016_07_08_133238_Alter3UserTable', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scaffoldinterfaces`
--

CREATE TABLE IF NOT EXISTS `scaffoldinterfaces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `views` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tablename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `scaffoldinterfaces`
--

INSERT INTO `scaffoldinterfaces` (`id`, `package`, `migration`, `model`, `controller`, `views`, `tablename`, `created_at`, `updated_at`) VALUES
(2, 'Laravel', '/var/www/html/comedor.dev/database/migrations/2016_07_01_021145_estadossemanals.php', '/var/www/html/comedor.dev/app/Estadossemanal.php', '/var/www/html/comedor.dev/app/Http/Controllers/EstadossemanalController.php', '/var/www/html/comedor.dev/resources/views/estadossemanal', 'estadossemanals', '2016-07-01 17:11:45', '2016-07-01 17:11:45'),
(3, 'Laravel', '/var/www/html/comedor.dev/database/migrations/2016_07_06_041144_faltas.php', '/var/www/html/comedor.dev/app/Falta.php', '/var/www/html/comedor.dev/app/Http/Controllers/FaltaController.php', '/var/www/html/comedor.dev/resources/views/falta', 'faltas', '2016-07-06 19:11:44', '2016-07-06 19:11:44'),
(5, 'Laravel', '/var/www/html/comedor.dev/database/migrations/2016_07_06_051250_anuncios.php', '/var/www/html/comedor.dev/app/Anuncio.php', '/var/www/html/comedor.dev/app/Http/Controllers/AnuncioController.php', '/var/www/html/comedor.dev/resources/views/anuncio', 'anuncios', '2016-07-06 20:12:50', '2016-07-06 20:12:50'),
(6, 'Laravel', '/var/www/html/comedor.dev/database/migrations/2016_07_07_045314_estado_usuarios.php', '/var/www/html/comedor.dev/app/Estado_usuario.php', '/var/www/html/comedor.dev/app/Http/Controllers/Estado_usuarioController.php', '/var/www/html/comedor.dev/resources/views/estado_usuario', 'estado_usuarios', '2016-07-07 19:53:14', '2016-07-07 19:53:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dni` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `legajo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado_id` int(10) unsigned NOT NULL,
  `tipo` enum('admin','comensal','ambos') COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_estado_id_foreign` (`estado_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=57 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `nombre`, `apellido`, `dni`, `legajo`, `telefono`, `estado_id`, `tipo`, `imagen`) VALUES
(46, 'Liquiitass@gmail.com', '$2y$10$UaJSmFhsNLXGY1CvZDz8COKSlydTYZ5RoLskTOnCpm6Om4PoW2fr2', 'Dr7SfI6gJzb2dNquF200QAEWN8xyouhBX40MG5lXNts343SxsYn8FtDm17Ql', '2016-07-31 23:03:57', '2016-08-11 14:06:32', 'lucas', 'Larrea', '36893090', 'ls005498', '3754460270', 2, 'ambos', 'storage/login2.png'),
(55, 'mimi@gmai.com', '$2y$10$VxwAcrl4RVpPtJWn8eLJ9up.oissX1CF3QLAbka4uv/XXQZUdRNsG', NULL, '2016-08-08 17:14:13', '2016-08-08 17:14:13', 'mimi', 'mama', '35.712.121', 'mi', '3754466594322', 4, 'comensal', ''),
(56, 'mama@gmai.com', '$2y$10$mZzMxQKxUvhBXIaKp8/Sb.fSHE0Rvhg00teZsD4EfIRYQfK8vudiK', NULL, '2016-08-11 14:07:00', '2016-08-11 14:07:00', 'mama', 'mamam', 'mamam', 'mam', 'mma', 4, 'comensal', '');

--
-- Disparadores `users`
--
DROP TRIGGER IF EXISTS `trigger_crear_estados_semanales`;
DELIMITER //
CREATE TRIGGER `trigger_crear_estados_semanales` AFTER INSERT ON `users`
 FOR EACH ROW begin
	INSERT INTO `estados_semanal`(`user_id`) VALUES (new.id);
end
//
DELIMITER ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `anuncios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estados_semanal`
--
ALTER TABLE `estados_semanal`
  ADD CONSTRAINT `estados_semanal_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `faltas`
--
ALTER TABLE `faltas`
  ADD CONSTRAINT `faltas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estado_usuarios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
