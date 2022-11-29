-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 07-11-2020 a las 23:33:14
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(30) NOT NULL,
  `email_cliente` varchar(30) NOT NULL,
  `pass_cliente` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `email_cliente`, `pass_cliente`) VALUES
(7, 'Juan', 'juan@gmail.com', '12345'),
(8, 'Pedro Ramirez', 'pedro@gmail.com', '12345'),
(9, 'Mario Juan', 'mario@gmail.com', '12345'),
(11, 'Maria de la Cruz', 'maria@gmail.com', '12345');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_orden`
--

INSERT INTO `detalle_orden` (`id_detalle`, `id_orden`, `id_producto`, `cantidad_producto`, `precio_producto`) VALUES
(1, 6, 1, 1, '13400.00'),
(5, 9, 5, 2, '667.00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id_direccion`, `id_cliente`, `direccion`, `municipio`, `ciudad`, `postal`) VALUES
(5, 11, '5to piso 8ta calle', 'San Pedro', 'San Marcos', '4563');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre_empleado` varchar(30) NOT NULL,
  `email_empleado` varchar(30) NOT NULL,
  `pass_empleado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre_empleado`, `email_empleado`, `pass_empleado`) VALUES
(12, 'Juan Pedro', 'jp@empresa.com', '12345');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `metodo_pago`
--

INSERT INTO `metodo_pago` (`id_mtdpago`, `id_cliente`, `nom_tarjeta`, `num_tarjeta`, `cvv_tarjeta`) VALUES
(1, 11, 'Maria', '1234567890', '123'),
(3, 6, 'bam', '456546541', '555');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id_orden` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_mtdpago` int(11) NOT NULL,
  `total_orden` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id_orden`, `id_cliente`, `id_mtdpago`, `total_orden`) VALUES
(2, 11, 1, '500.00'),
(3, 11, 1, '1200.00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `desc_producto`, `stock_producto`, `precio_producto`, `imagen_producto`, `categoria_producto`) VALUES
(1, 'ASUS', 'G512LU-AZ096T i7 10750H 2.6GHZ 16G DDR4 1TB 15.6', 3, '13400.00', 'Asus rog1.png', 1),
(2, ' MOUSE RAZER DEATHAD', 'GAMING MOUSE 8500 DPI 6 BOTONES', 5, '500.00', 'mouse death.png', 1),
(3, 'MONITOR DELL 27', ' MODELO E2720H 1920x1080 DISPLAY PORT Y VGA', 3, '1828.00', 'monitor_dell.png', 1),
(4, 'SAMSUNG TAB S6 10.5', 'OCTACORE 2.8+2.4GHZ 128GB 6GB GRIS SIM LTE', 6, '6978.00', 'samsung-galaxy.png', 1),
(5, 'MEMORIA NOTEBOOK KIN', '16GB DDR4 2666MHZ KVR26S19D8/16', 7, '667.00', 'RamDdr416GbKi.png', 1),
(6, 'WEBCAM REDRAGON', 'GW600 720p A 30 fps USB', 3, '281.00', 'Webcam.png', 1),
(7, 'ASUS LIQUID COOLER A', 'TRIPLE ROG 120 RGB ROG STRIX LC 360 RGB', 2, '2656.00', 'Asus_Liquid.png', 1),
(8, 'AUDIFONO REDRAGON SC', 'H901 GAMERS CON MICROFONO 3.5mm', 4, '182.00', 'Audifonos.png', 1),
(9, 'PROCESADOR AMD', 'RYZEN 7 3800XT CAJA', 5, '3651.00', 'ryzen7.png', 1),
(10, 'FUENTE DE PODER ASUS', '850W GOLD ROG-STRIX-850G', 2, '1719.00', 'Fuente.png', 1),
(11, 'DELL INSPIRON 5400', '2EN1 i51035G 1GHZ 8GB DDR4 256GB 14\" TOUCH WIN10', 2, '7199.00', 'dell_inspiration.png', 1),
(12, 'RELOJ HUAWEI', 'BAND4 ADS-B29 AMBER SUNRISE', 3, '271.00', 'huawei-band.png', 1),
(13, 'DELL INSPIRON', ' 3593 i5 1035G1 1GHZ 8GB 256GB SSD 15.6 W10H', 3, '5909.00', 'dell_3593.png', 2),
(14, ' HP PROBOOK 440 G7', ' i7 10510U 1.8GHZ 8GB DDR4 1TB 14\" W10PRO', 2, '7844.00', 'Hp_probook.png', 2),
(15, 'ASUS X512JP-EJ122T', 'i5 1035G1 1GHZ 8GB DDR4 1TB 15.6\" W10 MX330 2GB', 3, '6667.00', 'Asus_vivoBok.png', 2),
(16, 'DELL G5 5590', 'i7 9750H 2.6GHZ 16GB DDR4 128GB 1TB 15.6\" W10HOME', 4, '15849.00', 'Dell_G5.png', 2),
(17, 'HUAWEI MATEBOOK 13', 'WRTB-WAH9L i5 10210U 8GB LPDDR3 512GB 13\" W10H', 3, '7554.00', 'Huawei.png', 2),
(18, 'LENOVO IDEAPAD S145-14IIL', 'i3 1005G1 1.2GHZ 4GB DDR4 1TB 14\" W10H', 5, '4387.00', 'Lenovo.png', 2),
(19, 'HP 15-DY1022LA', 'i7 1065G7 1.3GHZ 12GB 256GB OPTANE 16GB 15.6 W10H', 5, '7720.00', 'HP_DY15.png', 2),
(20, 'HP PRODESK 400 G6 SFF', 'i5-8500 8GB RAM 1TB HDD W10 Pro + Monitor 19.5', 3, '6299.00', 'Hp_proDesk.png', 2),
(21, 'LENOVO LEGION Y540', 'i5-9300H 8GB RAM 1TB HDD 256GB SSD GTX 1650 4GB W10 Home', 2, '9839.00', 'lenovo_legion.png', 2),
(22, 'L120', 'IMPRESORA EPSON L120 SISTEMA CONTINUO', 6, '1200.00', 'L120-2.jpg', 3),
(23, 'L3110', 'IMPRESORA EPSON L3110 -CARTA - ESCANER - COPIAS', 4, '1400.00', '3110.jpg', 3),
(24, 'L3150', 'IMPRESORA EPSON L3150 WIFI - CARTA - ESCANER - COPIAS', 5, '1828.00', '3150.jpg', 3),
(25, 'L5190', 'IMPRESORA EPSON L5190 WIFI - OFICIO - ESCANER - COPIAS', 3, '2950.00', '5190.jpg', 3),
(26, 'G1100', 'IMPRESORA EPSON G1100 SISTEMA CONTINUO', 6, '975.00', '1100.jpg', 3),
(27, 'G2100', 'IMPRESORA CANON G2100 - CARTA - ESCANER - COPIAS', 4, '1350.00', '2100.jpg', 3),
(28, 'REGULADOR', ' Regulador de Voltaje Forza 1200va 8T', 5, '175.00', 'r1.jpg', 4),
(29, ' REGULADOR', 'Regulador de Voltaje Forza 1000va 4T', 4, '105.00', 'r2.jpg', 4),
(30, 'REGULADOR', 'Regulador de Voltaje Forza 2200va 8T', 3, '250.00', 'r3.jpg', 4),
(31, 'UPS', 'UPS con Regulador Forza 500va 6T', 4, '295.00', 'UPS1.jpg', 4),
(32, 'REPETIDOR', 'Repetidor TP-LINK WIFI TL-WA850', 6, '195.00', 'i1.jpg', 4),
(33, 'ROUTER', 'Router TP-LINK TL-MR3420', 7, '350.00', 'router.jpg', 4),
(34, 'REGLETA', 'Regleta Inteligente Nexxt', 7, '350.00', 'regle.png', 4),
(35, 'CAMARA DE VIGILANCIA', ' Camara de Vigilancia Nexxt Para Interiorires Motorizada', 8, '182.00', 'cama.png', 4),
(36, 'CABLE USB', ' CABLEBLE USB PARA IMPRESORA', 10, '25.00', 'CABLE.jpg', 4),
(37, 'MOUSE', 'MOUSE XTECH INALAMBRICO AZUL', 8, '75.00', 'MOUSE INAL.jpg', 4),
(38, 'HUB', 'EXPANSOR DE PUERTOS USB XTECH 4 PUERTOS - XTC6513', 9, '55.00', 'HUB.png', 4),
(39, 'CABLE HDMI', ' CABLE HDMI XTECH  1.8M XTC-48265', 5, '95.00', 'HDMI.png', 4),
(40, 'i12', 'Auto Pairing Touch using Siri conexion automatica', 6, '240.00', 'airpods.jpg', 5),
(41, 'Auriculares Gamer Luz led Azul', 'Excelente sonido Microfono Diseño Especial', 5, '490.00', 'auAzul.jpg', 5),
(42, 'Auriculares Gamer Camuflaje', 'Diseño Especial Sonido Envolvente Microfono', 4, '370.00', 'Au-Verdes.jpg', 5),
(43, 'Disco Duro Externo 1TB', 'THOSHIBA NEGRO', 6, '550.00', 'Disc.jpg', 5),
(44, 'Micro SD KINGSTON 16GB', 'Incluye Adaptador', 10, '50.00', 'image-14.png', 5),
(45, 'Micro SD KINGSTON 64GB', 'Incluye Adaptador', 8, '60.00', 'micro64.jpg', 5),
(46, 'Micro SD KINGSTON 8GB', 'Incluye Adaptador', 7, '40.00', 'MicroSd8.jpg', 5),
(47, 'USB KINGSTON 16GB', 'USB clasica', 8, '90.00', 'usbclasic.jpg', 5),
(48, 'USB SanDisk 8GB', 'Moderna USB negra', 7, '75.00', 'usbnegra.png', 5),
(49, 'Auriculares Gamer con Microfon', 'Profesionales Gamer Microfono Sonido Envolvente', 6, '390.00', 'auNegro.jpg', 5),
(50, 'Auriculares Iphone', 'Clasicos Auriculares Sonido Envolvente', 5, '190.00', 'Au-iphone.jpg', 5),
(51, 'USB STEREN 8GB', 'Moderna Usb con protector inclido', 6, '80.00', 'usbplata.jpg', 5),
(52, 'Preuba45', 'prueba56546', 2, '200.00', 'Fuente.png', 2);

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
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id_mtdpago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD CONSTRAINT `detalle_orden_ibfk_1` FOREIGN KEY (`id_orden`) REFERENCES `orden` (`id_orden`),
  ADD CONSTRAINT `detalle_orden_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Filtros para la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD CONSTRAINT `metodo_pago_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `orden_ibfk_2` FOREIGN KEY (`id_mtdpago`) REFERENCES `metodo_pago` (`id_mtdpago`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
