$(document).ready(function(){
	var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

	$("#btn-registrar-sucursal").click(function(){
		if(verificar()){
			var parametros = "txt-direccion-sucursal="+$("#txt-direccion-sucursal").val()+"&"+"txt-telefono-sucursal="+$("#txt-telefono-sucursal").val()
			$.ajax({
				type: "POST",
				url: "../ajax/ctrl_registro_sucursal.php?opcion=1",
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
							$(location).attr('href',"registro_sucursal.php");
						});
					}
				}
			});
		}
	});

	


	verificar = function() {
		var validacion = true;

		$(".bad").removeClass('bad').find('.alert').remove();
		if( $("#txt-direccion-sucursal").val() == "" ){
			marcar($("#txt-direccion-sucursal").closest(".item"),"Introduzca una dirección");
			validacion = validacion && false;
		} else{desmarcar($("#txt-direccion-sucursal"))}
		if( $("#txt-telefono-sucursal").val() == ""){
			marcar($("#txt-telefono-sucursal").closest(".item"),"Introduzca un teléfono");
			validacion = validacion && false;
		} else{desmarcar($("#txt-telefono-sucursal"))}
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

	$("#txt-telefono-sucursal").keypress(function (e) {
	    //if the letter is not digit then display error and don't type anything
	    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	    	return false;
		}
   	});	
});