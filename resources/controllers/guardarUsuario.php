<?php
require_once "usuarios.php";


$productos = new Usuarios();


$id = $_POST['id'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];


if ($productos->guardarUsuario($id, $nombre, $email, $password)) {
   echo "Producto guardado correctamente";
} else {
   echo "Error al guardar el producto";
}

?>
