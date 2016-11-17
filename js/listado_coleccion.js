$(document).ready(function(){
	$.ajax({
		method:"post",
		url: "../ajax/ctrl_listado_coleccion.php?opcion=1",
		success: function(respuesta){
			$("#tbl-listado-colecciones").html(respuesta);
		}
	});
});