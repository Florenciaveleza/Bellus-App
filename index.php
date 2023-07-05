<?php

include_once 'resources/controllers/user.php';
include_once 'resources/controllers/user_session.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    // $user->setUser($userSession->getCurrentUser());
    include_once 'home.php';
} else if(isset($_POST['email']) && isset($_POST['password'])){

    $userForm = $_POST['email'];
    $passForm = $_POST['password'];

    if($user->userExists($userForm, $passForm)){
        // $userSession->setCurrentUser($userForm);
        // $user->setUser($userForm);

        include_once 'home.php';
    }else {
        $errorLogin = "Nombre de usuario y/o password es incorrecto";
        include_once 'login.php';
    }

}else {
    include_once 'login.php';
}


?>