<?php

class UserSession{

    public function __construct(){
            session_start();
    }

    public function setCurrentUser($user){
        $_SESSION['user'] = $user;
    }

    public function getCurrentUser(){
        return $_SESSION['user'];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }

    public function setUsuarioPrivilegio($privilegio) {
        $_SESSION['user']['privilegio'] = $privilegio;
    }

    public function getUsuarioPrivilegio() {
        return $_SESSION['privilegio'];
    }

    public function usuarioLogueado() {
        return isset($_SESSION['user']);
    }
}

?>
