
  <?php
                  session_start();
                  if(isset($_SESSION['carrito'])){
                    echo count($_SESSION['carrito']);
                  }else{
                    echo 0;
                  }
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
  
 
  


<div class="container-fluid">

<?php include 'cabecera.php' ?>

  <main class="cuepo_pagina position-relative">
  <div class="row justify-content-center">
 
  <div class="col-xs-4 col-md-6 col-lg-6 mx-3 mt-5">
    <div class="cuerpo_contenido">
      <form class="form-signin " action="regcliente.php" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Registro</h1>
        <label for="inputName" class="sr-only">Nombre</label>
        <input type="text"  name="nombre_cliente" class="form-control" placeholder="Nombre" required autofocus>
        <label for="inputEmail"  class="sr-only">Email</label>
        <input type="email"  name="email_cliente" class="form-control" placeholder="Email" required autofocus>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" name="pass_cliente" class="form-control" placeholder="Contraseña" required>
        <input type="submit" value="Registro" class="btn btn-lg btn-primary btn-block">
        
      </form>
      </div>
      </div>
    </div>
      
  </main>
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