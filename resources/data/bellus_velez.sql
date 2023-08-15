-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2023 a las 23:05:08
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bellus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE TABLE `facturacion` (
  `ID` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facturacion`
--

INSERT INTO `facturacion` (`ID`, `usuario_id`, `total`) VALUES
(40, 21, '2750.00'),
(41, 21, '2750.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int(11) NOT NULL,
  `nombre_producto` varchar(100) DEFAULT NULL,
  `categoria_producto` varchar(50) DEFAULT NULL,
  `precio_producto` decimal(10,2) DEFAULT NULL,
  `descripcion_producto` varchar(255) DEFAULT NULL,
  `imagen_producto` varchar(100) DEFAULT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `nombre_producto`, `categoria_producto`, `precio_producto`, `descripcion_producto`, `imagen_producto`, `stock`) VALUES
(1, 'Crema Nivea Hidratante Intensiva', 'Faciales', '436.00', 'Una crema hidratante facial para mantener tu piel sana y saludable: hidrata y protege.', 'crema-nivea.webp', 16),
(2, 'Gel dermaglós limpiador facial', 'Faciales', '2750.00', 'Un gel limpiador facial suave y refrescante para eliminar impurezas y revitalizar.', 'gel-dermaglos.webp', 0),
(3, 'Tónico facial dermaglós', 'Faciales', '2730.00', 'Un tónico facial revitalizante para equilibrar el pH y refrescar la piel.', 'tonico-dermaglos.webp', 9),
(4, 'Serum rellenador LOreal París', 'Faciales', '5923.00', 'Un serum antiarrugas con ingredientes naturales para reducir las arrugas.', 'serum-loreal.webp', 20),
(5, 'Mascarilla para ojos Garnier', 'Faciales', '1253.00', 'Una mascarilla facial de arcilla purificante para limpiar los poros y revitalizar la piel.', 'mascarilla-garnier.webp', 16),
(6, 'Crema corporal bajo la ducha Nivea', 'Corporales', '839.00', 'Una crema corporal para nutrir la piel del cuerpo.', 'nivea-corporal.webp', 17),
(7, 'Crema reparadora de manos Avene', 'Corporales', '5808.00', 'Repara, calma y protege las manos muy secas e irritadas', 'crema-avene.webp', 20),
(8, 'Tónico Exfoliante corporal ACF By Dadatina', 'Corporales', '3190.00', 'Un exfoliante corporal suave que deja la piel renovada', 'exfoliante-acf.webp', 17),
(9, 'Loción corporal nutritiva Cetaphil', 'Corporales', '5090.00', 'Una loción corporal para hidratar profundamente la piel', 'locion-cetaphil.webp', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `privilegio` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `privilegio`) VALUES
(20, 'Florencia', 'florenciaveleza@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1'),
(21, 'flor', 'maria.velez@davinci.edu.ar', '827ccb0eea8a706c4c34a16891f84e7b', '0'),
(31, 'Florr', 'flor@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0'),
(32, 'Florencia', 'florenciaveleza@gmail.com', 'b59c67bf196a4758191e42f76670ceba', '0'),
(33, 'flor', 'fdsfds@gmail.com', '41ea31d329ff1f34dc8f63bb07cd83b7', '0'),
(34, 'Florencia', 'florenciaveleza@gmail.com', '149815eb972b3c370dee3b89d645ae14', '0'),
(35, 'florencia', 'florenciaveleza@gmail.com', '46b485f8e35bd5f7b1a82f2c5c573bbd', '0'),
(36, 'flor', 'florenciaveleza@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0'),
(37, 'flo', 'florenciaveleza@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0'),
(38, 'florenciaveleza@gmail.com', 'florenciaveleza@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `carrito_ibfk_2` (`producto_id`);

--
-- Indices de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- AUTO_INCREMENT de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`ID`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD CONSTRAINT `facturacion_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
