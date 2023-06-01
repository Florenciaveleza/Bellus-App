<?php
    $currentUrl = $_SERVER['REQUEST_URI'];

    $footerURL;

    if (strpos($currentUrl, 'index.php') !== false) {
        $footerURL = 'public/views/assets/img/logo-secundario.svg';
    } else {
        $footerURL = 'http://localhost/APP/public/views/assets/img/logo-secundario.svg';
    }

    
define('FOOTER_URL', $footerURL);
?>

<footer class="footer-bg">
    <div class="m-5">
    <a class="navbar-brand" href="index.php">
        <img
            src="<?php echo FOOTER_URL; ?>"
            alt="skincare ecommerce"
            width="125"
            height="120"
        />
    </a>
    <p>© Bellus. Todos los derechos reservados.</p>
</div>
</footer>

