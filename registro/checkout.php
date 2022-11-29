
<?php
session_start();
if(!isset($_SESSION['carrito'])){
  header("location: ../index.php");
}
  $arreglo=$_SESSION['carrito'];

?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FACTOR TECNOLOGIA</title>
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
  <?php include("cabecera.php"); 
  ?> 
<?php
                require "../conexion.php";
                $Id=$_SESSION['log'];
                $Nombre="";
                $Email="";
                $Ciudad='Cuidad';
                $direccion='';
                $Municipio='Municipio';
                $Posta='Postal';
                $contador=0;
                $res=$conex -> query("select * from clientes where id_cliente=".$Id) or die($conex->error);
                $Fila=mysqli_fetch_row($res);
                $Nombre=$Fila["1"];
                $Email=$Fila['2'];
              
                $resultado=$conex -> query("select * from direccion WHERE id_cliente='".$Id."'") or die($conex ->error);
                while($fila = mysqli_fetch_array($resultado)){
                  $contador++;
                  if($contador>0){
                  $direccion= $fila['direccion'];
                  $Ciudad=$fila['ciudad'];
                  $Municipio= $fila['municipio'];
                  $Posta= $fila['postal'];
                  }
                }


                ?>
  <div class="site-wrap">
   
    <div class="site-section">
      <div class="container">
        <!-- <form action="../perfil/direccionPedido.php" method="POST">-->
          <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
              <h2 class="h3 mb-3 text-black">Detalles de Facturacion</h2>
              <div class="p-3 p-lg-5 border">
                <div class="form-group">
                
                <?php
                  if($contador==0){
                    ?>
                    <label for="c_country" class="text-black">Ciudad <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="<?php echo $Ciudad?>">
                  
                    <?php
                  }else{
                    ?>
                    <label for="c_country" class="text-black">Ciudad <span class="text-danger">*</span></label>
                    <div class="alert alert-light text-dark border border border-info" role="alert">
                    <?php echo $Ciudad?>
                  </div>
                  <?php
                  }
                  ?>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                
                    <label for="c_fname" class="text-black">Nombre<span class="text-danger">*</span></label>
                    <div class="alert alert-light text-dark border border border-info" role="alert" name="nombre">
                    <?php echo $Nombre?>
                  </div>
                  </div>
                  
                </div>

                

                <div class="form-group row">
                  <div class="col-md-12">
                  <?php
                  if($contador==0){
                    ?>
                      <label for="c_address" class="text-black">Direccion <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_address" name="direccion1" placeholder="Calle">
                  </div>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)" name="direccion2">
                </div>
                    <?php
                  }else{
                    ?>

                    <label for="c_address" class="text-black">Direccion <span class="text-danger">*</span></label>
                    <div class="alert alert-light text-dark border border border-info" role="alert">
                    <?php echo $direccion?>
                  </div>
                  </div>
                </div>
                <?php } ?>

                  

                <div class="form-group row">   
                <div class="form-group row mb-5">
                    <?php
                    if($contador==0){
                      ?>
                      <div class="col-md-6">
                    <label for="c_email_address" class="text-black">Email  <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_email_address" name="email" placeholder="<?php echo $Email?>">
                  </div>
                  <div class="col-md-6">
                    <label for="c_phone" class="text-black">Celular<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Numero de telefono/cel">
                  </div>
                      <?php
                    }else{
                      ?>
                    <div class="col-md-6">
                    <label for="c_email_address" class="text-black">Email  <span class="text-danger">*</span></label>
                    <div class="alert alert-light text-dark border border border-info" role="alert" name="email">
                    <?php echo $Email?>
                  </div>
                  </div>
                  <div class="col-md-6">
                    <label for="c_phone" class="text-black">Celular<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Numero de telefono/cel">
                  </div>
                      <?php
                    }
                    ?>
                  

                    </div>
                </div>

                


                

                <div class="form-group">
                  <label for="c_order_notes" class="text-black">Order Notes</label>
                  <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
                </div>

              </div>
            </div>
            <div class="col-md-6">

              
              
              <div class="row mb-5">
                <div class="col-md-12">
                  <h2 class="h3 mb-3 text-black">Tu Pedido</h2>
                  <div class="p-3 p-lg-5 border">
                    <table class="table site-block-order-table mb-5">
                      <thead >
                        <th>Producto</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Precio</th>
                      </thead>
                      <tbody>
                      <?php 
                      $total=0;
                      for($i=0; $i<count($arreglo);$i++){
                        $total=$total+($arreglo[$i]['PRECIO'] * $arreglo[$i]['CANTIDAD']);
                      
                      ?>

                        <tr class="text-center">

                          <td><?php echo $arreglo[$i]['NOMBRE'];?> </td>
                          <td><?php echo $arreglo[$i]['CANTIDAD'];?></td>
                          <td>Q <?php echo number_format($arreglo[$i]['PRECIO'],2)?></td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                        <td>Order Total</td>
                        <td></td>
                          
                          <td>Q <?php echo number_format($total,2 );?></td>
                        </tr>
                      </tbody>
                    </table>

                    <div class="border p-3 mb-3">
                      <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>

                      <div class="collapse" id="collapsebank">
                        <div class="py-2">
                          <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                        </div>
                      </div>
                    </div>

                    <div class="border p-3 mb-3">
                      <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>

                      <div class="collapse" id="collapsecheque">
                        <div class="py-2">
                          <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                        </div>
                      </div>
                    </div>

                    <div class="border p-3 mb-5">
                      <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                      <div class="collapse" id="collapsepaypal">
                        <div class="py-2">
                          <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <button class="btn btn-primary btn-lg py-3 btn-block"onclick="window.location.href='dirPedido.php'" >Place Order</button>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
         <!--</form>-->
      </div>
     
    </div>

   
  </div>
  <?php include("footer.php")?>

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