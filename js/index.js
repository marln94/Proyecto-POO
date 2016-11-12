$(document).ready( function(){
	$('#contenedor-categorias').html('<p style="text-align: center;"><img src="images/loading.gif"> </p>');
    $.ajax({
          type: 'POST',
          url: 'ajax/ctrl_index.php?opcion=categorias',
          success: function(respuesta){
            $('#contenedor-categorias').html(respuesta);
        }
    });
});