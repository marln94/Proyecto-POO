$(document).ready(function(){
	$("#btn-registrar-libro").click(function(){
		if(verificar()){
			var parametros = "txt-nombre-autor="+$("#txt-nombre-autor").val()+"&"+"txt-apellido-autor="+$("#txt-apellido-autor").val()+"&"+"txt-nacimiento="+$("#txt-nacimiento").val()+"&"+"txt-fallecimiento="+$("#txt-fallecimiento").val()+"&"+"txt-nacionalidad="+$("#txt-nacionalidad").val()+"&"+"txt-lengua-materna="+$("#txt-lengua-materna").val();
			$.ajax({
				type: "POST",
				url: "../php/registro.php?opcion=autor",
				data: parametros,
				success: function(respuesta){
					if(respuesta == 'error'){
						$("#mensaje").addClass('well');
						$("#mensaje").html("Formulario con información errónea");
					} else{
						/*Codigo*/
					}
				}
			});
		}
	});

	


	verificar = function() {
		var validacion = true;

		$(".bad").removeClass('bad').find('.alert').remove();
		if( $("#txt-nombre-autor").val() == "" ){
			marcar($("#txt-nombre-autor").closest(".item"),"Introduzca un nombre");
			validacion = validacion && false;
		} else{desmarcar($("#txt-nombre-autor"))}
		if( $("#txt-apellido-autor").val() == "" ){
			marcar($("#txt-apellido-autor").closest(".item"),"Introduzca un apellido");
			validacion = validacion && false;
		} else{desmarcar($("#txt-apellido-autor"))}
		if( $("#txt-nacimiento").val() == "" ){
			marcar($("#txt-nacimiento").closest(".item"),"Introduzca una fecha");
			validacion = validacion && false;
		} else{desmarcar($("#txt-nacimiento"))}
		if( $("#txt-nacionalidad").val() == ""){
			marcar($("#txt-nacionalidad").closest(".item"),"Introduzca una nacionalidad");
			validacion = validacion && false;
		} else{desmarcar($("#txt-nacionalidad"))}
		if( $("#txt-lengua-materna").val() == "" ){
			marcar($("#txt-lengua-materna").closest(".item"),"Introduzca una lengua");
			validacion = validacion && false;
		} else{desmarcar($("#txt-lengua-materna"))}
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