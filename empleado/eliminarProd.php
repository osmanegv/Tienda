<style>
  #boton-color {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
  }
</style>


<form action="eliminarP.php" method="POST">
  <div class="p-3 p-lg-5 border">

    <div class="form-group">
      <label for="buscar" class="text-black">Seleccionar Producto <span class="text-danger">*</span></label>
      <select id="buscar" name="buscar" class="form-control">

        <?php
        include("../sesion/conexion.php");
        $resultado = $conex->query("select * from producto") or die($conex->error);
        while ($fila = mysqli_fetch_array($resultado)) {

        ?>
        <option value=<?php echo $fila['id_producto']; ?>>
          <?php echo $fila['id_producto'] . ' - ' . $fila['nombre_producto']; ?>
        </option>
        <?php } ?>
      </select>
    </div>



    <div class="form-group">
      <input type="submit" class="form-control" id="boton-color" value="Eliminar">
    </div>
  </div>
</form>