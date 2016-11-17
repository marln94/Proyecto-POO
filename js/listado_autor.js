$(document).ready(function(){
	$.ajax({
		method:"post",
		url: "../ajax/ctrl_listado_autor.php?opcion=1",
		success: function(respuesta){
			$("#tbl-listado-autores").html(respuesta);
		}
	});
});