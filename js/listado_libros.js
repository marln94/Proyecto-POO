$(document).ready(function(){
	$.ajax({
		method: "post",
		url: "../ajax/ctrl_listado_libros.php?opcion=1",
		success: function(respuesta){
			$("#contenedor-libros").html(respuesta);
		}
	});
});