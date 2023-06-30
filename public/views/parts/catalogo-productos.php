<?php

$catalogoProductos = new productos;
$productos = $catalogoProductos->catalogoProductos(); 


?>

<!-- <select class="form-select" aria-label="Default select example">
  <option selected>Todo</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select> -->
  <div class="container overflow-hidden d-flex justify-content-center">
    <div class="row justify-content-center">
      <?php foreach ($productos as $producto) {?>
      <div class="col-md-4 d-flex justify-content-center">
        <div class="card mb-4" style="width: 18rem">
        <a href="detalles.php?id=<?= $producto->id ?>"><img class="card-img-top img-sm" src="<?php  echo $imgURL . $producto->imagen ?>" alt="skincare" /></a>
          <div class="card-body">
            <h5 class="card-title">
            <a class="detalles-a" href="detalles.php?id=<?= $producto->id ?>"><?php echo $producto->nombre ?></a>
            </h5>
            <p class="card-text"><?php echo $producto->descripcion ?></p>
            <p class="card-text">$ <?php echo $producto->precio ?></p>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
