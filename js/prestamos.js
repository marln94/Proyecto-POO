function devolverLibro(codigoLibro){
	var parametros = "codigo-usuario=" + $("#codigo-usuario").val()
					+"&codigo-libro=" + codigoLibro
					+"&fecha-devolucion=" + obtenerFecha();
	$.ajax({
		method: "post",
		url: "../ajax/ctrl_prestamos.php?opcion=2",
		data: parametros,
		success: function(respuesta){
			cargarPrestamos();
		}
	});
}

function cargarPrestamos(){
	if($("#codigo-tipo-usuario").val() == 3){
		$.ajax({
			method: "post",
			url: "../ajax/ctrl_prestamos.php?opcion=1",
			data: "codigo-usuario=" + $("#codigo-usuario").val(),
			success: function(respuesta){
				$("#tabla-prestamos").html(respuesta);
			}
		});
	}
	if($("#codigo-tipo-usuario").val() == 2){
		$.ajax({
			method: "post",
			url: "../ajax/ctrl_prestamos.php?opcion=3",
			success: function(respuesta){
				$("#tabla-prestamos").html(respuesta);
			}
		});
	}
}

obtenerFecha = function() {
    var tdate = new Date();
   	var dd = tdate.getDate(); //yields day
   	var MM = tdate.getMonth(); //yields month
   	var yyyy = tdate.getFullYear(); //yields year
   	var xxx = yyyy + "-" +( MM+1) + "-" + dd;

   	return xxx;
}

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
	cargarPrestamos();
});