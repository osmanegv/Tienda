<?php
session_start();
include("../sesion/conexion.php");
if (isset($_SESSION['carrito'])) {
  // si ya existen productos en el carrito 
  if (isset($_GET['id'])) {
    $arreglo = $_SESSION['carrito'];
    $encontro = false;
    $num = 0;
    for ($i = 0; $i < count($arreglo); $i++) {
      if ($arreglo[$i]['ID'] == $_GET['id']) {
        $encontro = true;
        $num = $i;
      }
    }
    if ($encontro == true) {
      $arreglo[$num]['CANTIDAD'] = $arreglo[$num]['CANTIDAD'] + 1;
      $_SESSION['carrito'] = $arreglo;
    } else {
      $nombre = "";
      $precio = "";
      $imagen = "";
      $res = $conex->query("select * from producto where id_producto=" . $_GET['id']) or die($conex->error);
      $fila = mysqli_fetch_row($res);
      $nombre = $fila['1'];
      $precio = $fila['4'];
      $imagen = $fila['5'];
      $arregloNew = array('ID' => $_GET['id'], 'NOMBRE' => $nombre, 'PRECIO' => $precio, 'IMG' => $imagen, 'CANTIDAD' => 1);

      array_push($arreglo, $arregloNew);
      $_SESSION['carrito'] = $arreglo;
    }
  }
  //si no exixten productos en el carrito
} else {
  if (isset($_GET['id'])) {
    $nombre = "";
    $precio = "";
    $imagen = "";
    $res = $conex->query("select * from producto where id_producto=" . $_GET['id']) or die($conex->error);
    $fila = mysqli_fetch_row($res);
    $nombre = $fila['1'];
    $precio = $fila['4'];
    $imagen = $fila['5'];
    $arreglo[] = array('ID' => $_GET['id'], 'NOMBRE' => $nombre, 'PRECIO' => $precio, 'IMG' => $imagen, 'CANTIDAD' => 1);
  }
  $_SESSION['carrito'] = $arreglo;
}
?>


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
      <h4>Productos Añadidos</h4>
    </div>
  </div>
  </section>
  </header>
  </div><br><br>
  <div class="container-fluid">

    <div class="site-wrap mt-5 mb-5">

      <div class="site-section">
        <div class="container">
          <div class="row mb-5">
            <form class="col-md-12" method="post">
              <div class="site-blocks-table">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="product-thumbnail">Imagen</th>
                      <th class="product-name">Producto</th>
                      <th class="product-price">Precio</th>
                      <th class="product-quantity">Cantidad</th>
                      <th class="product-total">Total</th>
                      <th class="product-remove">Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $total = 0;
                    if (isset($_SESSION['carrito'])) {
                      $argcar = $_SESSION['carrito'];
                      for ($j = 0; $j < count($argcar); $j++) {
                        $total = $total + ($argcar[$j]['PRECIO'] * $argcar[$j]['CANTIDAD']);


                    ?>

                    <tr>
                      <td class="product-thumbnail">
                        <img src="/Tienda/archivos/img_productos/<?php echo $argcar[$j]['IMG'] ?>" alt="Image"
                          class="img-fluid text-center" width="100px">
                      </td>
                      <td class="product-name">
                        <h2 class="h5 text-black">
                          <?php echo $argcar[$j]['NOMBRE'] ?>
                        </h2>
                      </td>
                      <td>Q
                        <?php echo number_format($argcar[$j]['PRECIO'], 2); ?>
                      </td>
                      <td>
                        <div class="input-group mb-3" style="max-width: 120px;">
                          <div class="input-group-prepend">
                            <button class="btn btn-outline-primary js-btn-minus btnAumentar"
                              type="button">&minus;</button>
                          </div>
                          <input type="text" class="form-control text-center txtCantidad"
                            data-precio="<?php echo $argcar[$j]['PRECIO'] ?>" data-id="<?php echo $argcar[$j]['ID'] ?>"
                            value="<?php echo $argcar[$j]['CANTIDAD'] ?>" placeholder=""
                            aria-label="Example text with button addon" aria-describedby="button-addon1">
                          <div class="input-group-append">
                            <button class="btn btn-outline-primary js-btn-plus btnAumentar"
                              type="button">&plus;</button>
                          </div>
                        </div>

                      </td>
                      <td class="cant<?php echo $argcar[$j]['ID'] ?>">
                        Q
                        <?php echo number_format($argcar[$j]['PRECIO'] * $argcar[$j]['CANTIDAD'], 2); ?>
                      </td>
                      <td><a href="#" class="btn btn-primary btn-sm btnEliminar"
                          data-id="<?php echo $argcar[$j]['ID'] ?>">X</a></td>
                    </tr>
                    <?php }
                    } ?>
                  </tbody>
                </table>
              </div>
            </form>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="row mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                  <button class="btn btn-primary btn-sm btn-block" onclick="window.location='carrito.php'">Update
                    Cart</button>
                </div>
                <div class="col-md-6">
                  <button class="btn btn-outline-primary btn-sm btn-block"
                    onclick="window.location='/Tienda/index.php'">Continue Shopping</button>
                </div>
              </div>

            </div>
            <div class="col-md-6 pl-5">
              <div class="row justify-content-end">
                <div class="col-md-7">
                  <div class="row">
                    <div class="col-md-12 text-right border-bottom mb-5">
                      <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                    </div>
                  </div>

                  <div class="row mb-5">
                    <div class="col-md-6">
                      <span class="text-black">Total</span>
                    </div>
                    <div class="col-md-6 text-right">
                      <strong class="text-black">Q
                        <?php echo number_format($total, 2); ?>
                      </strong>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <?php
                      if (isset($_SESSION['log'])) {
                      ?>
                      <button class="btn btn-primary btn-lg py-3 btn-block"
                        onclick="window.location = 'checkout.php'">Realizar pedido</button>
                      <?php

                      } else {
                      ?>
                      <div class="alert alert-primary" role="alert">
                        Inicie sesion o cree una cuenta para poder realizar el pedido
                      </div>

                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>




    <script src="/Tienda/archivos/js/jquery-3.3.1.min.js"></script>
    <script src="/Tienda/archivos/js/jquery-ui.js"></script>
    <script src="/Tienda/archivos/js/popper.min.js"></script>
    <script src="/Tienda/archivos/js/bootstrap.min.js"></script>
    <script src="/Tienda/archivos/js/owl.carousel.min.js"></script>
    <script src="/Tienda/archivos/js/jquery.magnific-popup.min.js"></script>
    <script src="/Tienda/archivos/js/aos.js"></script>
    <script src="/Tienda/archivos/js/main.js"></script>
    <script src="carrito.js"> </script>

</body>

</html>