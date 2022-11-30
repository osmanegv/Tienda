-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2022 a las 07:22:10
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `factor_tecnologia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_elemento` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `nombre_cliente` varchar(30) NOT NULL,
  `email_cliente` varchar(30) NOT NULL,
  `pass_cliente` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `tipo_usuario`, `nombre_cliente`, `email_cliente`, `pass_cliente`) VALUES
(7, 1, 'Juan', 'juan@gmail.com', '12345'),
(8, 2, 'Pedro Ramirez', 'pedro@gmail.com', '12345'),
(9, 2, 'Mario Juan', 'mario@gmail.com', '12345'),
(11, 2, 'Maria de la Cruz', 'maria@gmail.com', '12345'),
(12, 2, 'Hugo', 'hugo@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden`
--

CREATE TABLE `detalle_orden` (
  `id_detalle` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_producto` int(11) DEFAULT NULL,
  `precio_producto` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_orden`
--

INSERT INTO `detalle_orden` (`id_detalle`, `id_orden`, `id_producto`, `cantidad_producto`, `precio_producto`) VALUES
(1, 6, 1, 1, '13400.00'),
(5, 9, 5, 2, '667.00'),
(8, 10, 2, 1, '500.00'),
(9, 11, 1, 1, '13400.00'),
(10, 12, 1, 1, '13400.00'),
(11, 13, 1, 1, '13400.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `id_direccion` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `postal` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id_direccion`, `id_cliente`, `direccion`, `municipio`, `ciudad`, `postal`) VALUES
(5, 11, '5to piso 8ta calle', 'San Pedro', 'San Marcos', '4563');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `id_mtdpago` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nom_tarjeta` varchar(50) DEFAULT NULL,
  `num_tarjeta` varchar(50) DEFAULT NULL,
  `cvv_tarjeta` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodo_pago`
--

INSERT INTO `metodo_pago` (`id_mtdpago`, `id_cliente`, `nom_tarjeta`, `num_tarjeta`, `cvv_tarjeta`) VALUES
(1, 11, 'Maria', '1234567890', '123'),
(3, 6, 'bam', '456546541', '555'),
(4, 9, 'Mario', '34567890987654', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id_orden` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_mtdpago` int(11) NOT NULL,
  `total_orden` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id_orden`, `id_cliente`, `id_mtdpago`, `total_orden`) VALUES
(2, 11, 1, '500.00'),
(3, 11, 1, '1200.00'),
(10, 9, 4, '500.00'),
(11, 9, 4, '13400.00'),
(12, 9, 4, '13400.00'),
(13, 9, 4, '13400.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(30) DEFAULT NULL,
  `desc_producto` varchar(100) DEFAULT NULL,
  `stock_producto` int(11) DEFAULT NULL,
  `precio_producto` decimal(10,2) DEFAULT NULL,
  `imagen_producto` varchar(50) DEFAULT NULL,
  `categoria_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `desc_producto`, `stock_producto`, `precio_producto`, `imagen_producto`, `categoria_producto`) VALUES
(1, 'Atornillador y Taladro', 'Kit  de Atornillador y Taladro de Impacto Makita', 10, '2450.00', 'kit_atornillador.jpg', 1),
(56, 'Ike Lite', 'Lámpara Colgante Acrílica', 10, '485.00', 'lampara_colgante.jpg', 1),
(57, 'Brigth Star Lighting', 'Lampara Colgante 3 Luces Color Café Cepillado E27', 5, '550.00', 'brigth.jpg', 1),
(58, 'Regleta', 'Regleta Forza negra 6 tomas (PS-001B)', 11, '50.00', 'regleta.png', 1),
(59, 'INGCO', 'Bomba de Agua Periférica 370W 0.5HP', 5, '357.00', 'bomba_agua.jpg', 1),
(60, 'INGCO', ' Botas de Seguridad con Punta de Acero Hypercharge Composite Negro Talla 43', 10, '290.00', 'botas.jpg', 1),
(61, 'Desarmadores', 'Truper Juego de Desarmadores de Joyero/Precisión 43 Piezas', 8, '139.00', 'juego_desarmadores.jpg', 3),
(62, 'Desarmadores Largos', 'Truper Juego de Desarmadores Largos de Precisión 15 Piezas', 8, '239.00', 'desarmadores_largos.jpg', 3),
(63, 'Caja de Herramientas', 'INGCO Caja de Herramientas Copas , Ratchet 1/4\" y destornillador 45 Piezas', 15, '222.00', 'caja_herramientas.jpg', 3),
(64, 'LLaves', '4 SETS DE LLAVES COLA CORONA EXTOL PREMIUM', 7, '283.00', 'set_llaves.jpg', 3),
(65, 'Cinceles', 'Juego de 5 cinceles y puntas', 15, '96.00', 'juego_cinceles.jpg', 3),
(66, 'Mini Alicates', 'Kendo Juego de 5 mini alicates', 8, '99.00', 'juego_minialicates.jpg', 3),
(67, 'Martillo', 'Martillo con Mango de Madera', 20, '34.00', 'martillo.jpg', 3),
(69, 'Cepillo', 'INGCO Cepillo para Madera 235mm', 11, '51.00', 'cepillo_madera.jpg', 3),
(70, 'Cuchara', 'INGCO Cuchara para Albañil 6\" Metal', 20, '21.00', 'cuchara_albañil.jpg', 3),
(71, 'Cuchara', 'INGCO Cuchara para Albañil 6\" Metal', 20, '21.00', 'cuchara_albañil.jpg', 3),
(72, 'Trozadora', 'Yato Tronzadora Maquina de corte para Metales 2,450 Watts', 2, '1350.00', 'trozadora.jpg', 2),
(73, 'Sierra Circular', 'Makita Sierra Circular M5801B 185MM 1050W', 8, '1135.00', 'cierra_circular.jpg', 2),
(74, 'Sierra Caladora', 'Makita Sierra Caladora M4301B 450W', 5, '890.00', 'sierra_caladora.jpg', 2),
(75, 'Taladro de Banco', 'INGCO Taladro de Banco 350W 110-120V 5 Velocidades', 6, '1113.00', 'taladro_banco.jpg', 2),
(76, 'Barreno', 'Makita Barreno/Taladro Percutor M0801B 500W 5/8\"', 7, '500.00', 'barreno.jpg', 2),
(77, 'Pulidora', 'Makita Pulidora M0920B 2200W 7\"', 8, '1210.00', 'pulidora.jpg', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_elemento`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_orden` (`id_orden`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`id_mtdpago`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id_orden`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_mtdpago` (`id_mtdpago`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_elemento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id_mtdpago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
