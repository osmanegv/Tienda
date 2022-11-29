

$(document).ready(function(){
    $(".btnEliminar").click(function(event){
      event.preventDefault();
      let id=$(this).data('id');
      let Id=$(this).data('id')
      let boton=$(this);
      $.ajax({
        method:'POST',
        url:'eliminarCarrito.php',
        data:{
          id:id
          
        }
      }).done(function(respuesta){
        boton.parent('td').parent('tr').remove();
      });
    });

    $(".txtCantidad").keyup(function(){
      let Cantidad = $(this).val();
      let precio= $(this).data('precio');
      let id= $(this).data('id');
     total(Cantidad, precio, id);

    });
    $(".btnAumentar").click(function(){
     let precio= $(this).parent('div').parent('div').find('input').data('precio');
     let id =$(this).parent('div').parent('div').find('input').data('id');
     let Cantidad= $(this).parent('div').parent('div').find('input').val();
     total(Cantidad, precio, id);
    });

    function total( Cantidad, precio, id){
      let multiplicacion= parseFloat(Cantidad)*parseFloat(precio);
      $(".cant"+id).text("Q"+multiplicacion);
    
      $.ajax({
        method:'POST',
        url:'actualizar_cantidades.php',
        data:{
          id:id,
          Cantidad:Cantidad
          
        }
      }).done(function(respuesta){
        
      });


    }
     
  });