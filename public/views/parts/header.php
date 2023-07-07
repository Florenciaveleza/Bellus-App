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

$navURL = 'http://localhost/APP/';
include 'carritoLista.php';

require_once  APP_ROOT . "resources/controllers/usuarios.php";
$usuarios = new Usuarios;

?>

<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand ms-5" href="<?php echo $navURL . 'home.php'; ?>">
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
            <a class="nav-link" aria-current="page" href="<?php echo $navURL . 'home.php'; ?>">Inicio</a>
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
          <div class="dropdown">
            <button class="btn btn-outline-primary  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <?php
              $nombreUsuario = isset($_SESSION['user']['nombre']) ? $_SESSION['user']['nombre'] : '';
              $nombreUsuario = ucfirst($nombreUsuario);
              echo $nombreUsuario;
            ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="<?php echo LOGOUT; ?>">Cerrar sesión</a></li>
            </ul>
          </div>
          <button 
            class="cart-button me-5 ms-3"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasRight"
            aria-controls="offcanvasRight">
            <i 
            class="fa-sharp fa-solid fa-cart-shopping fa-lg"
            ></i>
          </button>

        </div>
      </div>
    </div>
  </nav>
</header>
