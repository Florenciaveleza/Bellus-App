<?php

require_once 'conexion.php';
require_once 'productos.php'; 

class Carrito {
    public $id;
    public $producto_id;
    public $usuario_id;
    public $cantidad;

    public function agregarProducto($productoId) {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $usuario_id = 1; // Suponiendo que tienes un usuario con ID 1
        $cantidad = 1; // Cantidad inicial del producto

        try {
            $query = "INSERT INTO carrito (producto_id, usuario_id, cantidad) VALUES (:producto_id, :usuario_id, :cantidad)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':producto_id', $productoId);
            $stmt->bindParam(':usuario_id', $usuario_id);
            $stmt->bindParam(':cantidad', $cantidad);
            $stmt->execute();

            return true; 
        } catch (PDOException $e) {
            echo "Error al agregar el producto al carrito: " . $e->getMessage();
            return false; 
        }
    }

    public function obtenerCarrito() {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "SELECT c.*, p.nombre_producto, p.descripcion_producto, p.precio_producto, p.imagen_producto 
        FROM carrito c 
        JOIN productos p 
        ON c.producto_id = p.ID";
        $base = $db->prepare($query);
        $base->execute();
        $carritoLista = [];

        while ($column = $base->fetch(PDO::FETCH_ASSOC)) {
            $carrito = new self();
            $carrito->id = $column['ID'];
            $carrito->producto_id = $column['producto_id'];
            $carrito->usuario_id = $column['usuario_id'];
            $carrito->cantidad = $column['cantidad'];

            $producto = new productos();
            $producto->id = $column['producto_id'];
            $producto->nombre = $column['nombre_producto'];
            $producto->descripcion = $column['descripcion_producto'];
            $producto->precio = $column['precio_producto'];
            $producto->imagen = $column['imagen_producto'];

            $carrito->producto = $producto;

            $carritoLista[] = $carrito;
        }

        return $carritoLista;
    }
}


?>
