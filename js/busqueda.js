$(document).ready(function(){
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

	$.ajax({
		method: "post",
		url: "../ajax/ctrl_busqueda.php?opcion=1",
		data: "query="+$("#query").val(),
		success: function(respuesta){
			$("#contenedor-libros").html(respuesta);
		}
	});
});