<style>
  #boton-color {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
  }
</style>

<form action="/Tienda/perfil/direccion.php" method="POST">
  <div class="p-3 p-lg-5 border">

    <div class="form-group row">
      <div class="col-md-12">
        <label for="c_state_country" class="text-black">Ciudad <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="ciudad" name="ciudad">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-12">
        <label for="c_address" class="text-black">Direccion <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="c_address" name="direccion2" placeholder="Calle">
      </div>
    </div>

    <div class="form-group">
      <input type="text" class="form-control" name="direccion1" placeholder="Apartment, suite, unit etc. (optional)">
    </div>

    <div class="form-group row">
      <div class="col-md-6">
        <label for="c_state_country" class="text-black">Municipio <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="c_state_country" name="municipio">
      </div>
      <div class="col-md-6">
        <label for="c_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="c_postal_zip" name="postal">
      </div>
    </div>
    <div class="form-group">
      <input type="submit" class="form-control" id="boton-color" value="Agregrar">
    </div>
  </div>
</form>