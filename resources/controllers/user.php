<?php
include 'db.php';
require 'database.php';
class User {
    public $nombre;
    public $email;
    public $password;

    public function userExists($email, $password){
        $md5pass = md5($password);
        $config = require('config.php');
        $db = new Database($config['database']);
        $query = 'SELECT * FROM usuarios WHERE email = :email AND password = :password';
        $user = $db->query($query, ['email' => $email, 'password' => $md5pass])->fetch();

        if($user){
            $_SESSION['user']=$user;

            return true;
        }else{
            return false;
        }
    }

    // public function setUser($user){

    //     $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE email = :email');
    //     $query->execute(['email' => $user]);
        
    //     foreach ($query as $currentUser) {
    //         $this->nombre = $currentUser['nombre'];
    //         $this->email = $currentUser['email'];
    //     }
    // }
    
}
?>
