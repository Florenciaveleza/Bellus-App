<!DOCTYPE html>
<html lang="en">
<?php
    include "public/views/parts/head.php";
    include_once 'resources/controllers/user.php';
    include_once 'resources/controllers/user_session.php';
?>

<body>
    <form action="" method="POST">
        <?php
        if (isset($errorLogin)) {
            echo $errorLogin;
        }
        ?>
        <h2>Iniciar sesión</h2>
        <label for="">Email</label>
        <input type="text" name="email">
        <label for="">Contraseña:</label>
        <input type="password" name="password">
        <input type="submit" value="Iniciar Sesión">
    </form>

</body>

</html>
