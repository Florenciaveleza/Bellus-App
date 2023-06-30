<?php
require_once "carrito.php";
$carrito = new Carrito();

$productoId = $_POST['productoId'];
if(isset($_POST['productoId'])) {
    $carrito->agregarProducto($productoId);

} else {
    echo "ID del producto no recibido";
}
?>
