<?php
session_start();
include '../conexion.php';
$arreglo=$_SESSION['carrito'];
$Ide=$_SESSION['log'];
$total=0;
for($i=0; $i<count($arreglo);$i++){
$total+=($arreglo[$i]['PRECIO']* $arreglo[$i]['CANTIDAD']);
}
$res=$conex->query("select * from metodo_pago where id_cliente=".$Ide);
$fila=mysqli_fetch_array($res);
$mtd=$fila['id_mtdpago'];
$conex->query("insert into orden(id_cliente,id_mtdpago, total_orden) values($Ide,$mtd,$total)");
$id_venta=$conex ->insert_id;
for($j=0; $j<count($arreglo);$j++){
$conex ->query("insert into detalle_orden (id_orden, id_producto, cantidad_producto, precio_producto)
values(
    $id_venta,
    ".$arreglo[$j]['ID'].",
    ".$arreglo[$j]['CANTIDAD'].",
    ".$arreglo[$j]['PRECIO']."
)
")or die($conex -> error);

}
unset($_SESSION['carrito']);



?>


<!DOCTYPE html>
<html lang="en">
  <head>
   <title>FACTOR TECNOLOGIA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="css/login.css">
  <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/2803c554a7.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../css/estilos_index.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    
  </head>
  <body>
  
  <div class="site-wrap">
   <?php include("cabecera.php"); ?> 

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

    <?php include("footer.php"); ?> 

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
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>