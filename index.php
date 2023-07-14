<?php

include_once 'resources/controllers/user.php';
include_once 'resources/controllers/user_session.php';

$userSession = new UserSession();
$user = new User();


if ($userSession->usuarioLogueado()) {
    include_once 'public/views/template/home.php';   
} else {
    include_once 'public/views/template/home.php';
}

?>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"
  ></script>