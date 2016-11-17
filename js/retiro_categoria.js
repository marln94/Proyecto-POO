$(document).ready(function(){
	$("#btn-eliminar-categoria").click(function(){
		var parametros = "txt-codigo-categoria="+$("#txt-codigo-categoria").val();
		$.ajax({
			method:"post",
			url: "../ajax/ctrl_retiro_categoria.php?opcion=1",
			data: parametros,
			success: function(respuesta){
				if(respuesta == 'error'){
					$("#mensaje-aviso").html("No se puede retirar la categoria.");
					$("#modal-aviso").modal("show");
				} else{
					$("#mensaje-aviso").html("Categoria retirada.");
					$("#modal-aviso").modal("show");
				}
				$("#txt-codigo-categoria").val("");
			}
		});
	});

	$("#txt-codigo-categoria").keypress(function (e) {
	    //if the letter is not digit then display error and don't type anything
	    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	    	return false;
		}
   	});	
});