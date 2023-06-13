<?php

require_once 'conexion.php';

class productos {
    public $id;
    public $nombre;
    public $categoria;
    public $precio;
    public $descripcion;
    public $imagen;

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
}



?>