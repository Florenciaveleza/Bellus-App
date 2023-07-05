<?php 
require_once 'conexion.php';

class Usuarios {
   public $id;
   public $nombre;
   public $email;
   public $password;


   public function traer_usuarios(): array {
      $conexion = new Conexion(); 
      $db = $conexion->getConexion(); 
      $query = "SELECT * FROM usuarios"; 
      $stmt = $db->prepare($query); 
      $stmt->execute(); 

      $usuarios = [];

      while ($column = $stmt->fetch(PDO::FETCH_ASSOC)) {
         $usuario = new self();
         $usuario->id = $column['id'];
         $usuario->nombre = $column['nombre'];
         $usuario->email = $column['email'];
         $usuario->password = $column['password'];
         $usuarios[] = $usuario;
      }

      return $usuarios;
   }
   

public function guardarUsuario($id, $nombre, $email, $password) {
    $passmd5 = md5($password);
    $conexion = new Conexion();
    $db = $conexion->getConexion();


    $sql = "UPDATE usuarios SET nombre = :nombre, email = :email, password = :password  WHERE id = :id";


    $stmt = $db->prepare($sql);


   $stmt->bindValue(':id', $id);
   $stmt->bindValue(':nombre', $nombre);
   $stmt->bindValue(':email', $email);
   $stmt->bindValue(':password', $passmd5);

   if ($stmt->execute()) {
      return true;
   } else {
      return false;
   }
}




public function eliminarUsuario($id) {
   
   $conexion = new Conexion();
   $db = $conexion->getConexion();


   $sql = "DELETE FROM usuarios WHERE id = :id";
   $stmt = $db->prepare($sql);
   $stmt->bindValue(':id', $id);

   if ($stmt->execute()) {
     return true;
   } else {
     return false;
   }
 }

 public function agregarUsuario($nombre, $email, $password) {
   $conexion = new Conexion();
    $passmd5 = md5($password);

   $db = $conexion->getConexion();

   $sql = "INSERT INTO usuarios (nombre, apellido, email, password, direccion) VALUES (:nombre, :apellido, :email, :password, :direccion)";

   $stmt = $db->prepare($sql);

   $stmt->bindValue(':nombre', $nombre);
   $stmt->bindValue(':email', $email);
   $stmt->bindValue(':password', $passmd5);

 

   if ($stmt->execute()) {

     return true;
   } else {
     return false;
   }
 }
 
}


?>
