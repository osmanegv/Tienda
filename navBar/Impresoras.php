<!DOCTYPE html>
<html lang="es">

<?php
include("../hf/head.php");
?>

<body>

  <?php
  include("../hf/header.php");
  ?>
  <h4>Impresoras</h4>
  </div>
  </div>
  </section>
  </header>

  <div class="container-fluid">
    <div class="row mt-5 mx-5   ">
      <?php
      include("../sesion/conexion.php");
      $resultado = $conex->query("select * from producto where categoria_producto=3") or die($conex->error);
      while ($fila = mysqli_fetch_array($resultado)) {
      ?>
      <?php
        include("../hf/listpr.php");
      ?>
      <?php } ?>
    </div>
  </div>

  <?php
  include("../hf/footer.php");
  ?>

</body>

</html>