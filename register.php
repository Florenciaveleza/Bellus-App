<!DOCTYPE html>
<html lang="en">
<?php
    include "public/views/parts/head.php";
    include_once "resources/controllers/registro.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
        $nameUser = $_POST['nameUser'];
        $emailUser = $_POST['emailUser'];
        $passUser = $_POST['passUser'];

        if(empty($nameUser) || empty($emailUser) || empty($passUser)) {
            echo "Complete todos los campos.";
        } else {
            $usuarios = new Registro();

            if($usuarios->agregarUsuario($nameUser, $emailUser, $passUser)) {
                echo "Usuario registrado correctamente";
                header('Location: http://localhost/APP/login.php');
                exit;
            } else {
                echo "Error al registrar usuario";
            }
        }
    }
?>
<body>
    <div class="container mt-5 form-login">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-6">
            <h2>registrarse</h2>
                <form method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text" name="nameUser" class="form-control" aria-describedby="basic-addon1" aria-label="Username">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="emailUser" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" name="passUser" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-main">Registrarse</button>
                </form>
                <div class="mt-3 register-a">
                        <a href="index.php">¿Ya tienes una cuenta? <span>Iniciar sesión</span></a>
                    </div>
            </div>
        </div>
    </div>
</body>
