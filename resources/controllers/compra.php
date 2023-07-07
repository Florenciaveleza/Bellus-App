<?php
require_once "facturacion.php";
$facturacion = new Facturacion();

$userId = $_POST['userId'];
$totalPago = $_POST['total'];

if (isset($_POST['userId']) && !empty($totalPago)) {
    $facturacion->insertarFacturacion($userId, $totalPago);
    echo "Compra";
} else {
    echo "Error";
}
?>
