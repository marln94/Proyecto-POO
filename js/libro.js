function solicitarLibro(codigoLibro){
	var parametros = "codigo-libro="+$("#codigo-libro").val()+
				"&codigo-usuario="+$("#codigo-usuario").val()+
				"&fecha-prestamo="+obtenerFecha();
	$.ajax({
		method: "post",
		url: "../ajax/ctrl_libro.php?opcion=2",
		data: parametros,
		success: function(resultado){
			if(resultado == 'existe'){
				$("#mensaje-aviso").html("Ya tiene este libro en su lista de préstamos");
				$("#modal-aviso").modal("show");
			} else{
				cargarLibro();
				$("#mensaje-aviso").html("Préstamo realizado. Puede devolverlo en la sección 'Préstamos actuales'");
				$("#modal-aviso").modal("show");
				$("#modal-aviso").on('hidden.bs.modal', function(){
					$(location).attr('href',"../index.php");
				});
			}
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