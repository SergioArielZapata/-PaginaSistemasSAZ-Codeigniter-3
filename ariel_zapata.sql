-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2022 a las 03:16:37
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ariel_zapata`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombreCate` varchar(100) NOT NULL,
  `asociada` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombreCate`, `asociada`) VALUES
(0, 'Todas las Categorías', 0),
(1, 'PCs', 1),
(2, 'Notebooks', 1),
(3, 'Hardware', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `codigo_postal` int(11) NOT NULL,
  `ciudad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `usuario_id`, `direccion`, `telefono`, `codigo_postal`, `ciudad`) VALUES
(6, 6, 'Tte. J.J. Arraras', '3794395144', 3400, 'Corrientes'),
(104, 37, 'La Paz 4567', '3794585487', 3400, 'Corrientes'),
(105, 38, 'Junin 2366', '3794395140', 3400, 'Corrientes'),
(106, 39, 'Los perales 2365', '379456765', 3460, 'Ituzaingo'),
(107, 40, 'Maipu 3344', '3794395150', 3400, 'Corrientes'),
(108, 41, 'Lamadrid 4565', '3794568745', 3400, 'Corrientes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `mensaje` mediumtext NOT NULL,
  `fecha` date DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `usuario`, `correo`, `perfil_id`, `mensaje`, `fecha`, `estado`) VALUES
(8, 'Sergio', 'sergio@sergio.com', 3, 'Hay descuento a jubilado?', '2022-05-23', 0),
(9, 'Sergio Ariel', 'ariel@ariel.com', 3, 'Que horarios manejan en feriado?', '2022-05-23', 0),
(10, 'Zapata, Ariel', 'cliente@cliente.com', 2, 'Aceptan Mercado Pago?', '2022-05-24', 0),
(11, 'Maria', 'maria@maria.com', 3, 'Necesito turno para llevar mi pc, si me pueden contestar por favor, gracias.', '2022-05-31', 0),
(12, 'Lazarte, Maria', 'maria@maria.com', 2, 'Cuando puedo retirar mis productos. gracias.', '2022-05-31', 0),
(13, 'Zapata, Ariel', 'cliente@cliente.com', 2, 'Necesito la reparacion de un equipo por favor enviarme un turno, gracias.', '2022-06-04', 0),
(94, 'sergio yo', 'yo@yo.com', 3, 'horarios por favor', '2022-06-04', 1),
(95, 'Zapata, Ariel', 'cliente@cliente.com', 2, 'Un turno por favor para arreglo de PC. Gracias', '2022-06-04', 1),
(98, 'Zapata, Ariel', 'cliente@cliente.com', 2, 'Necesito un horario para el mantenimiento de mi computadora', '2022-06-12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `perfilTipo` varchar(50) NOT NULL,
  `descripcion` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `perfilTipo`, `descripcion`) VALUES
(1, 'admin', 'Administrador del sitio para ABM(Altas-Bajas-Modificaciones)'),
(2, 'cliente', 'Usuario Registrado para poder comprar'),
(3, 'visitante', 'Usuario del sitio sin registrar en la base de datos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(999) NOT NULL,
  `precio` decimal(6,0) NOT NULL,
  `stock` int(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `imagen`, `estado`) VALUES
(1, 3, 'Auricular Techin 2.0', 'Auricular Gamer', '3000', 10, 'auricular 1.jpg', 1),
(2, 3, 'Auricular Logitech', 'Auricular economico', '1200', 13, 'auricular 2.jpg', 1),
(3, 1, 'Computadora Completa', 'PC completa Lenovo', '72000', 5, 'compu completa 1.jpg', 1),
(14, 1, 'Computadora Completa', 'PC completa economica Lenovo', '52000', 3, 'compu completa 2.jpg', 1),
(15, 3, 'Cooler Gamer Intel', 'Cooler Gamer 2.0', '7800', 10, 'cooler 1.jpg', 1),
(16, 3, 'Cooler Gamer Celeron', 'Cooler economico 2.0', '5800', 8, 'cooler 2.jpg', 1),
(17, 3, 'Fuente PC ', 'Fuente PC 750w', '6200', 5, 'fuente pc.jpg', 1),
(18, 1, 'Gabinete PC ', 'Gabinete 750w', '8200', 3, 'gabinete.jpg', 1),
(19, 3, 'Disco Rigido', 'HDD 1 Tb.', '7500', 5, 'hdd.jpg', 1),
(20, 1, 'Impresora Brother', 'Impresora 1200 whp', '24500', 2, 'impresora brother.jpg', 1),
(21, 1, 'Impresora HP', 'Impresora hp 2390 hp', '23999', 4, 'impresora hp.jpg', 1),
(22, 3, 'Impresora Samsung', 'Impresora Samsung 3200 ts', '29000', 2, 'impresora samsung.jpg', 1),
(23, 3, 'Memoria DDR4', 'Memoria PC DDR4  8GB', '12560', 8, 'memora ddr4.jpg', 1),
(25, 3, 'Memoria DDr4 8Gb Notebook', 'Memoria DDR4 8Gb Notebook Samung', '14500', 5, 'memoria note.jpg', 1),
(26, 3, 'Monitor 21\" HP', 'Monitor 21\" hp wd2000', '22700', 4, 'monitor 1.jpg', 1),
(27, 3, 'Monitor 29\" HP', 'Monitor 29\" hp hdwss30', '34000', 3, 'monitor 2.jpg', 1),
(28, 3, 'Mouse 2.0', 'Mouse economico Mask', '1800', 16, 'mouse 1.jpg', 1),
(29, 3, 'Mouse Gamer', 'Mouse Gamer 5500 M', '3800', 1, 'mouse 2.jpg', 1),
(30, 3, 'Teclado y Mouse', 'Pack Teclado y mouse Ronbios 2.0', '7600', 4, 'mouse y teclado.jpg', 1),
(31, 2, 'Notebook HP', 'Notebook HP gh2030', '76000', 2, 'note hp.jpg', 1),
(32, 2, 'Notebook Lenovo', 'Notebook Lenovo tr3000', '55999', 2, 'note lenovo.jpg', 1),
(33, 2, 'Notebook Mac', 'Notebook Mac mc300w', '95999', 3, 'note mac.jpg', 1),
(34, 2, 'Notebook Samsung', 'Notebook Samsung r400', '76999', 2, 'note samsung.jpg', 1),
(35, 3, 'Pad para mouse', 'Pad para mouse negro', '1099', 8, 'pad 1.jpg', 1),
(36, 3, 'Pad para mouse', 'Pad para mouse azul', '1099', 6, 'pad 2.jpg', 1),
(37, 3, 'Pad y mouse', 'Kit pad y mouse Logitech azul', '2099', 6, 'pad 3 pad y mouse.jpg', 1),
(38, 3, 'Parlante Gamer', 'Parlante Gamer 3000z', '9999', 2, 'parlantes 1.jpg', 1),
(39, 3, 'Parlante economico', 'Parlante economico escritorio Mask', '2999', 9, 'parlantes 2.jpg', 1),
(40, 3, 'Pendrive Verbatim', 'Pendrive Verbatim 32GB', '11000', 12, 'pendrive 1.jpg', 1),
(41, 3, 'Pendrive Kilowat', 'Pendrive Kilowat 32GB', '10500', 12, 'pendrive 2.jpg', 1),
(42, 1, 'Placa madre Omicron', 'Placa madre Omicron Gamer 3z4560', '32500', 4, 'placa madre 1.jpg', 1),
(43, 1, 'Placa madre Asus', 'Placa madre Asus  g97000', '27000', 6, 'placa madre 2.jpg', 1),
(44, 2, 'Placa madre Notebook', 'Placa madre Notebook HP  hp3300', '47000', 2, 'placa madre 3.jpg', 1),
(45, 1, 'Procesador Celeron', 'Procesador Celeron 4300 mhz w2229', '34999', 3, 'procesador celeron.jpg', 1),
(46, 1, 'Procesador Intel', 'Procesador Intel i3 6300 mhz 9 generacion', '34500', 5, 'procesador i3.jpg', 1),
(47, 1, 'Procesador Intel', 'Procesador Intel i7 7800 mhz 9 generacion', '44500', 4, 'procesador i7.jpg', 1),
(48, 1, 'Procesador Intel', 'Procesador Intel i9 8800 mhz 9 generacion', '54500', 3, 'procesador i9.jpg', 1),
(49, 1, 'Disco Solido', 'SSD 250 GB WD', '14999', 5, 'ssd 1.jpg', 1),
(50, 1, 'Disco Solido', 'SSD 128 GB Patriot', '10999', 4, 'ssd 2.jpg', 1),
(51, 3, 'Tarjeta Grafica', 'Tarjeta Grafica 32 GB', '12099', 7, 'tarjeta grafica 1.jpg', 1),
(52, 3, 'Tarjeta Grafica', 'Tarjeta Grafica 16 GB Toshiba', '10099', 6, 'tarjeta grafica 2.jpg', 1),
(53, 3, 'Teclado Gamer', 'Teclado Gamer Omicron 2.0 USB', '6999', 6, 'teclado 2.jpg', 1),
(54, 3, 'Wireless USB', 'Wireless USB Logitech 5G', '8999', 9, 'wireless 1.jpg', 1),
(55, 3, 'Wireless escritorio', 'Wireless escritorio Logitech 5G', '9999', 7, 'wireless 2.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `idPerfil` int(2) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `correo`, `usuario`, `pass`, `idPerfil`, `estado`) VALUES
(1, 'Ariel', 'Zapata', 'admin@admin.com', 'Administrador', 'YWRtaW4=', 1, 1),
(6, 'Ariel', 'Zapata', 'cliente@cliente.com', 'Ariel', 'Y2xpZW50ZQ==', 2, 1),
(37, 'SAZ', 'SAZ', 'saz@saz.com', 'saz1', 'MTIzNDEyMzQ=', 2, 0),
(38, 'Benjamin', 'Zapata', 'benja@benja.com', 'Benja', 'MTIzNDEyMzQ=', 2, 1),
(39, 'Jose Armando', 'Lucas', 'lucas@lucas.com', 'Lucas', 'MTIzNDEyMzQ=', 2, 0),
(40, 'Maria', 'Lazarte', 'maria@maria.com', 'Maria', 'MTIzNDEyMzQ=', 2, 0),
(41, 'Tomas', 'Gutierrez', 'tomas@tomas.com', 'Tomas', 'MTIzNDEyMzQ=', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_cabecera`
--

CREATE TABLE `ventas_cabecera` (
  `id_ventas` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `total_venta` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas_cabecera`
--

INSERT INTO `ventas_cabecera` (`id_ventas`, `fecha`, `usuario_id`, `total_venta`) VALUES
(3, '2022-05-25', 6, 72000.00),
(4, '2022-05-30', 6, 24500.00),
(5, '2022-05-30', 6, 3000.00),
(6, '2022-05-30', 38, 29998.00),
(7, '2022-05-30', 39, 21499.00),
(8, '2022-05-31', 40, 17798.00),
(9, '2022-05-31', 6, 119999.00),
(10, '2022-06-04', 6, 104000.00),
(11, '2022-06-04', 6, 49000.00),
(12, '2022-06-04', 6, 34999.00),
(13, '2022-06-09', 6, 19999.00),
(14, '2022-06-18', 6, 72000.00),
(15, '2022-06-18', 6, 44500.00),
(16, '2022-06-18', 6, 1200.00),
(17, '2022-06-18', 6, 18300.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id_detalle` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas_detalle`
--

INSERT INTO `ventas_detalle` (`id_detalle`, `venta_id`, `producto_id`, `cantidad`, `precio_venta`, `total`) VALUES
(5, 3, 3, 1, 72000.00, 72000.00),
(6, 4, 20, 1, 24500.00, 24500.00),
(7, 5, 1, 1, 3000.00, 3000.00),
(8, 6, 49, 2, 14999.00, 29998.00),
(9, 7, 1, 1, 3000.00, 3000.00),
(10, 7, 50, 1, 10999.00, 10999.00),
(11, 7, 19, 1, 7500.00, 7500.00),
(12, 8, 53, 2, 6999.00, 13998.00),
(13, 8, 29, 1, 3800.00, 3800.00),
(14, 9, 48, 2, 54500.00, 109000.00),
(15, 9, 50, 1, 10999.00, 10999.00),
(16, 10, 14, 2, 52000.00, 104000.00),
(17, 11, 20, 2, 24500.00, 49000.00),
(18, 12, 45, 1, 34999.00, 34999.00),
(19, 13, 49, 1, 14999.00, 14999.00),
(20, 13, 2, 1, 1200.00, 1200.00),
(21, 13, 29, 1, 3800.00, 3800.00),
(22, 14, 3, 1, 72000.00, 72000.00),
(23, 15, 47, 1, 44500.00, 44500.00),
(24, 16, 2, 1, 1200.00, 1200.00),
(25, 17, 25, 1, 14500.00, 14500.00),
(26, 17, 29, 1, 3800.00, 3800.00);

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
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `productos_ibfk_1` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `idPerfil` (`idPerfil`);

--
-- Indices de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD PRIMARY KEY (`id_ventas`);

--
-- Indices de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD PRIMARY KEY (`id_detalle`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  MODIFY `id_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
