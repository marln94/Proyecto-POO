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
	
	$("#btn-eliminar-bibliotecario").click(function(){
		var parametros = "txt-codigo-bibliotecario="+$("#txt-codigo-bibliotecario").val();
		$.ajax({
			method: "post",
			data: parametros,
			url: "../ajax/ctrl_retiro_bibliotecario.php?opcion=1",
			success: function(respuesta){
				if(respuesta == "error"){
					$("#div-eliminar").html("Error al eliminar la cuenta");
				} else if(respuesta == "pendiente"){
					$("#div-eliminar").html("Tiene préstamos pendientes, devuelva los libros y luego elimine su cuenta");
					$("#modal-confirmar").modal("hide");
				} else{
					$("#mensaje-aviso").html("La cuenta ha sido eliminada");
					$("#modal-aviso").modal("show");
					$("#modal-aviso").on('hidden.bs.modal', function(){
						$(location).attr('href',"eliminar_cuenta_bibliotecario.php");
					});
				}
			}
		});
	});

	$("#txt-codigo-bibliotecario").keypress(function (e) {
	    //if the letter is not digit then display error and don't type anything
	    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	    	return false;
		}
   	});	
});