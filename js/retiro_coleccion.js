$(document).ready(function(){
	$("#btn-eliminar-coleccion").click(function(){
		var parametros = "txt-codigo-coleccion="+$("#txt-codigo-coleccion").val();
		$.ajax({
			method:"post",
			url: "../ajax/ctrl_retiro_coleccion.php?opcion=1",
			data: parametros,
			success: function(respuesta){
				if(respuesta == 'error'){
					$("#mensaje-aviso").html("No se puede retirar la coleccion.");
					$("#modal-aviso").modal("show");
				} else{
					$("#mensaje-aviso").html("Coleccion retirada.");
					$("#modal-aviso").modal("show");
				}
				$("#txt-codigo-coleccion").val("");
			}
		});
	});

	$("#txt-codigo-coleccion").keypress(function (e) {
	    //if the letter is not digit then display error and don't type anything
	    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	    	return false;
		}
   	});	
});