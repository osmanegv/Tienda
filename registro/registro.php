<?php
session_start();
if (isset($_SESSION['carrito'])) {
  echo count($_SESSION['carrito']);
} else {
  echo 0;
}
?>
<!DOCTYPE html>
<html lang="es">

<?php
include("../hf/head.php");
?>


<body>



  <div class="container-fluid">

    <?php
    include("../hf/header.php");
    ?>
    <div class="titulo justify-content-between">
      <div class="titulo_p">
        <h4>Registro</h4>
      </div>
    </div>
    </section>
    </header><br><br>

    <main class="cuepo_pagina position-relative">
      <div class="row justify-content-center">

        <div class="col-xs-4 col-md-6 col-lg-6 mx-3 mt-5">
          <div class="cuerpo_contenido">
            <form class="form-signin " action="regcliente.php" method="POST">

              <label for="inputName" class="sr-only">Nombre</label><br>
              <input type="text" name="nombre_cliente" class="form-control" placeholder="Nombre" required autofocus>
              <label for="inputEmail" class="sr-only">Email</label><br>
              <input type="email" name="email_cliente" class="form-control" placeholder="Email" required autofocus>
              <label for="inputPassword" class="sr-only">Contraseña</label><br>
              <input type="password" name="pass_cliente" class="form-control" placeholder="Contraseña" required>
              <br> <input type="submit" value="Registrarse" class="btn btn-lg btn-primary btn-block">

            </form>
          </div>
        </div>
      </div>

    </main>
  </div>







  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>


</body>

</html>