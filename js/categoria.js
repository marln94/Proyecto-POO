$(document).ready(function() {
	$("#btn-buscar").click(function(){
		buscar();
	});
	$("#txt-busqueda").on("keypress", function(e){
		if(e.keyCode == 13){
			buscar();
		}
	});

	function buscar(){
		if($("#txt-busqueda").val() != ""){
			$(location).attr('href',"busqueda.php?q="+$("#txt-busqueda").val());
			$("#txt-busqueda").val("");
		}
	}
	
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