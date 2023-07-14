<?php

include_once 'resources/controllers/user.php';
include_once 'resources/controllers/user_session.php';

$userSession = new UserSession();
$user = new User();

if ($userSession->usuarioLogueado()) {
    $currentUserPrivilege = $userSession->getCurrentUser()['privilegio'];

    if ($currentUserPrivilege == 1) {
        include_once 'resources/controllers/admin/tabla.php';
    } else {
        include_once 'public/views/template/home.php';
    }
} elseif (isset($_POST['email']) && isset($_POST['password'])) {
    $userForm = $_POST['email'];
    $passForm = $_POST['password'];

    if ($user->userExists($userForm, $passForm)) {
        $usuarioPriv = $user->getUsuarioPrivilegio($userForm);

        $userSession->setUsuarioPrivilegio($usuarioPriv);


        if ($usuarioPriv == 1) {
            include_once 'resources/controllers/admin/tabla.php';
        } else {
            include_once 'public/views/template/home.php';
        }
    } else {
        $errorLogin = "Nombre de usuario y/o contraseña incorrectos";
        include_once 'login.php';
    }
} else {
    include_once 'login.php';
}

?>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"
></script>