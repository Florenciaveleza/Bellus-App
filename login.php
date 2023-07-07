<!DOCTYPE html>
<html lang="en">
<?php
    include "public/views/parts/head.php";
    include_once 'resources/controllers/user.php';
    include_once 'resources/controllers/user_session.php';
?>

<body>
    <main class="container form-login">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-6">
                <form action="" method="POST">
                <?php
                    if (isset($errorLogin)) {
                            echo $errorLogin;
                    }
                ?>
                <h2>Iniciar sesión</h2>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control">
                </div>
                    <button type="submit" class="btn btn-main">Iniciar sesión</button>
                </form>
                <div class="mt-3 register-a">
                    <a href="register.php">¿Eres un nuevo usuario? <span>Crear una cuenta</span></a>
                </div>
               
            </div>
            
        </div>
        
    </main>
</body>
</html>

