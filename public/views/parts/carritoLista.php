<?php 
define('APP_ROOT', 'C:xampp/htdocs/App/');
require_once  APP_ROOT . "resources/controllers/carrito.php";
require_once APP_ROOT . "resources/controllers/productos.php";
$carrito = new carrito;
if (isset($_SESSION['user']['id'])) {
  $productosEnCarrito = $carrito->obtenerCarrito($_SESSION['user']['id']);
} else {
  $productosEnCarrito = [];
}



$currentUrl = $_SERVER['REQUEST_URI'];

    $imgURL;

    if (strpos($currentUrl, 'home.php') !== false) {
        $imgURL = 'public/views/assets/img/';
    } else {
        $imgURL = 'http://localhost/APP/public/views/assets/img/';
    }

    $rutaEliminar;
    if (strpos($currentUrl, 'home.php') !== false) {
      $rutaEliminar = 'resources/controllers/eliminarProducto.php';
  } else {
      $rutaEliminar = 'http://localhost/APP/resources/controllers/eliminarProducto.php';
  }

  $rutaAgregar;
    if (strpos($currentUrl, 'home.php') !== false) {
      $rutaAgregar = 'resources/controllers/agregarCarrito.php';
  } else {
      $rutaAgregar = 'http://localhost/APP/resources/controllers/sumarProducto.php';
  }

?>
    <section>
            <div
              class="offcanvas offcanvas-end"
              tabindex="-1"
              id="offcanvasRight"
              aria-labelledby="offcanvasRightLabel"
            >
            <div class="offcanvas-header">
            <h2 id="offcanvasRightLabel">Carrito</h2>
            <button
              type="button"
              class="btn-close text-reset"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
            </div>
            <div class="offcanvas-body">
              <div class="container">
              <?php foreach ($productosEnCarrito as $p) {?>
                <div class="row ms-3">
                </div>
                <div class="row">
                  <div class="col">
                  <img src="<?php echo $imgURL . $p->imagen ?>" class="img-small" alt="producto">

                  </div>
                  <div class="col">
                  <h3><a class="detalles-a" href="detalles.php?id=<?= $p->id ?>"><?php echo $p->nombre ?></a></h3>
                    <p><?php echo $p->descripcion ?></p>
                    <p>$ <?php echo $p->precio ?></p>
                    <div class="d-flex cantidadCarrito align-items-center">
                      <button onclick="eliminarProducto(<?php echo $p->id ?>, <?php echo $_SESSION['user']['id']?>)">-</button>
                      <p class="text-center"><?php echo $p->cantidad ?></p>
                      <button onclick="sumarProducto(<?php echo $p->id ?>, <?php echo $_SESSION['user']['id']?>)">+</button>
                    </div>
                    
                </div>
                
                
              </div>
              <?php } 

              
              ?>
            </div>
            <?php if (!empty($productosEnCarrito)): ?>
                <div class="mt-5 ms-2 container d-flex">
                    <a href="" class="finalizar-btn">Finalizar compra <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            <?php endif; ?>
            </div>
        </section>

        <script>
function eliminarProducto(producto_id, user_id) {
    $.ajax({
        type: "POST",
        url: "<?php echo $rutaEliminar; ?>",
        data: {
            productoId: producto_id,
            userId: user_id,
        },
        success: function(response) {
            console.log(response);
            location.reload();
        },
        error: function() {
            console.log(error);
        }
    });
}

function sumarProducto(producto_id, user_id) {
    $.ajax({
        type: 'POST',
        url: "<?php echo $rutaAgregar; ?>",
        data: {
            productoId: producto_id,
            userId: user_id
        },
        success: function(response) {
            console.log(response);
            location.reload();  
        },
        error: function() {
            alert("Error en la solicitud AJAX");
        }
    });
}
</script>

