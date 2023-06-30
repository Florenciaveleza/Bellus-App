<?php 
define('APP_ROOT', 'C:xampp/htdocs/App/');
require_once  APP_ROOT . "resources/controllers/carrito.php";
require_once APP_ROOT . "resources/controllers/productos.php";
$carrito = new carrito;
$productosEnCarrito = $carrito->obtenerCarrito();
 
$currentUrl = $_SERVER['REQUEST_URI'];

    $imgURL;

    if (strpos($currentUrl, 'index.php') !== false) {
        $imgURL = 'public/views/assets/img/';
    } else {
        $imgURL = 'http://localhost/APP/public/views/assets/img/';
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
                <div class="row">
                  <div class="col">
                  <img src="<?php echo $imgURL . $p->producto->imagen ?>" class="img-small" alt="">

                  </div>
                  <div class="col">
                  <h3><a class="detalles-a" href="detalles.php?id=<?= $p->producto->id ?>"><?php echo $p->producto->nombre ?></a></h3>
                    <p><?php echo $p->producto->descripcion ?></p>
                    <p>$ <?php echo $p->producto->precio ?></p>
                </div>
                <div class="row">
                  <input id="cantidad-input" class="form-control ms-auto mb-3 sumar-producto" type="number" placeholder="Cantidad" aria-label="default input example">
                  <i class="fa-solid fa-trash"></i>
                </div>
                
              </div>
              <?php } ?>
              <div class="mt-5 ms-2 container d-flex">
                <a href="" class="finalizar-btn">Finalizar compra <i class="fa-solid fa-arrow-right"></i></a>
              </div>
            </div>
            </div>
        </section>


