<?php
session_start();
include '../sesion/conexion.php';
if ($_SESSION['carrito'] == null) {
  header('Location: /Tienda/index.php');
}
$arreglo = $_SESSION['carrito'];
$Ide = $_SESSION['log'];
$total = 0;
for ($i = 0; $i < count($arreglo); $i++) {
  $total += ($arreglo[$i]['PRECIO'] * $arreglo[$i]['CANTIDAD']);
}
$res = $conex->query("select * from metodo_pago where id_cliente=" . $Ide);
$fila = mysqli_fetch_array($res);
$mtd = $fila['id_mtdpago'];
$conex->query("insert into orden(id_cliente,id_mtdpago, total_orden) values($Ide,$mtd,$total)");
$id_venta = $conex->insert_id;
for ($j = 0; $j < count($arreglo); $j++) {
  $conex->query("insert into detalle_orden (id_orden, id_producto, cantidad_producto, precio_producto)
values(
    $id_venta,
    " . $arreglo[$j]['ID'] . ",
    " . $arreglo[$j]['CANTIDAD'] . ",
    " . $arreglo[$j]['PRECIO'] . "
)
") or die($conex->error);

}
unset($_SESSION['carrito']);



?>


<!DOCTYPE html>
<html lang="en">

<?php
include("../hf/head.php");
?>

<body>

  <?php
  include("../hf/header.php");
  ?>

  </section>
  </header>

  <div class="site-wrap">

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Thank you!</h2>
            <p class="lead mb-5">You order was successfuly completed.</p>
            <p><a href="../index.php" class="btn btn-sm btn-primary">Back to shop</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>



  <?php
  include("../hf/footer.php");
  ?>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>

</body>

</html>