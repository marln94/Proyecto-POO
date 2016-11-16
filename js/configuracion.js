var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

$(document).ready(function(){
	cargarInformacion();
	$("#editar-imagen").click(function(evento){
		evento.preventDefault();

		$("#div-editar").html('<form id="form-imagen1"><input type="file" name="imagen" id="imagen" class="form-control" accept="image/*"></form><br><button class="btn btn-default" onclick="actualizarImagen()">Actualizar</button><div id="mensaje"></div>');
		$("#modal-editar").modal("show");
	});
	$("#editar-nombre").click(function(evento){
		evento.preventDefault();

		$("#div-editar").html('<p>Introduzca el nuevo valor para el nombre</p><br><input type="text" class="form-control" id="txt-nombre"><br><button class="btn btn-default" onclick="actualizarNombre()">Actualizar</button><div id="mensaje"></div>');
		$("#modal-editar").modal("show");
	});
	$("#editar-apellido").click(function(evento){
		evento.preventDefault();

		$("#div-editar").html('<p>Introduzca el nuevo valor para el apellido</p><br><input type="text" class="form-control" id="txt-apellido"><br><button class="btn btn-default" onclick="actualizarApellido()">Actualizar</button><div id="mensaje"></div>');
		$("#modal-editar").modal("show");
	});
	$("#editar-correo-electronico").click(function(evento){
		evento.preventDefault();

		$("#div-editar").html('<p>Introduzca el nuevo valor para el correo electrónico</p><br><input type="text" class="form-control" id="txt-correo-electronico"><br><button class="btn btn-default" onclick="actualizarCorreoElectronico()">Actualizar</button><div id="mensaje"></div>');
		$("#modal-editar").modal("show");
	});
	$("#editar-contraseña").click(function(evento){
		evento.preventDefault();

		$("#div-editar").html('<p>Introduzca el valor actual de la contraseña</p><br><input type="password" class="form-control" id="txt-contraseña-actual"><p>Introduzca el nuevo valor para la contraseña</p><br><input type="password" class="form-control" id="txt-contraseña"><br><button class="btn btn-default" onclick="actualizarContraseña()">Actualizar</button><div id="mensaje"></div>');
		$("#modal-editar").modal("show");
	});
	$("#btn-eliminar-cuenta").click(function(){
		$("#modal-confirmar").modal("show");
	});
	$("#btn-confirmar").click(function(){
		var parametros = "codigo-usuario="+$("#codigo-usuario").val();
		$.ajax({
			method: "post",
			data: parametros,
			url: "../ajax/ctrl_configuracion.php?accion=7",
			success: function(respuesta){
				if(respuesta == "error"){
					$("#div-eliminar").html("Error al eliminar la cuenta");
				} else if(respuesta == "pendiente"){
					$("#div-eliminar").html("Tiene préstamos pendientes, devuelva los libros y luego elimine su cuenta");
					$("#modal-confirmar").modal("hide");
				} else{
					$("#modal-confirmar").modal("hide");
					$("#mensaje-aviso").html("La cuenta ha sido eliminada");
					$("#modal-aviso").modal("show");
					$("#modal-aviso").on('hidden.bs.modal', function(){
						$(location).attr('href',"logout.php");
					});
				}
			}
		});
	});
});

function actualizarImagen(){
	var formData = new FormData($("#form-imagen1")[0]);
	formData.append("codigo-usuario",$("#codigo-usuario").val());

	$.ajax({
		method: "post",
		url: "../ajax/ctrl_configuracion.php?accion=6",
		data: formData,
		contentType: false,
        processData: false,
		success: function(respuesta){
			if(respuesta == 'error'){
				$("#mensaje").addClass('well');
				$("#mensaje").html("Error al cargar la imagen, seleccione un archivo válido");
			} else{
				$("#mensaje").addClass("well");
				$("#mensaje").html(respuesta);
				$("#modal-editar").modal("hide");
				$("#modal-aviso").modal("show");
				$("#modal-aviso").on('hidden.bs.modal', function(){
					$(location).attr('href',"configuracion.php");
				});
			}
		}
	});
}

function actualizarNombre(){
	if($("#txt-nombre").val() == ""){
		$("#mensaje").addClass("well");
		$("#mensaje").html("El campo no puede estar vacío");
	} else{
		var parametros = "nuevo-valor="+$("#txt-nombre").val()
							+"&codigo-usuario="+$("#codigo-usuario").val();
		$.ajax({
			method: "post",
			url: "../ajax/ctrl_configuracion.php?accion=2",
			data: parametros,
			success: function(respuesta){
				$("#mensaje").addClass("well");
				$("#mensaje").html(respuesta);
				$("#modal-editar").modal("hide");
				$("#modal-aviso").modal("show");
				cargarInformacion();
				$("#modal-aviso").on('hidden.bs.modal', function(){
					$(location).attr('href',"configuracion.php");
				});
			}
		});
	}
}
function actualizarApellido(){
	if($("#txt-apellido").val() == ""){
		$("#mensaje").addClass("well");
		$("#mensaje").html("El campo no puede estar vacío");
	}else{
		var parametros = "nuevo-valor="+$("#txt-apellido").val()
							+"&codigo-usuario="+$("#codigo-usuario").val();
		$.ajax({
			method: "post",
			url: "../ajax/ctrl_configuracion.php?accion=3",
			data: parametros,
			success: function(respuesta){
				$("#mensaje").addClass("well");
				$("#mensaje").html(respuesta);
				$("#modal-editar").modal("hide");
				$("#modal-aviso").modal("show");
				cargarInformacion();
				$("#modal-aviso").on('hidden.bs.modal', function(){
					$(location).attr('href',"configuracion.php");
				});
			}
		});
	}
}
function actualizarCorreoElectronico(){
	if($("#txt-correo-electronico").val() == "" || !emailreg.test($("#txt-correo-electronico").val())){
		$("#mensaje").addClass("well");
		$("#mensaje").html("Introduzca un correo válido");
	}else{
		var parametros = "nuevo-valor="+$("#txt-correo-electronico").val()
							+"&codigo-usuario="+$("#codigo-usuario").val();
		$.ajax({
			method: "post",
			url: "../ajax/ctrl_configuracion.php?accion=4",
			data: parametros,
			success: function(respuesta){
				$("#mensaje").addClass("well");
				$("#mensaje").html(respuesta);
				$("#modal-editar").modal("hide");
				$("#modal-aviso").modal("show");
				cargarInformacion();
			}
		});
	}
}
function actualizarContraseña(){
	if($("#txt-contraseña").val() == "" || $("#txt-contraseña-actual").val() == ""){
		$("#mensaje").addClass("well");
		$("#mensaje").html("Los campos no pueden estar vacíos");
	}else{
		var parametros = "nuevo-valor="+$("#txt-contraseña").val()
							+"&valor-actual="+$("#txt-contraseña-actual").val()
							+"&codigo-usuario="+$("#codigo-usuario").val();
		$.ajax({
			method: "post",
			url: "../ajax/ctrl_configuracion.php?accion=5",
			data: parametros,
			success: function(respuesta){
				if(respuesta == 'error'){
					$("#mensaje").addClass("well");
					$("#mensaje").html("Contraseña actual errónea");
				} else{
					$("#mensaje").addClass("well");
					$("#mensaje").html(respuesta);
					$("#modal-editar").modal("hide");
					$("#modal-aviso").modal("show");
				cargarInformacion();
				}
			}
		});
	}
}

function cargarInformacion(){
	$.ajax({
		method: "post",
		url: "../ajax/ctrl_configuracion.php?accion=1",
		data: "codigo-usuario="+$("#codigo-usuario").val(),
		dataType: "json",
		success: function(respuesta){
			$("#nombre").html(respuesta.nombre);
			$("#apellido").html(respuesta.apellido);
			$("#correo-electronico").html(respuesta.correo_electronico);
			$("#contraseña").html("*********");
		}
	});
}