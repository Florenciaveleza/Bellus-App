<?php


$currentUrl = $_SERVER['REQUEST_URI'];


$baseURL ;

if (strpos($currentUrl, 'home.php') !== false) {
    $baseURL = 'public/views/assets/css/style.css';
} else {
    $baseURL = 'http://localhost/APP/public/views/assets/css/style.css';
}

define('BASE_URL', $baseURL);

?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>">
    <title>BELLUS</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"
    ></script>
    <script
    src="https://kit.fontawesome.com/2d24fe97a4.js"
    crossorigin="anonymous"
    ></script>

</head>
