$(document).ready(function(){
	var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	
	$("#btn-iniciar").click(function(){
		if(verificar()){
			var parametros = "txt-email="+$("#txt-email").val()+"&"+"txt-contraseña="+$("#txt-contraseña").val();
			$.ajax({
				type: "POST",
				url: "../ajax/ctrl_login.php",
				data: parametros,
				success: function(respuesta){
					if(respuesta == 3){
						$(location).attr('href',"registrado.php");
					}else if(respuesta == 2){
						$(location).attr('href',"bibliotecario.php");
					}else{
						$("#mensaje").html(respuesta);
						$("#modal-advertencia").modal("show");
					}
				}
			});
		}
	});

	verificar = function() {
		if($("#txt-email").val() == "" || !emailreg.test($("#txt-email").val())){
			$("#mensaje").html("Introduzca los datos correctos");
			$("#modal-advertencia").modal("show");
			return false;
		} else if($("#txt-contraseña").val() == ""){
			$("#mensaje").html("Introduzca los datos correctos");
			$("#modal-advertencia").modal("show");
			return false;
		}
		return true;
	}
});
