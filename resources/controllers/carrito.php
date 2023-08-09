<?php

require_once 'conexion.php';
require_once 'productos.php'; 

class Carrito {
    public $id;
    public $producto_id;
    public $usuario_id;
    public $cantidad;
    public $stock;

    public function obtenerCarrito($userId) {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = 
        "SELECT c.id, c.producto_id, c.cantidad, c.usuario_id, p.nombre_producto, p.imagen_producto, p.descripcion_producto, p.precio_producto, p.stock
              FROM carrito c  
              JOIN productos p ON c.producto_id = p.id
              WHERE c.usuario_id = :usuario_id";
              
        $stmt = $db->prepare($query);
        $stmt->bindParam(':usuario_id', $userId);
        $stmt->execute();
        $carritoLista = [];
        $contador = 0;

        while ($column = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $carrito = new self();
            $carritoLista[$contador]['id'] = $column['id'];
            // $carrito->producto_id = $column['producto_id'];
            // $carrito->usuario_id = $column['usuario_id'];
            $carritoLista[$contador]['cantidad']  = $column['cantidad'];
            

            $producto = new productos();
            // $producto->id = $column['producto_id'];
            $carritoLista[$contador]['nombre'] = $column['nombre_producto'];
            $carritoLista[$contador]['descripcion'] = $column['descripcion_producto'];
            $carritoLista[$contador]['precio'] = $column['precio_producto'];
            $carritoLista[$contador]['imagen'] = $column['imagen_producto'];
            $contador = $contador + 1;
            // $producto->stock = $column['stock'];

            // $carrito->producto = $producto;

            // $carritoLista[] = $carrito;
        
        }
        $carritoLista = json_decode(json_encode($carritoLista, JSON_FORCE_OBJECT));
         return $carritoLista;

    
    }
    public function agregarProducto($productoId, $userId) {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "SELECT id, cantidad FROM carrito WHERE producto_id = :producto_id AND usuario_id = :usuario_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':producto_id', $productoId);
        $stmt->bindParam(':usuario_id', $userId);
        $stmt->execute();

        $productoExiste = $stmt->fetch(PDO::FETCH_ASSOC);

        if($productoExiste) {
            $carritoId = $productoExiste['id'];
            $cantidadCarrito = $productoExiste['cantidad'];

            $query = "UPDATE carrito SET cantidad = cantidad + 1 WHERE id = :carrito_id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':carrito_id', $carritoId);
            $stmt->execute();
        }else {
            $query = "INSERT INTO carrito (producto_id, usuario_id, cantidad) VALUES (:producto_id, :usuario_id, 1)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':producto_id', $productoId);
            $stmt->bindParam(':usuario_id', $userId);
            $stmt->execute();
        }
        $query = "UPDATE productos SET stock = stock - 1 WHERE id = :id AND stock > 0";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $productoId);
        $stmt->execute();

    return true;

    }

    public function sumarProducto($productoId) {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "SELECT id, cantidad FROM carrito WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $productoId);
        $stmt->execute();

        $productoExiste = $stmt->fetch(PDO::FETCH_ASSOC);

        if($productoExiste) {
            
            $carritoId = $productoExiste['id'];
            $cantidadCarrito = $productoExiste['cantidad'];

            $query = "UPDATE carrito SET cantidad = cantidad + 1 WHERE id = :carrito_id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':carrito_id', $carritoId);
            $stmt->execute();
        }
        $query = "UPDATE productos SET stock = stock - 1 WHERE id = :id AND stock > 0";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $productoId);
        $stmt->execute();

    return true;

    }

    function eliminarProducto($productoId, $userId) {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "SELECT id, cantidad FROM carrito WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $productoId);
        $stmt->execute();
    
        $productoEnCarrito = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($productoEnCarrito) {
            $carritoId = $productoEnCarrito['id'];
            $cantidadCarrito = $productoEnCarrito['cantidad'];
    
            $query = "UPDATE carrito SET cantidad = cantidad - 1 WHERE id = :carrito_id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':carrito_id', $carritoId);
            $stmt->execute();
    
            if ($cantidadCarrito == 1) {
                $query = "DELETE FROM carrito WHERE id = :carrito_id";
                $stmt = $db->prepare($query);
                $stmt->bindParam(':carrito_id', $carritoId);
                $stmt->execute();
            }
    
            $query = "UPDATE productos SET stock = stock - 1 WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $productoId);
            $stmt->execute();
            
        }
    }

    public function calcularTotal($userId) {
        $conexion = new Conexion();
        $db = $conexion->getConexion();

        $query = "SELECT SUM(productos.precio_producto * carrito.cantidad) AS total 
                FROM carrito 
                INNER JOIN productos ON carrito.producto_id = productos.id 
                WHERE carrito.usuario_id = :usuario_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':usuario_id', $userId);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $total = $result['total'];

        return $total;
    }

    public function vaciarCarrito() {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
    
        $query = "DELETE FROM carrito";
        $base = $db->prepare($query);
        $base->execute();
    
        return true;
    }

    public function contadorCarrito($userId) {
        $carrito = $this->obtenerCarrito($userId);
        $contador = 0;
    
        foreach ($carrito as $item) {
            $contador += $item->cantidad;
        }
    
        return $contador;
    }

}


?>
