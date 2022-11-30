<style>
  #boton-color {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
  }
</style>

<form action="insertarP.php" method="POST" enctype="multipart/form-data">
  <div class="p-3 p-lg-5 border">

    <div class="form-group row">
      <div class="col-md-12">
        <label for="c_state_country" class="text-black">Nombre<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="nombre" name="nombre">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-12">
        <label for="c_state_country" class="text-black">Descripcion<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="descripcion" name="descripcion">
      </div>
    </div>

    <div class="form-group">
      <label for="categoria" class="text-black">Categoría <span class="text-danger">*</span></label>
      <select id="categoria" name="categoria" class="form-control">
        <option value="1">Productos destacados</option>
        <option value="2">Electroportátiles</option>
        <option value="3">Herramientas</option>
      </select>
    </div>

    <div class="form-group row">
      <div class="col-md-6">
        <label for="c_state_country" class="text-black">Stock<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="stock" name="stock" placeholder="Ej: 3">
      </div>
      <div class="col-md-6">
        <label for="c_postal_zip" class="text-black">Precio<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="precio" name="precio" placeholder="Ej: 500">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-12">
        <label for="c_postal_zip" class="text-black">Codigo de imagen<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ej: Equipo.png">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-12">
        <label for="c_state_country" class="text-black">Seleccionar imagen<span class="text-danger">*</span></label>
        <input type="file" name="fileToUpload" id="fileToUpload">
      </div>
    </div>

    <div class="form-group">
      <input type="submit" class="form-control" id="boton-color" value="Agregrar">
    </div>
  </div>
</form>