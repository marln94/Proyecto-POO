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
	
	var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	

	$('#btn-crear-cuenta').click(function(){
		if (verificar()) {
			var formData = new FormData($("#form-imagen")[0]);
			formData.append("txt-nombre",$("#txt-nombre").val());
			formData.append("txt-apellido",$("#txt-apellido").val());
			formData.append("txt-email",$("#txt-email").val());
			formData.append("txt-contraseña",$("#txt-contraseña").val());
			formData.append("txt-domicilio",$("#txt-domicilio").val());
			formData.append("txt-telefono",$("#txt-telefono").val());
			$.ajax({
				type: "POST",
				url: "../ajax/ctrl_registro_cuenta_bibliotecario.php?opcion=1",
				data: formData,
				contentType: false,
	            processData: false,
				success: function(respuesta){
					if(respuesta == 'error'){
						$("#mensaje").addClass('well');
						$("#mensaje").html("Formulario con información errónea");
					} else{
						$("#mensaje-registro").html(respuesta);
						$("#modal-sesion").modal('show');
						$("#modal-sesion").on('hidden.bs.modal', function(){
							$(location).attr('href',"crear_cuenta_bibliotecario.php");
						});
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
		if( $("#txt-contraseña").val() == "" ){
			marcar($("#txt-contraseña").closest(".item"),"Ingrese una contraseña");
			validacion = validacion && false;
		} else{desmarcar($("#txt-contraseña"))}
		if( $("#txt-domicilio").val() == "" ){
			marcar($("#txt-domicilio").closest(".item"),"Ingrese una dirección de domicilio");
			validacion = validacion && false;
		} else{desmarcar($("#txt-domicilio"))}
		if( $("#txt-telefono").val() == "" ){
			marcar($("#txt-telefono").closest(".item"),"Ingrese un número de teléfono");
			validacion = validacion && false;
		} else{desmarcar($("#txt-telefono"))}
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