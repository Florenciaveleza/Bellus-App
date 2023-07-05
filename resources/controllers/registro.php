<?php
require_once 'conexion.php';

class Registro{
    public $nameUser;
    public $emailUser;
    public $passUser;

public function agregarUsuario($nameUser, $emailUser, $passUser) {
    $passmd5 = md5($passUser);
    $conexion = new Conexion(); 
    $db = $conexion->getConexion();
    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':nombre', $nameUser);
    $stmt->bindParam(':email', $emailUser);
    $stmt->bindParam(':password', $passmd5);
   
    if ($stmt->execute()) {
        return true;
        } else {
            return false;
        }
}
}