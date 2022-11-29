<style>
  #boton-color {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
  }
</style>

<form action="/Tienda/perfil/añadirpago.php" method="POST">
  <div class="p-3 p-lg-5 border">

    <div class="form-group row">
      <div class="col-md-12">
        <label for="c_state_country" class="text-black">Nombre en la tarjeta <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="nom_tarjeta" name="nom_tarjeta">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-12">
        <label for="c_state_country" class="text-black">Numero de tarjeta <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="num_tarjeta" name="num_tarjeta">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-6">
        <label for="c_state_country" class="text-black">CVV <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="cvv" name="cvv">
      </div>
    </div>
    <div class="form-group">
      <input type="submit" class="form-control" id="boton-color" value="Agregrar">
    </div>
  </div>
</form>