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
	
	$("#btn-eliminar-editorial").click(function(){
		var parametros = "txt-codigo-editorial="+$("#txt-codigo-editorial").val();
		$.ajax({
			method:"post",
			url: "../ajax/ctrl_retiro_editorial.php?opcion=1",
			data: parametros,
			success: function(respuesta){
				if(respuesta == 'error'){
					$("#mensaje-aviso").html("No se puede retirar la editorial.");
					$("#modal-aviso").modal("show");
				} else{
					$("#mensaje-aviso").html("Editorial retirada.");
					$("#modal-aviso").modal("show");
				}
				$("#txt-codigo-editorial").val("");
			}
		});
	});

	$("#txt-codigo-editorial").keypress(function (e) {
	    //if the letter is not digit then display error and don't type anything
	    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	    	return false;
		}
   	});	
});