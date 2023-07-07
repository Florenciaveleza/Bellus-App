<?php 
require_once 'conexion.php';

class Usuarios {
   public $id;
   public $nombre;
   public $email;
   public $password;
   public $privilegio;


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
         $usuario->privilegio = $column['privilegio'];
         $usuarios[] = $usuario;
      }

      return $usuarios;
   }
   

public function guardarUsuario($id, $nombre, $email, $password, $privilegio) {
    $passmd5 = md5($password);
    $conexion = new Conexion();
    $db = $conexion->getConexion();


    $sql = "UPDATE usuarios SET nombre = :nombre, email = :email, password = :password, privilegio = :privilegio  WHERE id = :id";


    $stmt = $db->prepare($sql);


   $stmt->bindValue(':id', $id);
   $stmt->bindValue(':nombre', $nombre);
   $stmt->bindValue(':email', $email);
   $stmt->bindValue(':password', $passmd5);
   $stmt->bindValue(':privilegio', $privilegio);

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

 public function agregarUsuario($nombre, $email, $password, $privilegio = 0) {
   $conexion = new Conexion();
    $passmd5 = md5($password);

   $db = $conexion->getConexion();

   $sql = "INSERT INTO usuarios (nombre, email, password, privilegio) VALUES (:nombre, :email, :password, :privilegio)";

   $stmt = $db->prepare($sql);

   $stmt->bindValue(':nombre', $nombre);
   $stmt->bindValue(':email', $email);
   $stmt->bindValue(':password', $passmd5);
   $stmt->bindValue(':privilegio', $privilegio);

 

   if ($stmt->execute()) {

     return true;
   } else {
     return false;
   }
 }
 
}


?>
