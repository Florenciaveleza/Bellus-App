<!DOCTYPE html>
<html lang="en">
<?php session_start();
    include "../parts/head.php";
    include "../../../resources/controllers/usuarios.php";

?>
<body>
<?php
    include "../parts/header.php";
?>
<section>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-6">
                <h2 class="mt-5 mb-3">Formulario de Pago</h2>
                    <form id="paymentForm">
                        <div class="form-group pb-3">
                            <label for="cardNumber">Número de Tarjeta</label>
                            <input type="text" class="form-control" id="cardNumber" placeholder="Ingrese el número de tarjeta">
                        </div>
                        <div class="form-group pb-3">
                            <label for="cardName">Nombre en la Tarjeta</label>
                            <input type="text" class="form-control" id="cardName" placeholder="Ingrese el nombre en la tarjeta">
                        </div>
                        <div class="form-row">
                            <div class="form-group pb-3 col-md-6">
                                <label for="expiryDate">Fecha de Vencimiento</label>
                                <input type="text" class="form-control" id="expiryDate" placeholder="MM/AA">
                            </div>
                            <div class="form-group pb-3 col-md-6">
                                <label for="cvv">CVV</label>
                                <input type="text" class="form-control" id="cvv" placeholder="CVV">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-main mt-2">Pagar</button>
                    </form>
            </div>
        </div>
        
    </div>
</section>
<?php
    include "../parts/footer.php";
?>
<script src="https://kit.fontawesome.com/2d24fe97a4.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    $('#paymentForm').submit(function(e) {
        e.preventDefault();
        var cardNumber = $('#cardNumber').val();
        var cardName = $('#cardName').val();
        var expiryDate = $('#expiryDate').val();
        var cvv = $('#cvv').val();
        
        if (cardNumber.trim() === '' || cardName.trim() === '' || expiryDate.trim() === '' || cvv.trim() === '') {
            alert('Por favor, complete todos los campos del formulario.');
            return;
        }
        

        window.location.href = 'gracias.php';
    });
});
</script>
</body>
</html>
