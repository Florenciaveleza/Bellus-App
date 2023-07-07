<?php
require_once "../productos.php";
$productos = new productos();

  $nombre = $_POST['nombre'];
  $categoria = $_POST['categoria'];
  $precio = $_POST['precio'];
  $descripcion = $_POST['descripcion'];
  $imagen = $_POST['imagen'];
  $stock = $_POST['stock'];



  
  if ($productos->agregarProducto($nombre, $categoria, $precio, $descripcion, $imagen, $stock)) {

    echo "success";
  } else {

    echo "error";
  }

?>