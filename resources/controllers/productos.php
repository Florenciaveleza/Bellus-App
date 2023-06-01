<?php

class productos {
    public $id;
    public $nombre;
    public $categoria;
    public $precio;
    public $descripcion;
    public $imagen;

    //Función para mostrar los productos.
    public function catalogoProductos():array {
       
        $json = file_get_contents(__DIR__ . "/../data/productos.json");
        $jsonData = json_decode($json);
        $catalogo = [];

    
        foreach ($jsonData as $value) {
            $productos = new self();
            $productos->id = $value->id;
            $productos->nombre = $value->nombre;
            $productos->categoria = $value->categoria;
            $productos->precio = $value->precio;
            $productos->descripcion = $value->descripcion;
            $productos->imagen = $value->imagen;
            $catalogo[] = $productos;
        }
    
        return $catalogo;
    }
    //Función para obtener el ID de cada producto
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