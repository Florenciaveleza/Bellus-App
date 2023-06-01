<!DOCTYPE html>
<html lang="en">
<?php
    include __DIR__ . "/public/views/parts/head.php";
?>

<body>
<?php
    include __DIR__ . "/public/views/parts/header.php";
?>
<main>
    <section class="container-fluid" id="hero">
        <div class="row d-flex align-items-center mx-auto ms-2">
            <div class="col-md-6 col-12 mt-5 hero-text d-flex align-items-center">
                <div>
                    <h1>No existen pieles perfectas, <br> existen pieles sanas.</h1>
                    <p>Encontrá los mejores productos para tu piel.</p>
                    <button class="btn-main"><a href="public/views/template/catalogo.php">Comprar</a></button>
                </div>
            </div>
            <div class="col-md-6 col-12 mt-5 d-flex justify-content-center">
                <img src="public/views/assets/img/hero.png" class="img-fluid img-sm" alt="beauty">
            </div>
        </div>
    </section>
</main>
<section id="consejos" class="d-flex align-items-center justify-content-center">
    <div class="container m-5">
        <div class="row">
            <div class="col-sm-12 col-lg-6 d-flex justify-content-center">
                <img src="public/views/assets/img/Foto-sobre-nosotros.png" alt="" class="img-fluid img-sm">
            </div>
            <div class="col-sm-12 col-lg-6 d-flex align-items-center mt-5 d-flex justify-content-center">
                <div>
                    <h2>Consejos</h2>
                    <p>Encontrá tu rutina ideal según tu tipo de piel. Vas a poder leer los mejores consejos por expertos. Hace de tu cuidado personal una prioridad. </p>
                    <a href="public/views/template/consejos.php" class="btn-secundario">Descubrí</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    include __DIR__ . "/public/views/parts/footer.php";
?>
</body>





<script src="https://kit.fontawesome.com/2d24fe97a4.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>
