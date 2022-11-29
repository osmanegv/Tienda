<style>
  #boton-color {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
  }
</style>


<form action="editarP.php" method="POST">
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

    <div class="form-group row">
      <div class="col-md-12">
        <label for="nombre" class="text-black">Nombre<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="nombre" name="nombre">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-12">
        <label for="descripcion" class="text-black">Descripcion<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="descripcion" name="descripcion">
      </div>
    </div>

    <div class="form-group">
      <label for="categoria" class="text-black">Categoría <span class="text-danger">*</span></label>
      <select id="categoria" name="categoria" class="form-control">
        <option value="1">Productos destacados</option>
        <option value="2">Computo</option>
        <option value="3">Impresoras</option>
        <option value="4">Accesorios</option>
        <option value="5">Oficina</option>
      </select>
    </div>

    <div class="form-group row">
      <div class="col-md-6">
        <label for="stock" class="text-black">Stock<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="stock" name="stock" placeholder="Ej: 3">
      </div>
      <div class="col-md-6">
        <label for="precio" class="text-black">Precio<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="precio" name="precio" placeholder="Ej: 500">
      </div>

      <div class="col-md-6">
        <label for="codigo" class="text-black">Codigo de imagen<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ej: Equipo.png">
      </div>
    </div>
    <div class="form-group">
      <input type="submit" class="form-control" id="boton-color" value="Actualizar">
    </div>
  </div>
</form>