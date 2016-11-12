$(document).ready(function() {
    $('#contenedor-libros').html('<p style="text-align: center;"><img src="../images/loading.gif"> </p>');
    $.ajax({
      	method: 'POST',
      	url: '../ajax/ctrl_categoria.php?opcion=1',
      	data: "codigo-categoria="+$("#codigo-categoria").val(),
      	success: function(respuesta){
        	$('#contenedor-libros').html(respuesta);
      	}
    });
});