<!DOCTYPE html>
<html lang="en">
  <?php session_start();
    include "../parts/head.php";
?>

  <body>
    <?php
    include "../parts/header.php";
?>
  <section>
  <div class="container">
    <div class="row mt-5  d-flex align-items-center justify-content-center">
      <div class="col-md-10 col-lg-5">
        <h2 class="mb-3">Envíanos tu consulta</h2>
        <p class="mb-5">Déjanos tus datos para que podamos enviarte una rutina 100% personalizada.</p>
        <form action="consultas.php" method="GET">
          <div class="mb-3">
            <label for="">Nombre</label>
            <input type="text" class="form-control ms-auto" aria-label="First name" name= "inputNombre" id="inputNombre">
          </div>
          <div class="mb-3">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control ms-auto" name="inputEmail" id="inputEmail" />
          </div>
          <div class="mb-3">
            <label for="inputConsulta" class="form-label">Tu consulta</label>
            <textarea class="form-control ms-auto" id="inputConsulta" name="inputConsulta" rows="4"></textarea>
          </div>
          <button type="submit" class="btn btn-main mt-4" id="submit-btn">Enviar</button>
        </form>
      </div>
      <div class="col-md-10 col-lg-5 d-flex align-items-center justify-content-center">
        <img src="../assets/img/consejos.jpg" class="img-fluid rounded mt-3" alt="beauty">
      </div>
    </div>
  </div>
</section>


    <?php
  include "../parts/footer.php";
  ?>
</body>

<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
  crossorigin="anonymous"
></script>
<script src="https://kit.fontawesome.com/2d24fe97a4.js" crossorigin="anonymous"></script>
  
<script>
$(document).ready(function() {
  $("form").submit(function(event) {
    event.preventDefault();

    var nombre = $("#inputNombre").val();
    var email = $("#inputEmail").val();
    var consulta = $("#inputConsulta").val();

    if (nombre === '' || email === '' || consulta === '') {
      alert("Por favor, completa todos los campos");
    } else {
      var consultaURL = $.param({
        inputNombre: nombre,
        inputEmail: email,
        inputConsulta: consulta
      });

      window.location.href = "consultas.php?" + consultaURL;
    }
  });

  
  $("#btnEnviarForm").click(function() {
    $("form").off("submit");
    $("form").submit();
  });
});

</script>
</html>