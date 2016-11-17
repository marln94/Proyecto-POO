$(document).ready(function(){
	$("#btn-eliminar-autor").click(function(){
		var parametros = "txt-codigo-autor="+$("#txt-codigo-autor").val();
		$.ajax({
			method:"post",
			url: "../ajax/ctrl_retiro_autor.php?opcion=1",
			data: parametros,
			success: function(respuesta){
				if(respuesta == 'error'){
					$("#mensaje-aviso").html("No se puede retirar el autor.");
					$("#modal-aviso").modal("show");
				} else{
					$("#mensaje-aviso").html("Autor retirado.");
					$("#modal-aviso").modal("show");
				}
				$("#txt-codigo-autor").val("");
			}
		});
	});

	$("#txt-codigo-autor").keypress(function (e) {
	    //if the letter is not digit then display error and don't type anything
	    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	    	return false;
		}
   	});	
});