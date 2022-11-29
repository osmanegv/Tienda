<!DOCTYPE html>
<html lang="es">

<?php
include("../hf/head.php");
?>


<body>

  <?php
  include("../hf/header.php");
  ?>
  <div class="titulo justify-content-between">
    <div class="titulo_p">
      <h4>Perfil</h4>
    </div>
  </div>
  </section>
  </header><br><br><br>

  <?php
  include("conexion.php");
  $ide = $_SESSION['log'];
  $resultado = $conex->query("select * from clientes where id_cliente='" . $ide . "'") or die($conex->error);
  $fila = mysqli_fetch_array($resultado);
  $nombre = $fila['nombre_cliente'];
  $email = $fila['email_cliente'];
  $direccion = "No hay ninguna dirección registrada";
  $tarjeta = "No hay ningun metodo de pago";
  $contador = 0;
  $resultado = $conex->query("select * from direccion WHERE id_cliente='" . $ide . "'") or die($conex->error);
  while ($fila = mysqli_fetch_array($resultado)) {
    $contador++;
    if ($contador > 0) {
      $direccion = $fila['direccion'] . ", " . $fila['municipio'] . ", " . $fila['ciudad'] . ", " . $fila['postal'];
    }
  }
  $contador = 0;
  $resultado = $conex->query("select * from metodo_pago WHERE id_cliente='" . $ide . "'") or die($conex->error);
  while ($fila = mysqli_fetch_array($resultado)) {
    $contador++;
    if ($contador > 0) {
      $tjt = $fila['num_tarjeta'];
      $taj = strval($tjt);
      $rest = substr($taj, -4);
      $tarjeta = "xxxxxxxxxxxx" . $rest;
    }
  }


  ?>


  <script>

    function pedido() {
      document.getElementById('pedidos').style.display = 'flex';
      document.getElementById('direccion').style.display = 'none';
      document.getElementById('pago').style.display = 'none';
    }
    function direccion() {
      document.getElementById('pedidos').style.display = 'none';
      document.getElementById('direccion').style.display = 'flex';
      document.getElementById('pago').style.display = 'none';
    }
    function pago() {
      document.getElementById('pedidos').style.display = 'none';
      document.getElementById('direccion').style.display = 'none';
      document.getElementById('pago').style.display = 'flex';
    }
  </script>


  <style>
    #direccion {
      display: none;
    }

    #pago {
      display: none;
    }
  </style>





  <div class="container">
    <div class="main-body">


      <!-- /Breadcrumb -->

      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle"
                  width="150">
                <div class="mt-3">
                  <button class="btn btn-outline-primary" onclick="pedido()">Pedidos</button>
                  <button class="btn btn-outline-primary" onclick="direccion()">Direccion</button>
                  <button class="btn btn-outline-primary" onclick="pago()">Pago</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Nombre</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $nombre; ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $email; ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Dirección</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $direccion; ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Metodo de pago</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $tarjeta; ?>
                </div>
              </div>
            </div>
          </div>

          <div id="pedidos">
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-9">
                      Mis Pedidos
                    </div>
                  </div>

                  <?php

                  $contador = 0;
                  $resultado = $conex->query("select * from orden where id_cliente='" . $ide . "'") or die($conex->error);
                  while ($fila = mysqli_fetch_array($resultado)) {
                    $contador++;
                  ?>
                  <hr>
                  <div class="row">
                    <div class="col-sm-9 text-secondary">
                      <?php echo "Id orden: ";
                    echo $fila['id_orden'];
                    echo " <br> Total de la Orden: Q";
                    echo $fila['total_orden'];
                      ?>
                    </div>
                  </div>
                  <?php }
                  if ($contador == 0) {
                  ?>
                  <hr>
                  <div class="row">
                    <div class="col-sm-9 text-secondary">
                      No hay pedidos
                    </div>
                  </div>
                  <?php
                  }
                  ?>

                </div>
              </div>
            </div>
          </div>





          <div id="direccion">
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-9">
                      Dirección
                    </div>
                  </div>
                  <hr>
                  <?php include '../perfil/añadirdir.php' ?>
                </div>
              </div>
            </div>
          </div>

          <div id="pago">
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-9">
                      Metodo de pago
                    </div>
                  </div>
                  <hr>
                  <?php include '../perfil/pago.php' ?>
                </div>
              </div>
            </div>
          </div>



        </div>
      </div>
    </div>
  </div>



  <?php
  include("../hf/footer.php");
  ?>

</body>

</html>