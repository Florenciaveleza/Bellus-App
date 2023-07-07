<?php

require_once 'conexion.php';

class productos {
    public $id;
    public $nombre;
    public $categoria;
    public $precio;
    public $descripcion;
    public $imagen;
    public $stock;

    //Función para mostrar los productos.
    public function catalogoProductos():array {
       
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "SELECT * FROM productos";
        $base = $db->prepare($query);
        $base->execute();
        $catalogo = [];

    
        while ($column = $base->fetch(PDO::FETCH_ASSOC)) {
            $productos = new self();
            $productos->id = $column['ID'];
            $productos->nombre = $column['nombre_producto'];
            $productos->categoria = $column['categoria_producto'];
            $productos->precio = $column['precio_producto'];
            $productos->descripcion = $column['descripcion_producto'];
            $productos->imagen = $column['imagen_producto'];
            $productos->stock = $column['stock'];
            $catalogo[] = $productos;
        }
    
        return $catalogo;
    }
    // Función para obtener el ID de cada producto
    public function traerId($id) {
        $catalogo = $this->catalogoProductos();
        $resultados = [];
    
        foreach ($catalogo as $producto) {
            if ($producto->id == $id) {
                $resultados[] = $producto;
            }
        }
    
        return $resultados;
    }

    public function guardarProducto($id, $nombre, $categoria, $precio, $descripcion, $imagen, $stock) {

        $conexion = new Conexion();
        $db = $conexion->getConexion();

        $sql = "UPDATE productos SET nombre_producto = :nombre, categoria_producto = :categoria, precio_producto = :precio, descripcion_producto = :descripcion, imagen_producto = :imagen, stock = :stock WHERE id = :id";
     
     
        $stmt = $db->prepare($sql);
     

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nombre', $nombre);
        $stmt->bindValue(':categoria', $categoria);
        $stmt->bindValue(':precio', $precio);
        $stmt->bindValue(':descripcion', $descripcion);
        $stmt->bindValue(':imagen', $imagen);
        $stmt->bindValue(':stock', $stock);
     
      
        if ($stmt->execute()) {
        
           return true;
        } else {
           
           return false;
        }
     }
     
    public function eliminarProducto($id) {
   
        $conexion = new Conexion();
        $db = $conexion->getConexion();
     
        $sql = "DELETE FROM productos WHERE id = :id";
     
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id);
     
        if ($stmt->execute()) {

          return true;
        } else {
          return false;
        }
      }

      public function agregarProducto($nombre, $categoria, $precio, $descripcion, $imagen, $stock ) {
        $conexion = new Conexion();
     
        $db = $conexion->getConexion();
     
        $sql = "INSERT INTO productos (nombre_producto, categoria_producto, precio_producto, descripcion_producto, imagen_producto, stock) VALUES (:nombre, :categoria, :precio, :descripcion, :imagen, :stock)";
     
        $stmt = $db->prepare($sql);
     
      
        $stmt->bindValue(':nombre', $nombre);
        $stmt->bindValue(':categoria', $categoria);
        $stmt->bindValue(':precio', $precio);
        $stmt->bindValue(':descripcion', $descripcion);
        $stmt->bindValue(':imagen', $imagen);
        $stmt->bindValue(':stock', $stock);
     
      
        if ($stmt->execute()) {
         
          return true;
        } else {
       
          return false;
        }
      }
     


}



?>