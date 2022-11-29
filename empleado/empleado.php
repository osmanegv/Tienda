<!DOCTYPE html>
<html lang="es">

<?php
include("../hf/head.php");
?>


<body>

  <?php
  include("../hf/header.php");
  ?>
  </section>
  </header><br><br>

  <?php
  include("../sesion/conexion.php");
  $ide = $_SESSION['log'];
  $resultado = $conex->query("select * from clientes where id_cliente='" . $ide . "'") or die($conex->error);
  $fila = mysqli_fetch_array($resultado);
  $nombre = $fila['nombre_cliente'];
  $email = $fila['email_cliente'];

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

    .margen {
      margin: 3px;
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
                  <button class="btn btn-outline-primary margen" onclick="pedido()">Insertar Producto</button>
                  <button class="btn btn-outline-primary margen" onclick="direccion()">Editar Producto</button>
                  <button class="btn btn-outline-primary margen" onclick="pago()">Eliminar Producto</button>
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
                  <h6 class="mb-0">ID Empleado</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $ide; ?>
                </div>
              </div>
              <hr>
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
            </div>
          </div>

          <div id="pedidos">
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-9">
                      Agregar producto
                    </div>
                  </div>
                  <hr>
                  <?php include 'insertProd.php' ?>
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
                      Editar producto
                    </div>
                  </div>
                  <hr>
                  <?php include 'editProd.php' ?>
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
                      Eliminar Producto
                    </div>
                  </div>
                  <hr>
                  <?php include 'eliminarProd.php' ?>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
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