$(document).ready(function(){
	var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

	$("#btn-registrar-editorial").click(function(){
		if(verificar()){
			var parametros = "txt-nombre-editorial="+$("#txt-nombre-editorial").val()+"&"+"txt-nombre-abreviado-editorial="+$("#txt-nombre-abreviado-editorial").val()+"&"+"txt-direccion-editorial="+$("#txt-direccion-editorial").val()+"&"+"txt-telefono-editorial="+$("#txt-telefono-editorial").val()+"&"+"txt-correo-electronico-editorial="+$("#txt-correo-electronico-editorial").val();
			$.ajax({
				type: "POST",
				url: "../php/registro.php?opcion=editorial",
				data: parametros,
				success: function(respuesta){
					if(respuesta == 'error'){
						$("#mensaje").addClass('well');
						$("#mensaje").html("Formulario con información errónea");
					} else{
						/*Codigo*/
						alert(respuesta);
					}
				}
			});
		}
	});

	


	verificar = function() {
		var validacion = true;

		$(".bad").removeClass('bad').find('.alert').remove();
		if( $("#txt-nombre-editorial").val() == "" ){
			marcar($("#txt-nombre-editorial").closest(".item"),"Introduzca un nombre");
			validacion = validacion && false;
		} else{desmarcar($("#txt-nombre-editorial"))}
		if( $("#txt-direccion-editorial").val() == ""){
			marcar($("#txt-direccion-editorial").closest(".item"),"Introduzca una dirección");
			validacion = validacion && false;
		} else{desmarcar($("#txt-direccion-editorial"))}
		if( $("#txt-telefono-editorial").val() == "" ){
			marcar($("#txt-telefono-editorial").closest(".item"),"Introduzca un teléfono");
			validacion = validacion && false;
		} else{desmarcar($("#txt-telefono-editorial"))}
		if( $("#txt-correo-electronico-editorial").val() == "" || !emailreg.test($("#txt-correo-electronico-editorial").val())){
			marcar($("#txt-correo-electronico-editorial").closest(".item"),"Introduzca un correo válido");
			validacion = validacion && false;
		} else{desmarcar($("#txt-correo-electronico-editorial"))}
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