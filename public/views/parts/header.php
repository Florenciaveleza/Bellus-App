<?php
$currentUrl = $_SERVER['REQUEST_URI'];

    $imgURL;

    if (strpos($currentUrl, 'home.php') !== false) {
        $imgURL = 'public/views/assets/img/logo-bellus.svg';
    } else {
        $imgURL = 'http://localhost/APP/public/views/assets/img/logo-bellus.svg';
    }

    
define('IMG_URL', $imgURL);

$logout;

    if (strpos($currentUrl, 'home.php') !== false) {
        $logout = 'resources/controllers/logout.php';
    } else {
        $logout = 'http://localhost/APP/resources/controllers/logout.php';
    }

    
define('LOGOUT', $logout);

$loguear;

    if (strpos($currentUrl, 'home.php') !== false) {
        $loguear = 'resources/controllers/logout.php';
    } else {
        $loguear = 'http://localhost/APP/loguear.php';
    }

    
define('LOGUEAR', $loguear);

$tabla;

    if (strpos($currentUrl, 'home.php') !== false) {
        $tabla = 'resources/controllers/admin/tabla.php';
    } else {
        $tabla = 'http://localhost/APP/resources/controllers/admin/tabla.php';
    }

    
define('TABLA', $tabla);



$navURL = 'http://localhost/APP/';
include 'carritoLista.php';

require_once  APP_ROOT . "resources/controllers/usuarios.php";
$usuarios = new Usuarios;
require_once APP_ROOT . "resources/controllers/carrito.php";


?>

<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand ms-5" href="<?php echo $navURL . 'index.php'; ?>">
        <img
          src="<?php echo IMG_URL; ?>"
          alt="skincare ecommerce"
          width="150"
          height="100"
        />
      </a> 


      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?php echo $navURL . 'index.php'; ?>">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $navURL . 'public/views/template/catalogo.php'; ?>">Catalogo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $navURL . 'public/views/template/consejos.php'; ?>">Consejos</a>
          </li>
        </ul>
        <!-- <form class="d-flex ms-auto" action="productos.php">
          <input
            class="form-control me-2"
            type="search"
            placeholder="Lo mejor para tu piel"
            aria-label="Search"
          />
          <button class="btn btn-main" type="submit">Buscar</button>
        </form> -->
        <div class="ms-auto d-flex">
          <?php  
          if (!isset($_SESSION['user']['id'])) {?>
            <a class="me-5 login" href="<?php echo LOGUEAR; ?>">Iniciar sesión <i class="fa-solid fa-user ps-2"></i></a>
          <?php 
          } else { 
            $carrito = new Carrito;
            $contadorCarrito = $carrito->contadorCarrito($_SESSION['user']['id']);
            ?>
             <a class="login p-3" href="<?php echo LOGOUT; ?>">Cerrar sesión <i class="fa-solid fa-user ps-2"></i></a>
          </div>
            <button 
            class="cart-button me-5 ms-3"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasRight"
            aria-controls="offcanvasRight">
            <i 
            class="fa-sharp fa-solid fa-cart-shopping fa-lg"
            ></i><span class="p-2"><?php echo $contadorCarrito ?></span>
          </button>
          <?php } ?>
        </div>
      </div>
    </div>
  </nav>
</header>
