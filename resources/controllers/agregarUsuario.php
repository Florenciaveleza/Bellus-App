<?php
require_once "usuarios.php";

$usuarios = new Usuarios();


  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $password = $_POST['password'];


  if ($usuarios->agregarUsuario($nombre, $email, $password, $privilegio)) {
    echo "success";
  } else {
    echo "error";
  }
?>