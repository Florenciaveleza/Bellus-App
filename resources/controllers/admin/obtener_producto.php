<?php
require_once "../productos.php";


$productos = new productos();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$imagen = $_POST['imagen'];
$stock = $_POST['stock'];


if ($productos->guardarProducto($id, $nombre, $categoria, $precio, $descripcion, $imagen, $stock)) {

 
   echo "Producto guardado correctamente";
} else {

   echo "Error al guardar el producto";
}

?>