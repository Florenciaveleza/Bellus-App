<?php
require_once "facturacion.php";
require_once "carrito.php";
$facturacion = new Facturacion();
$carrito = new Carrito();

$userId = $_POST['userId'];
$totalPago = $_POST['total'];

if (isset($_POST['userId']) && !empty($totalPago)) {
    $facturacion->insertarFacturacion($userId, $totalPago);
    echo "Compra";
} else {
    echo "Error";
}


$carrito->vaciarCarrito();
?>