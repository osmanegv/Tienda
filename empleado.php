<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FACTOR TECNOLOGIA</title>
  <link rel="stylesheet" href="css/normalize.css" />
  <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/2803c554a7.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/estilos_index.css " />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <script src="js/cambioPestana.js"></script>
</head>


<body>

<header>
          <section class="fixed-top">
            <nav class="navbar navbar-expand-lg navbar-light bg-light ">
              <div class="logo">
                <a href="index.php"><img src="images/LOGOM2.png" class="img-fluid" alt="Responsive image" /></a>
              </div>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <div class="icono"><i class="fas fa-shopping-cart"></i>
                    <span class="site-cart count">
                  <?php
                  session_start();
                  if(isset($_SESSION['carrito'])){
                    echo count($_SESSION['carrito']);
                  }else{
                    echo 0;
                  }
                  ?>
                  </span>
                  </div>
                    <a class="nav-link" href="carrito.php">Productos</a>
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
                      <a class="dropdown-item active" href="index.php"> <h4>Inicio</h4></a>
                      <a class="dropdown-item" href="computo.php"> Computo </a>
                      <a class="dropdown-item" href="Impresoras.php">Impresoras </a>
                      <a class="dropdown-item " href="Accesorios.php">Accesorios</a>
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
                       if(isset($_SESSION['loge'])){
                         ?>
                         
                         <button type="text" class="btn btn-dark" onclick="window.location = 'empleado.php'">
                         <i class="fas fa-user"></i>&nbsp Pefil
                        </button>
                         <form action="empleado/sesionOut.php" method="POST">
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
          </section>
        </header>
        
<?php
include("empleado/conexione.php");
$ide=$_SESSION['loge'];
$resultado=$conex -> query("select * from empleados where id_empleado='".$ide."'") or die($conex ->error);
$fila = mysqli_fetch_array($resultado);
$nombre=$fila['nombre_empleado'];
$email=$fila['email_empleado'];

?>


 <script>

   function pedido(){
    document.getElementById('pedidos').style.display = 'flex';
    document.getElementById('direccion').style.display = 'none';
    document.getElementById('pago').style.display = 'none';
}
function direccion(){
    document.getElementById('pedidos').style.display = 'none';
    document.getElementById('direccion').style.display = 'flex';
    document.getElementById('pago').style.display = 'none';
}
function pago(){
    document.getElementById('pedidos').style.display = 'none';
    document.getElementById('direccion').style.display = 'none';
    document.getElementById('pago').style.display = 'flex';
}
 </script>


<style>
  #direccion{
    display: none;}
  #pago{
    display: none;}  
    .margen{
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
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                              <button class="btn btn-outline-primary margen" onclick="pedido()">Insertar Producto</button>
                              <button class="btn btn-outline-primary margen" onclick="direccion()">Editar Producto</button>
                              <button class="btn btn-outline-primary margen" onclick="pago()">Editar usuario</button>
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
                            <?php echo $ide;?>
                            </div>
                          </div>  
                        <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Nombre</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <?php echo $nombre;?>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <?php echo $email;?>
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
                                  <?php include 'empleado/insertProd.php' ?>
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
                                  <?php include 'empleado/editProd.php' ?>
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
                                  Editar Cliente
                                </div>
                              </div>
                              <hr>
                                  <?php include 'empleado/editCliente.php' ?>
                          </div>
                        </div>
                        </div>
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