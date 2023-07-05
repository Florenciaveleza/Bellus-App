<?php  
require_once "carrito.php";
$carrito = new Carrito();
$productoId = $_POST['productoId'];
$userId = $_POST['userId'];

if (isset($_POST['productoId']) && isset($_POST['userId']))  {
    
    $carrito->eliminarProducto($productoId, $userId);
    echo "Producto eliminado";
} else {
    echo "Error";
}
?>
