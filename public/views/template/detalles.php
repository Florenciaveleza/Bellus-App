<!DOCTYPE html>
<html lang="en">
<?php
    include "../parts/head.php";
?>

<body>
<?php

include "../parts/header.php";

require_once "../../../resources/controllers/productos.php";
$productos = new productos;

require_once "../../../resources/controllers/carrito.php";
$carrito = new carrito;



if (isset($_GET['id'])) {
  $resultado = $productos->traerId($_GET['id']);

  if (empty($resultado)) {
    echo 'No se encontraron resultados';
  } else {
    foreach ($resultado as $r) { ?>
        <section id="detalles">
              <div class="container">
                <div class="row d-flex align-items-center justify-contents-center">
                <div class="col cont-detalles d-flex align-items-center justify-content-center">
                    <img src="<?php echo $imgURL . $r->imagen ?>" alt="<?php echo $r->nombre ?>" class="img-sm img-fluid" />
                  </div>
                  <div class="col d-flex align-items-center justify-content-center ms-3">
                    <div>
                      <h2><?php echo $r->nombre ?></h2>
                      <p class="precio">$ <?php echo $r->precio ?></p>
                      <p>Categoría: <?php echo $r->categoria ?></p>
                      <p><?php echo $r->descripcion ?></p>
                      <input id="cantidad-input" class="form-control ms-auto mb-3" type="number" placeholder="Cantidad" aria-label="default input example">
                      <a href="#" class="btn btn-main" onclick="agregarAlCarrito(<?php echo $r->id; ?>)" id="agregar-carrito-btn">Agregar al carrito</a>

                    </div>
                  </div>
                </div>
              </div>
            </section>
      <?php } 
    }
  }


include "../parts/footer.php";
?>

</body>
<script>
function agregarAlCarrito(producto_id){
    $.ajax({
        type: 'POST',
        url: '../../../resources/controllers/agregarCarrito.php',
        data: {
            productoId: producto_id,
        },
        success: function(response) {
              location.reload();  
              console.log(response)
        },
        error: function() {
            alert("Error en la solicitud AJAX");
        }
    });
    
}



</script>
<!-- <script src="../assets/js/main.js"></script> -->
<script src="https://kit.fontawesome.com/2d24fe97a4.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>
