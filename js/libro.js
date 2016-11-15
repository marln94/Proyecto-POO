function solicitarLibro(codigoLibro){
	var parametros = "codigo-libro="+$("#codigo-libro").val()+
				"&codigo-usuario="+$("#codigo-usuario").val()+
				"&fecha-prestamo="+obtenerFecha();
	$.ajax({
		method: "post",
		url: "../ajax/ctrl_libro.php?opcion=2",
		data: parametros,
		success: function(resultado){
			cargarLibro();
		}
	});
}

function cargarLibro(){
	$.ajax({
		method: "post",
		url: "../ajax/ctrl_libro.php?opcion=1",
		data: "codigo-libro="+$("#codigo-libro").val()+
				"&codigo-tipo-usuario="+$("#codigo-tipo-usuario").val(),
		success: function(resultado){
			$('#contenedor-libros').html(resultado);
		}
	});
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
	$('#contenedor-libros').html('<p style="text-align: center;" id="loading"><img src="../images/loading.gif"> </p>');
	cargarLibro();
});