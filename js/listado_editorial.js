$(document).ready(function(){
	$.ajax({
		method:"post",
		url: "../ajax/ctrl_listado_editorial.php?opcion=1",
		success: function(respuesta){
			$("#tbl-listado-editoriales").html(respuesta);
		}
	});
});