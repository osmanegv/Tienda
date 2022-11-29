<?php
include("../sesion/conexion.php");
if (!isset($_GET['texto'])) {
  header("Location: /Tienda/index.php");
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
      <h4>Buscando: resultados para
        <?php echo $_GET['texto']; ?>
      </h4>
    </div>
  </div>
  </section>
  </header>


  <div class="container-fluid">
    <div class="row mt-5 mx-5   ">
      <?php

      $resultado = $conex->query("select * from producto where 
    nombre_producto like '%" . $_GET['texto'] . "%' or
    desc_producto like '%" . $_GET['texto'] . "%' or
    precio_producto like '%" . $_GET['texto'] . "%'
    
    
    ") or die($conex->error);
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