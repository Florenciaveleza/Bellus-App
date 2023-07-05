<?php  
require_once "carrito.php";
$carrito = new Carrito();
$productoId = $_POST['productoId'];

    
if (isset($_POST['productoId']))  {
    
    $carrito->sumarProducto($productoId);
    echo "Producto agregado al carrito exitosamente";
} else {
    echo "Error al agregar el producto al carrito. Los datos no fueron recibidos correctamente";
}
?>
