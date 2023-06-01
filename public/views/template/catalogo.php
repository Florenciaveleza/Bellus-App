<?php
require_once "../../../resources/controllers/productos.php";

?>

<!DOCTYPE html>
<html lang="en">
<?php
    include "../parts/head.php";
?>
<body>
<?php
    include "../parts/header.php";
?>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col desktop-banner">
                <img class="img-fluid w-100" src="../assets/img/banner.jpg" alt="Beauty week">
            </div>
            <div class="col mobile-banner">
                <img class="img-fluid" src="../assets/img/banner-mobile.jpg" alt="Beauty week">
            </div>
        </div>
    </div>
<?php
    include "../parts/catalogo-productos.php"
?>
</section>
<?php
    include "../parts/footer.php";
?>
</body>
<script src="https://kit.fontawesome.com/2d24fe97a4.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>