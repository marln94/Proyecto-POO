$(document).ready(function(){
	$.ajax({
		method:"post",
		url: "../ajax/ctrl_listado_categoria.php?opcion=1",
		success: function(respuesta){
			$("#tbl-listado-categorias").html(respuesta);
		}
	});
});