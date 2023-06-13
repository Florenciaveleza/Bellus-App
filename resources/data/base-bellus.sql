SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `productos` (
  `ID` int(11) PRIMARY KEY AUTO_INCREMENT,
  `nombre_producto` varchar(100) DEFAULT NULL,
  `categoria_producto` varchar(50) DEFAULT NULL,
  `precio_producto` decimal(10,2) DEFAULT NULL,
  `descripcion_producto` varchar(255) DEFAULT NULL,
  `imagen_producto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `usuarios` (
  `ID` int(11) PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contraseña` varchar(100) DEFAULT NULL,
  `dni` varchar(100) DEFAULT NULL,
  `domicilio` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `carrito` (
  `ID` int(11) PRIMARY KEY AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(ID),
  FOREIGN KEY (producto_id) REFERENCES productos(ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `facturacion` (
  `ID` int(11) PRIMARY KEY AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `pago` varchar(50) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `compra` (
  `ID` int(11) PRIMARY KEY AUTO_INCREMENT,
  `carrito_id` int(11) NOT NULL,
  `facturacion_id` int(11) NOT NULL,
  FOREIGN KEY (carrito_id) REFERENCES carrito(ID),
  FOREIGN KEY (facturacion_id) REFERENCES facturacion(ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `productos` (`ID`, `nombre_producto`, `categoria_producto`, `precio_producto`, `descripcion_producto`, `imagen_producto`) VALUES
(1, 'Crema Nivea Hidratante Intensiva', 'Faciales', '436.00', 'Una crema hidratante facial para mantener tu piel s', '../../public/views/assets/img/crema-nivea.webp'),
(2, 'Gel dermaglós limpiador facial', 'Faciales', '2750.00', 'Un gel limpiador facial suave y refrescante para e', '../../public/views/assets/img/gel-dermaglos.webp'),
(3, 'Tónico facial dermaglós', 'Faciales', '2730.00', 'Un tónico facial revitalizante para equilibrar el ', '../../public/views/assets/img/tonico-dermaglos.webp'),
(4, 'Serum rellenador LOreal París', 'Faciales', '5923.00', 'Un serum antiarrugas con ingredientes naturales pa', '../../public/views/assets/img/serum-loreal.webp'),
(5, 'Mascarilla para ojos Garnier', 'Faciales', '1253.00', 'Una mascarilla facial de arcilla purificante para ', '../../public/views/assets/img/mascarilla-garnier.webp'),
(6, 'Crema corporal bajo la ducha Nivea', 'Corporales', '839.00', 'Una crema corporal para nutrir la piel del cuerpo.', '../../public/views/assets/img/nivea-corporal.webp'),
(7, 'Crema reparadora de manos Avene', 'Corporales', '5807.00', 'Repara, calma y protege las manos muy secas e irri', '../../public/views/assets/img/crema-avene.webp'),
(8, 'Tónico Exfoliante corporal ACF By Dadatina', 'Corporales', '3190.00', 'Un exfoliante corporal suave que deja la piel reno', '../../public/views/assets/img/exfoliante-acf.webp'),
(9, 'Loción corporal nutritiva Cetaphil', 'Corporales', '5090.00', 'Una loción corporal para hidratar profundamente la', '../../public/views/assets/img/locion-cetaphil.webp');

COMMIT;
