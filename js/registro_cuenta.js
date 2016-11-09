$(document).ready(function(){
	var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	

	$('#btn-crear-cuenta').click(function(){
		if (verificar()) {
			var parametros = "txt-nombre="+$("#txt-nombre").val()+"&"+"txt-apellido="+$("#txt-apellido").val()+"&"+"txt-email="+$("#txt-email").val()+"&"+"txt-nombre-usuario="+$("#txt-nombre-usuario").val()+"&"+"txt-contraseña="+$("#txt-contraseña").val();
			$.ajax({
				type: "POST",
				url: "../php/registro.php?opcion=cuenta",
				data: parametros,
				success: function(respuesta){
					if(respuesta == 'error'){
						$("#mensaje").addClass('well');
						$("#mensaje").html("Formulario con información errónea");
					} else{
						console.log(respuesta);
					}
				}
			});
		}
	});

	verificar = function() {
		var validacion = true;
		$(".bad").removeClass('bad').find('.alert').remove();
		if( $("#txt-nombre").val() == "" ){
			marcar($("#txt-nombre").closest(".item"),"Ingrese un nombre");
			validacion = validacion && false;
		} else{desmarcar($("#txt-nombre"))}
		if( $("#txt-apellido").val() == "" ){
			marcar($("#txt-apellido").closest(".item"),"Ingrese un apellido");
			validacion = validacion && false;
		} else{desmarcar($("#txt-apellido"))}
		if( $("#txt-email").val() == "" || !emailreg.test($("#txt-email").val())){
			marcar($("#txt-email").closest(".item"),"Ingrese un correo válido");
			validacion = validacion && false;
		} else{desmarcar($("#txt-email"))}
		if( $("#txt-nombre-usuario").val() == ""){
			marcar($("#txt-nombre-usuario").closest(".item"),"Ingrese un nombre de usuario");
			validacion = validacion && false;
		} else{desmarcar($("#txt-nombre-usuario"))}
		if( $("#txt-contraseña").val() == "" ){
			marcar($("#txt-contraseña").closest(".item"),"Ingrese una contraseña");
			validacion = validacion && false;
		} else{desmarcar($("#txt-contraseña"))}
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