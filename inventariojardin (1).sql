-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2025 a las 02:12:20
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
-- Base de datos: `inventariojardin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `fecha`) VALUES
(1, 'Frutas', '2025-02-09 19:15:30'),
(3, 'Carnes y Proteinas', '2025-02-09 19:15:52'),
(4, 'Lácteos y Derivados', '2025-01-30 22:52:57'),
(6, 'Cereales y Harinas', '2025-01-30 23:30:06'),
(7, 'Aceites y Grasas', '2025-02-01 00:09:35'),
(11, 'Verduras', '2025-02-09 19:15:41'),
(13, 'Plásticos desechables', '2025-02-24 21:59:26'),
(14, 'Bebidas', '2025-02-27 01:45:33'),
(15, 'Otros', '2025-04-08 22:57:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `correo` text NOT NULL,
  `telefono` text NOT NULL,
  `direccion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `correo`, `telefono`, `direccion`, `fecha`) VALUES
(1, 'Publico en general', 'karenquijano2406@gmail.com', '9997490756', 'C9 s/n entre 4 y 6', '2025-02-18 23:45:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `telefono` text NOT NULL,
  `sitioweb` text NOT NULL,
  `direccion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `telefono`, `sitioweb`, `direccion`, `fecha`) VALUES
(1, 'El Jardín de Edith ', '9999938588', 'Jardín de Edith', 'CALLE 35 x 22 S/N COLONIA SAN MARCOS IZAMAL YUCATAN', '2025-03-04 02:36:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradasp`
--

CREATE TABLE `entradasp` (
  `id` int(11) NOT NULL,
  `nombreEmpresa` text NOT NULL,
  `tipoEmpresa` text NOT NULL,
  `nombreProducto` text NOT NULL,
  `entradap` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `entradasp`
--

INSERT INTO `entradasp` (`id`, `nombreEmpresa`, `tipoEmpresa`, `nombreProducto`, `entradap`, `fecha`) VALUES
(22, 'COMA', 'Mayorista de distribución de abarrotes', 'Coca cola', 12, '2025-03-11 23:02:34'),
(30, 'COMA', 'Mayorista de distribución de abarrotes', 'Cereal', 6, '2025-03-11 23:41:54'),
(31, 'COMA', 'Mayorista de distribución de abarrotes', 'Cereal', 2, '2025-03-11 23:41:59'),
(36, 'COMA', 'Mayorista de distribución de abarrotes', 'Vasos de Frappé', 8, '2025-03-12 02:43:02'),
(37, 'COMA', 'Mayorista de distribución de abarrotes', 'Cereal', 2, '2025-03-12 02:44:14'),
(40, 'COMA', 'Mayorista de distribución de abarrotes', 'Pepinillo', 5, '2025-03-12 17:26:51'),
(41, 'COMA', 'Mayorista de distribución de abarrotes', 'Cereal', 5, '2025-03-12 17:27:04'),
(42, 'COMA', 'Mayorista de distribución de abarrotes', 'Cereal', 10, '2025-03-12 17:27:12'),
(43, 'COMA', 'Mayorista de distribución de abarrotes', 'Cereal', 9, '2025-03-12 17:27:27'),
(44, 'COMA', 'Mayorista de distribución de abarrotes', 'Cereal', 6, '2025-03-21 04:35:13'),
(45, 'COMA', 'Mayorista de distribución de abarrotes', 'Cereal', 2, '2025-03-25 20:27:27'),
(46, 'Frutería Carmelita', 'Distribuidor de Frutas y verduras', 'Bròcoli prueba', 3, '2025-04-04 02:34:51'),
(47, 'COMA', 'Mayorista de distribución de abarrotes', 'Cereal', 8, '2025-04-08 20:00:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacionesstock`
--

CREATE TABLE `notificacionesstock` (
  `id` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `valorStock` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `notificacionesstock`
--

INSERT INTO `notificacionesstock` (`id`, `idproducto`, `stock`, `valorStock`, `fecha`) VALUES
(37, 55, 4, 1, '2025-04-08 22:58:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `categoria` text NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `precioCompra` float NOT NULL,
  `precioVenta` float NOT NULL,
  `stock` int(11) NOT NULL,
  `caducidad` date DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria`, `nombre`, `descripcion`, `precioCompra`, `precioVenta`, `stock`, `caducidad`, `fecha`) VALUES
(32, 'Cereales y Harinas', 'Cereal', 'Cornflakes', 90, 105, 2, '2025-04-11', '2025-04-09 00:10:16'),
(36, 'Verduras', 'Pepinillo', 'pieza', 4, 5, 11, '2025-04-10', '2025-04-09 00:10:03'),
(48, 'Plásticos desechables', 'Vasos de Frappé', '14 oz', 78, 78, 10, NULL, '2025-03-21 04:10:48'),
(49, 'Lácteos y Derivados', 'Leche deslactosada light', '900 ml', 18, 22, 8, '2025-04-26', '2025-04-08 23:43:11'),
(50, 'Cereales y Harinas', 'Harina de Hotcakes', 'Bolsa grande', 210, 1, 5, '2026-02-02', '2025-04-09 00:02:28'),
(51, 'Bebidas', 'Coca cola', 'vidrio 500ml', 15, 27, 10, '2025-12-25', '2025-04-09 00:09:32'),
(53, 'Lácteos y Derivados', 'Lechera', 'Lata', 18, 18, 12, '2025-08-27', '2025-04-09 00:09:43'),
(55, 'Verduras', 'Bròcoli prueba', 'Pieza', 8, 12, 3, '2025-05-01', '2025-04-08 22:58:50'),
(56, 'Carnes y Proteinas', 'Carne Res', '', 75, 75, 4, '2025-04-15', '2025-04-08 23:43:29'),
(57, 'Otros', 'Inciensos', 'Caja ', 25, 40, 36, '2027-07-21', '2025-04-08 23:43:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `empresa` text NOT NULL,
  `tipoEmpresa` text NOT NULL,
  `correo` text NOT NULL,
  `telefono` text NOT NULL,
  `direccion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `empresa`, `tipoEmpresa`, `correo`, `telefono`, `direccion`, `fecha`) VALUES
(1, 'COMA', 'Mayorista de distribución de abarrotes', 'ventas@comasw.com ', '9996118100', 'C46 No. 472 x 51 y 53 Col. Centro.Mérida, Yucatán', '2025-02-04 22:15:11'),
(2, 'Super Willys Suc. Kimbila', 'Distribuidor Abarrotes y productos básicos', 'superwllsKimbila@gmail.com', '9889574420', 'Kimbilá, Yucatán, mexico', '2025-02-04 22:14:51'),
(5, 'Frutería Carmelita', 'Distribuidor de Frutas y verduras', 'fruteriacr@gmail.com', '9996454831', 'C28 N.105 entre 27 y 29 colonia San Diego, Tekantó', '2025-02-12 23:42:19'),
(7, 'Super el Ángel', 'Distribuidor Abarrotes y productos básicos', 's.angelizamal@gmail.com', '9889574420', 'C 9 SN entre 4 y 6 ', '2025-02-27 01:50:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidasp`
--

CREATE TABLE `salidasp` (
  `id` int(11) NOT NULL,
  `categoriap` text NOT NULL,
  `nombrep` text NOT NULL,
  `nombreCliente` text NOT NULL,
  `salidap` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `salidasp`
--

INSERT INTO `salidasp` (`id`, `categoriap`, `nombrep`, `nombreCliente`, `salidap`, `fecha`) VALUES
(37, 'Plásticos desechables', 'Vasos de Frappé', 'Publico en general', 14, '2025-03-05 01:07:21'),
(39, 'Verduras', 'Pepinillo', 'Publico en general', 5, '2025-03-11 22:10:58'),
(43, 'Cereales y Harinas', 'Harina de Hotcakes', 'Publico en general', 7, '2025-03-11 22:23:24'),
(51, 'Bebidas', 'Coca cola', 'Publico en general', 9, '2025-03-11 22:50:00'),
(64, 'Bebidas', 'Coca cola', 'Publico en general', 9, '2025-03-11 23:33:39'),
(70, 'Verduras', 'Pepinillo', 'Publico en general', 1, '2025-03-11 23:47:51'),
(84, 'Cereales y Harinas', 'Cereal', 'Publico en general', 4, '2025-03-12 17:27:55'),
(85, 'Verduras', 'Pepinillo', 'Publico en general', 3, '2025-03-12 18:28:52'),
(86, 'Bebidas', 'Coca cola', 'Publico en general', 18, '2025-03-20 22:29:11'),
(87, 'Cereales y Harinas', 'Cereal', 'Publico en general', 18, '2025-03-20 23:09:14'),
(88, 'Bebidas', 'Coca cola', 'Publico en general', 10, '2025-03-21 04:09:21'),
(89, 'Plásticos desechables', 'Vasos de Frappé', 'Publico en general', 3, '2025-03-21 04:10:47'),
(90, 'Verduras', 'Bròcoli prueba', 'Publico en general', 8, '2025-04-04 02:35:05'),
(91, 'Cereales y Harinas', 'Cereal', 'Publico en general', 3, '2025-04-08 20:00:58'),
(92, 'Lácteos y Derivados', 'Leche deslactosada light', 'Publico en general', 10, '2025-04-08 22:52:14'),
(93, 'Verduras', 'Bròcoli prueba', 'Publico en general', 4, '2025-04-08 22:58:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `perfil` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `fecha`) VALUES
(1, 'Nando', 'nando', '$2y$10$3Uzk4FBMN5Ny61iGHYC4jOytMBJrhoebAbew/92MIj0yFErPoZ4ZW', 'Especial', '2025-02-26 17:08:37'),
(12, 'Karen', 'admin', '$2y$10$VvmZ0qeHr3ydtPOFHWmdoeFq1VaWab6HZ1ABg1hZhCgbcOk03zI.2', 'Administrador', '2025-01-17 02:57:26'),
(17, 'Especial', 'especial', '$2y$10$voZMNRSdGTTkSZnLgSr13OPLXE2KBOoQ5csOUG.1oIkfsYyDjFfa2', 'Especial', '2025-02-24 20:43:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entradasp`
--
ALTER TABLE `entradasp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificacionesstock`
--
ALTER TABLE `notificacionesstock`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salidasp`
--
ALTER TABLE `salidasp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `entradasp`
--
ALTER TABLE `entradasp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `notificacionesstock`
--
ALTER TABLE `notificacionesstock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `salidasp`
--
ALTER TABLE `salidasp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
