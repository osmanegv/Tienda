
   
<style>
  #boton-color{
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;}
</style>

    
    <form action="empleado/editarC.php" method="POST">
      <div class="p-3 p-lg-5 border">

      <div class="form-group">
      <label for="buscar" class="text-black">Seleccionar Cliente <span class="text-danger">*</span></label>
      <select id="buscar" name="buscar" class="form-control">
                
              <?php
        include("conexione.php");
        $resultado = $conex->query("select * from clientes") or die($conex->error);
        while($fila = mysqli_fetch_array($resultado)){
        
        ?>
        <option value=<?php echo $fila['id_cliente']; ?>><?php echo $fila['id_cliente'].' - '.$fila['nombre_cliente']; ?> </option>
          <?php } ?>
      </select>
    </div>
        
        <div class="form-group row">
          <div class="col-md-12">
          <label for="nombre" class="text-black">Nombre<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nombre" name="nombre" >
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-12">
          <label for="email" class="text-black">Email<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="email" name="email" >
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-12">
          <label for="pass" class="text-black">Contraseña<span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="pass" name="pass" >
          </div>
        </div>


        <div class="form-group">
          <input type="submit" class="form-control" id="boton-color" value="Actualizar">
        </div>
      </div>
      </form>


