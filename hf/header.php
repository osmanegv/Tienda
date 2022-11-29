<header>
  <section class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
      <div class="logo">
        <a href="/Tienda/index.php"><img src="/Tienda/archivos/images/LOGOM2.png" class="img-fluid"
            alt="Responsive image" /></a>
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

                if (session_status() !== 2) {
                  session_start();
                }
                if (isset($_SESSION['carrito'])) {
                  echo count($_SESSION['carrito']);
                } else {
                  echo 0;
                }
                ?>
              </span>
            </div>
            <a class="nav-link" href="/Tienda/carrito/carrito.php">Productos</a>
          </li>
          <li class="nav-item">
            <div class="icono">
              <i class="fas fa-question-circle"></i>
            </div>
            <a class="nav-link" href="/Tienda/navBar/Ayuda.php"> Ayuda</a>
          </li>
          <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bars"></i> Menú
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/Tienda/index.php">Inicio</a>
              <a class="dropdown-item" href="/Tienda/navBar/computo.php"> Computo </a>
              <a class="dropdown-item" href="/Tienda/navBar/Impresoras.php">Impresoras </a>
              <a class="dropdown-item " href="/Tienda/navBar/Accesorios.php">Accesorios</a>
              <a class="dropdown-item" href="/Tienda/navBar/Oficina.php">Oficina </a>


            </div>
        </ul>
        <form action="/Tienda/navBar/busqueda.php" class="form-inline my-2 my-lg-0" method="GET">
          <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search" name="texto" />
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            Buscar
          </button>&nbsp &nbsp


        </form>
        <?php
        $tp = null;
        if (isset($_SESSION['log'])) {
          if ($_SESSION['tp'] == 2) {
            $tp = '/Tienda/sesion/cliente.php';
          } else {
            $tp = '/Tienda/empleado/empleado.php';
          }
        ?>
        <button type="text" class="btn btn-dark" onclick="window.location='<?php echo
            $tp ?>'">
          <i class="fas fa-user"></i>&nbsp Pefil
        </button>
        <form action="/Tienda/registro/sesionOut.php" method="POST">
          <button type="submit" class="btn btn-dark">
            <i class="fas fa-user"></i>&nbsp Cerrar Sesion
          </button>
        </form>

        <?php

        } else {

        ?>
        <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-dark" onclick="window.location.href='/Tienda/registro/login.php'">
            <i class="fas fa-user"></i>&nbsp Ingresar
          </button>
          <button type="button" class="btn btn-dark" onclick="window.location.href='/Tienda/registro/registro.php'">
            <i class="fas fa-edit"></i>&nbspRegistrarse
          </button>
        </div>
        <?php } ?>

      </div>
    </nav>