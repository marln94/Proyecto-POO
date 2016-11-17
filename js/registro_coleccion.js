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

	$("#btn-registrar-coleccion").click(function(){
		if(verificar()){
			var parametros = "txt-nombre-coleccion="+$("#txt-nombre-coleccion").val();
			$.ajax({
				type: "POST",
				url: "../ajax/ctrl_registro_coleccion.php?opcion=1",
				data: parametros,
				success: function(respuesta){
					if(respuesta == 'error'){
						$("#mensaje").addClass('well');
						$("#mensaje").html("Formulario con información errónea");
					} else{
						$("#mensaje-registro").html(respuesta);
						$("#modal-sesion").modal('show');
						$("#modal-sesion").modal('show');
						$("#modal-sesion").on('hidden.bs.modal', function(){
							$(location).attr('href',"registro_coleccion.php");
						});
					}
				}
			});
		}
	});

	


	verificar = function() {
		var validacion = true;

		$(".bad").removeClass('bad').find('.alert').remove();
		if( $("#txt-nombre-coleccion").val() == "" ){
			marcar($("#txt-nombre-coleccion").closest(".item"),"Introduzca un nombre");
			validacion = validacion && false;
		} else{desmarcar($("#txt-nombre-coleccion"))}
		return validacion;
	}

	marcar = function(elemento, mensaje){
		elemento.append('<div class="alert">'+mensaje+'</div>');
		elemento.removeClass('bad');
		setTimeout(function(){
	        elemento.addClass('bad');
	    }, 0);
	}

	desmarcar = function(elemento){
		elemento.closest('.item').removeClass('bad').find('.alert').remove();
	}
});