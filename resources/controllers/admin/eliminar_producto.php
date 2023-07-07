<?php
require_once "../productos.php";

$productos = new productos();


if (isset($_POST['id'])) {
    $id = $_POST['id'];  

    $productos = new Productos();
    if ($productos->eliminarProducto($id)) {
      echo "success";
    } else {
      echo "error";
    }
  }

?>