-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2026 a las 15:06:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_servicios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT 'default.jpg',
  `categoria` enum('marketing','ciberseguridad','otros') DEFAULT 'otros',
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `titulo`, `descripcion`, `precio`, `imagen`, `categoria`, `fecha_creacion`) VALUES
(1, 'Master en COBOL', 'Domina el lenguaje que sostiene el sistema financiero global.', 0.00, 'cobol.png', 'otros', '2026-02-06 13:55:24'),
(2, 'Ciberseguridad con Fortinet', 'Configuración de firewalls y seguridad perimetral avanzada.', 59.99, 'fortinet.png', 'ciberseguridad', '2026-02-06 13:55:24'),
(3, 'Desarrollo Backend con Java', 'Crea aplicaciones robustas con el lenguaje más usado en empresas.', 45.00, 'java.png', 'otros', '2026-02-06 13:55:24'),
(4, 'JavaScript Moderno ES6+', 'Domina el lenguaje de la web desde las bases hasta frameworks.', 30.00, 'javascript.png', 'otros', '2026-02-06 13:55:24'),
(5, 'jQuery para Proyectos Legacy', 'Manipulación eficiente del DOM en sistemas existentes.', 15.00, 'jquery.png', 'otros', '2026-02-06 13:55:24'),
(6, 'Administración de Linux', 'Gestión de servidores, terminal y permisos avanzados.', 35.00, 'linux.png', 'otros', '2026-02-06 13:55:24'),
(7, 'Marketing Digital Estratégico', 'SEO, SEM y gestión de comunidades online.', 25.00, 'marketing.jpg', 'marketing', '2026-02-06 13:55:24'),
(8, 'Programación de PLC', 'Automatización industrial y control de procesos.', 75.00, 'plc.png', 'otros', '2026-02-06 13:55:24'),
(9, 'Python para Inteligencia Artificial', 'Análisis de datos y creación de modelos predictivos.', 40.00, 'python.png', 'otros', '2026-02-06 13:55:24'),
(10, 'Seguridad de la Información', 'Fundamentos de protección de datos y normas ISO.', 49.99, 'seguridad.png', 'ciberseguridad', '2026-02-06 13:55:24'),
(11, 'Bases de Datos SQL Server', 'Diseño, consultas complejas y optimización de tablas.', 30.00, 'sql.png', 'otros', '2026-02-06 13:55:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `fecha_inscripcion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id`, `usuario_id`, `curso_id`, `fecha_inscripcion`) VALUES
(1, 11, 1, '2026-02-06 13:06:49'),
(2, 11, 1, '2026-02-06 13:08:33'),
(3, 11, 1, '2026-02-06 13:13:38'),
(4, 13, 1, '2026-02-06 13:24:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructores`
--

CREATE TABLE `instructores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `datos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lecciones`
--

CREATE TABLE `lecciones` (
  `id` int(11) NOT NULL,
  `modulo_id` int(11) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `texto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `orden` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id`, `curso_id`, `titulo`, `orden`) VALUES
(11, 1, 'Introducción a Master en COBOL', 1),
(12, 2, 'Introducción a Ciberseguridad con Fortinet', 1),
(13, 3, 'Introducción a Desarrollo Backend con Java', 1),
(14, 4, 'Introducción a JavaScript Moderno ES6+', 1),
(15, 5, 'Introducción a jQuery para Proyectos Legacy', 1),
(16, 6, 'Introducción a Administración de Linux', 1),
(17, 7, 'Introducción a Marketing Digital Estratégico', 1),
(18, 8, 'Introducción a Programación de PLC', 1),
(19, 9, 'Introducción a Python para Inteligencia Artificial', 1),
(20, 10, 'Introducción a Seguridad de la Información', 1),
(21, 11, 'Introducción a Bases de Datos SQL Server', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `servicio_id` int(11) DEFAULT NULL,
  `fecha_pedido` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` enum('pendiente','en proceso','completado') DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `tiempo_entrega` varchar(50) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `descripcion`, `precio`, `tiempo_entrega`, `imagen`) VALUES
(1, 'Landing Page Pro', 'Una página ideal para captar clientes.', 150.00, '24h', 'default.png'),
(5, 'pagina de ventas', 'pagina web de ventas de carros', 900.67, '24h', 'default.png'),
(6, 'limpieza ', 'pagina web para el servicio a la habitaciòn de un hotel', 100.03, '24h', 'default.png'),
(9, 'hoteleria', 'hoteles en venecia italia', 100.00, '24h', 'default.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('admin','cliente') DEFAULT 'cliente',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `foto_usuario` varchar(255) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol`, `created_at`, `foto_usuario`) VALUES
(1, 'Administrador', 'admin@correo.com', '123456', 'admin', '2026-01-29 00:13:48', 'default.png'),
(2, 'angel padron ', 'hol@gmail.com', '$2y$10$El9mN.oTKQ94Pzt7vyID4.1uL3KdVHVCZjLO0X4O4d4IKVSkLgYBS', 'cliente', '2026-01-30 00:35:34', 'default.png'),
(3, 'pascal', 'pascal@gmail.com', '$2y$10$ofcz95MQf0VRBjvwWt7ZCesWEYCwYlLA/PzN2ghxPWMVAo00KWOhC', 'cliente', '2026-01-30 16:08:03', 'default.png'),
(4, 'loro', 'loro@gmail.com', '$2y$10$1I9dCIzodctDyAPrhURBQearoKDdT1j6yBir.brsvj4yN18SHUuuO', 'cliente', '2026-01-30 16:16:57', 'default.png'),
(5, 'luz', 'lu@gmail.com', '$2y$10$YM/ta2iZKlseq.yKKXr0xegeKGyR.wQFox58cspDHryTNvKgjVFby', 'cliente', '2026-01-30 16:30:36', 'default.png'),
(6, 'gabriela', 'g@gmail.com', '$2y$10$H4Cl3C/tMblnFtbsiLZwAOEv2uSTnG7pzeWlZLQEQOitm7Ko6JJD2', 'cliente', '2026-01-30 17:07:57', 'default.png'),
(9, 'pagina ', 'pip@gmail.com', '$2y$10$cDzVIOrUtZt.oKHquuK7m.Mz40fZrt6oOJwqYKNHFic08xOP3kf7W', 'cliente', '2026-02-04 13:30:04', 'default.png'),
(10, 'angel', 'hola@gmail.com', '$2y$10$U8L3d5pmJ1o7./KxFNUccO3mD.BUoCcCBULt1Z4NlqqqDxPHTE3Q.', 'cliente', '2026-02-06 04:19:10', 'default.png'),
(11, 'Angel', 'que@gmail.com', '$2y$10$hpGX/p65V00bb8SmVxgGDuZMiFzWpK/qzu8HO1otOSWJPXK313T12', 'cliente', '2026-02-06 12:42:28', 'default.png'),
(13, 'Angel Padron', '123@gmail.com', '$2y$10$4gPpkXPVOmeYl8kFQW8WkOlh/5ata1BOxlQHaO2SUMl.mF4RObZDq', 'cliente', '2026-02-06 13:23:53', 'default.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `instructores`
--
ALTER TABLE `instructores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lecciones`
--
ALTER TABLE `lecciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lecciones_modulo` (`modulo_id`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_modulos_curso` (`curso_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `servicio_id` (`servicio_id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `instructores`
--
ALTER TABLE `instructores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lecciones`
--
ALTER TABLE `lecciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lecciones`
--
ALTER TABLE `lecciones`
  ADD CONSTRAINT `fk_lecciones_modulo` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD CONSTRAINT `fk_modulos_curso` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
