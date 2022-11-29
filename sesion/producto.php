<?php
include("conexion.php");
if (isset($_GET['id'])) {
  $res = $conex->query("select * from producto where id_producto=" . $_GET['id']) or die($conex->error);
  if (mysqli_num_rows($res) > 0) {
    $fila = mysqli_fetch_row($res);
  } else {
    header("Location:/Tienda/index.php");
  }

} else {
  header("Location:/Tienda/index.php");
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
  <h4>Producto</h4>
  </div>
  </div>
  </section>
  </header>

  <div class="site-wrap mt-5 mb-5">

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="/Tienda/img_productos/<?php echo $fila[5] ?>" alt="<?php echo $fila[1] ?>" class="img-fluid"
              width="370px">
          </div>
          <div class="col-md-6">
            <h2 class="text-black">
              <?php echo $fila[1] ?>
            </h2>
            <p>
              <?php echo $fila[2] ?>
            </p>
            <p>Disponible:
              <?php echo $fila[3] ?>.
            </p>
            <p><strong class="text-primary h4">Q
                <?php echo $fila[4] ?>
              </strong></p>
            <br>
            <p><a href="/Tienda/carrito/carrito.php ? id=<?php echo $fila[0] ?>"
                class="buy-now btn  btn-primary btn-lg">Add To Cart</a>
            </p>

          </div>
        </div>
      </div>
    </div>


  </div>

  </div>

  <?php
  include("../hf/footer.php");
  ?>


  <script src="/Tienda/js/jquery-3.3.1.min.js"></script>
  <script src="/Tienda/js/jquery-ui.js"></script>
  <script src="/Tienda/js/popper.min.js"></script>
  <script src="/Tienda/js/bootstrap.min.js"></script>
  <script src="/Tienda/js/owl.carousel.min.js"></script>
  <script src="/Tienda/js/jquery.magnific-popup.min.js"></script>
  <script src="/Tienda/js/aos.js"></script>
  <script src="/Tienda/js/main.js"></script>

</body>

</html>