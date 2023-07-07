<!DOCTYPE html>
<html lang="en">
<?php session_start();
    include "../parts/head.php";
    include "../../../resources/controllers/usuarios.php"
?>
<body>
<?php
    include "../parts/header.php";
?>
<section class="d-flex justify-content-center align-items-center">
    <div class="m-5 text-center">
        <h2><?php 
              $nombreUsuario = isset($_SESSION['user']['nombre']) ? $_SESSION['user']['nombre'] : '';
              echo $nombreUsuario;
        ?></h2>
        <p>Gracias por tu compra!</p>
        <img src="../assets/img/Foto-sobre-nosotros.png" class="img-fluid img-sm" alt="cosmetica">
    </div>
    
</section>
<?php
    include "../parts/footer.php";
?>
</body>
<script src="https://kit.fontawesome.com/2d24fe97a4.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>