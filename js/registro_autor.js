$(document).ready(function(){
	$("#btn-registrar-libro").click(function(){
		if(verificar()){
			var formData = new FormData();
				formData.append("txt-nombre-autor",$("#txt-nombre-autor").val());
				formData.append("txt-apellido-autor",$("#txt-apellido-autor").val());
				formData.append("txt-nacimiento",$("#txt-nacimiento").val());
				formData.append("txt-fallecimiento",$("#txt-fallecimiento").val());
				formData.append("txt-nacionalidad",$("#txt-nacionalidad").val());
				formData.append("txt-lengua-materna",$("#txt-lengua-materna").val());
				
			$.ajax({
				type: "POST",
				url: "../ajax/ctrl_registro_autor.php?opcion=1",
				data: formData,
				contentType: false,
	            processData: false,
				success: function(respuesta){
					console.log(respuesta)
					if(respuesta == 'error'){
						$("#mensaje").addClass('well');
						$("#mensaje").html("Formulario con información errónea");
					} else{
						$("#mensaje-registro").html(respuesta);
						$("#modal-sesion").modal('show');
						$("#modal-sesion").modal('show');
						$("#modal-sesion").on('hidden.bs.modal', function(){
							$(location).attr('href',"registro_autor.php");
						});
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