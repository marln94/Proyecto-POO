$(document).ready(function(){
	$("#btn-iniciar").click(function(){
		var parametros = "txt-email="+$("#txt-email").val()+"&"+"txt-contaseña="+$("#txt-contaseña").val();
		$.ajax({
			type: "POST",
			url: "../php/login.php",
			data: parametros,
			success: function(respuesta){
				/*codigo*/
			}
		});
	});
});