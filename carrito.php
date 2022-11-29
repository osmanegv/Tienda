<?php
session_start();
include("conexion.php");
if(isset($_SESSION['carrito'])){
// si ya existen productos en el carrito 
  if(isset($_GET['id'])){
    $arreglo=$_SESSION['carrito'];
    $encontro=false;
    $num=0;
    for($i=0; $i<count($arreglo); $i++){
      if($arreglo[$i]['ID'] == $_GET['id']){
        $encontro=true;
        $num=$i;
      }
    }
    if($encontro == true){
      $arreglo[$num]['CANTIDAD']= $arreglo[$num]['CANTIDAD']+1;
      $_SESSION['carrito']=$arreglo;
    }else{
      $nombre="";
      $precio="";
      $imagen="";
      $res=$conex -> query("select * from producto where id_producto=".$_GET['id']) or die($conex->error);
      $fila= mysqli_fetch_row($res);
      $nombre=$fila['1'];
      $precio=$fila['4'];
      $imagen=$fila['5'];
      $arregloNew= array('ID'=>$_GET['id'], 'NOMBRE'=>$nombre, 'PRECIO'=>$precio, 'IMG'=>$imagen, 'CANTIDAD'=>1);
      
      array_push($arreglo, $arregloNew);
      $_SESSION['carrito']=$arreglo;
    }
  }
//si no exixten productos en el carrito
}else{
  if(isset($_GET['id'])){
    $nombre="";
    $precio="";
    $imagen="";
    $res=$conex -> query("select * from producto where id_producto=".$_GET['id']) or die($conex->error);
    $fila= mysqli_fetch_row($res);
    $nombre=$fila['1'];
    $precio=$fila['4'];
    $imagen=$fila['5'];
    $arreglo[]= array('ID'=>$_GET['id'], 'NOMBRE'=>$nombre, 'PRECIO'=>$precio, 'IMG'=>$imagen, 'CANTIDAD'=>1);
  }
  $_SESSION['carrito']=$arreglo;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FACTOR TECNOLOGIA</title>
    <link rel="stylesheet" href="css/normalize.css" />
  <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/2803c554a7.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/estilos_index.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">


</head>
<body>

<header>
        <section class="fixed-top">
          <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <div class="logo">
              <a href="index.php"><img src="images/LogoM2.png" class="img-fluid" alt="Responsive image" /></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <div class="icono"><i class="fas fa-shopping-cart"></i> <span class="site-cart count">
                  <?php
                  if(isset($_SESSION['carrito'])){
                    echo count($_SESSION['carrito']);
                  }else{
                    echo 0;
                  }
                  ?>
                  </span></div>
                  <a class="nav-link active" href="carrito.php">Productos</a>
                  
                </li>
                <li class="nav-item">
                  <div class="icono">
                    <i class="fas fa-question-circle"></i>
                  </div>
                  <a class="nav-link" href="ayuda.php"> Ayuda</a>
                </li>
                <li class="nav-item dropdown">
  
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bars"></i> Menú
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item " href="index.php">
                      <h5>Inicio</h5>
                    </a>
                    <a class="dropdown-item" href="computo.php"> Computo </a>
                    <a class="dropdown-item" href="Impresoras.php">Impresoras </a>
                    <a class="dropdown-item" href="Accesorios.php">Accesorios </a>
                    <a class="dropdown-item" href="Oficina.php">Oficina </a>
                    
  
                  </div>
              </ul>
              <form action="busqueda.php" class="form-inline my-2 my-lg-0"  method="GET" >
                  <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search" name="texto" />
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                    Buscar
                  </button>&nbsp &nbsp
                </form>
                <?php
                       if(isset($_SESSION['log'])){
                         ?>
                         
                         <button type="text" class="btn btn-dark" onclick="window.location = 'cliente.php'">
                         <i class="fas fa-user"></i>&nbsp Pefil
                        </button>
                         <form action="registro/sesionOut.php" method="POST">
                         <button type="submit" class="btn btn-dark" >
                         <i class="fas fa-user"></i>&nbsp Cerrar Sesion
                        </button>
                         </form>
                        
                        <?php
                         
                       }
                       else{
                     
                  ?>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-dark" onclick="window.location.href='registro/login.php'">
                    <i class="fas fa-user"></i>&nbsp Ingresar
                  </button>
                  <button type="button" class="btn btn-dark" onclick="window.location.href='registro/registro.php'">
                    <i class="fas fa-edit"></i>&nbspRegistrarse
                  </button>
                </div>
                <?php }?>
            </div>
          </nav>
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
                  $total=0;
                  if(isset($_SESSION['carrito'])){
                    $argcar=$_SESSION['carrito'];
                    for($j=0;$j<count($argcar); $j++){
                      $total=$total+($argcar[$j]['PRECIO'] * $argcar[$j]['CANTIDAD']);

                  
                  ?>

                  <tr>
                    <td class="product-thumbnail">
                      <img src="img_productos/<?php echo $argcar[$j]['IMG'] ?>" alt="Image" class="img-fluid text-center" width="100px">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $argcar[$j]['NOMBRE'] ?></h2>
                    </td>
                    <td>Q <?php echo number_format($argcar[$j]['PRECIO'],2); ?></td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus btnAumentar" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center txtCantidad" 
                        data-precio="<?php echo $argcar[$j]['PRECIO']?>"
                        data-id="<?php  echo $argcar[$j]['ID']?>"
                        value="<?php echo $argcar[$j]['CANTIDAD'] ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus btnAumentar" type="button">&plus;</button>
                        </div>
                      </div>

                    </td>
                    <td class="cant<?php  echo $argcar[$j]['ID']?>">
                    Q <?php echo number_format($argcar[$j]['PRECIO']* $argcar[$j]['CANTIDAD'],2); ?></td>
                    <td><a href="#" class="btn btn-primary btn-sm btnEliminar"  data-id="<?php echo $argcar[$j]['ID']?>">X</a></td>
                  </tr>
                  <?php } } ?>
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-primary btn-sm btn-block" onclick="window.location='carrito.php'">Update Cart</button>
              </div>
              <div class="col-md-6">
                <button class="btn btn-outline-primary btn-sm btn-block" onclick="window.location='index.php'">Continue Shopping</button>
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
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">Q <?php echo number_format($total,2);?></strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">Q <?php echo number_format ($total,2);?></strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                  <?php
                       if(isset($_SESSION['log'])){
                         ?>
                         <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location = 'registro/checkout.php'" >Realizar pedido</button>
                        <?php
                         
                       }
                       else{  
                  ?>
                  <div class="alert alert-primary" role="alert">
                   Inicie sesion o cree una cuenta para poder realizar el pedido
                 </div>
                 
                <?php }?>       
                  </div>                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
    <footer class="footer " >
        <section class="secc1 container-fluid bg-dark">
          <div class="container-fluid text-white">
            <div class="row mx-5">
              <div class="col-xs-12 col-md-4 col-lg-4 mt-5">
                <h5>Más Informacion de la Tienda</h5>
                <p class="mt-4">Somos una tienda online, no tenemos una tienda física.
                  Enviamos a todo el país.</p>
              </div>
              <div class="col-xs-12 col-md-4 col-lg-4 mt-3">
                <h5 class="mb-4 mt-3">Redes Sociales</h5>
                <div>
                  <div class="iconoF" style="float:left"><i class="fab fa-facebook mx-2"></i> </div>
                  <p>Facebook</p>
                  <div class="iconoF"style="float:left"><i class="fab fa-instagram mx-2"></i></div>
                  <p>Instagram</p>
                  <div class="iconoF"style="float:left"><i class="fab fa-twitter mx-2"></i></div>
                  <p>Twitter</p>
                  <div class="iconoF"style="float:left"><i class="fab fa-youtube mx-2"></i></div>
                  <p>Youtube</p>  
                </div>
                
              </div>
              <div class="col-xs-12 col-md-4 col-lg-4 mt-4 mb-2">
                <h5>Contactanos</h5>
                <h6>Horarios:</h6>
                <div class="iconoF"style="float:left"><i class="fas fa-clock mx-1 "></i></div>
                  <span>Lunes a Viernes: 8:00 a.m. - 8:00pm.</span>
                    <spam class="mx-4">Sábado 8:00 a.m. - 12:00 p.m.</spam><br><br>
                    <div class="iconoF"style="float:left"><i class="fa fa-phone mx-1"></i></div>
                    <span>Tel: (502)77842806.</span><br><br>
                    <div class="iconoF"style="float:left"><i class="fa fa-whatsapp mx-1"></i></div>
                    <span>Whatsapp: (502)43539075</span><br><br>
                    <div class="iconoF"style="float:left"><i class="fa fa-envelope mx-1"></i></div>
                    <span>Correo: factoretecnologia@gmail.com</span>
              </div>
            </div>
          </div>
        </section>
        <section class="secc2" style="background-color:#222121">
          <div class="container-fluid text-white">
            <div class="cop">
              <div class="row">
                <div class="col-xs-12 col-md-10 col-lg-12 mt-1 ">
                  
                   © 2020 Derechos reservados -Webifica</p>
                  
                </div>
              </div>
            </div>
          </div>
        </section>
      
      </footer>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
  <script src="carrito.js"> </script>

</body>
</html>