$(document).ready(function(){
	$.ajax({
      type: 'POST',
      url: '../php/carga.php?opcion=bibliotecario',
      success: function(respuesta){
        var arr = respuesta.split(',');
        document.title = 'Bibliotec - '+arr[1];
        $('#imagen-usuario').attr('src',arr[0])
        $('#nombre-usuario').html(arr[1]);
      }
    });

	$("#btn-escanear").click(function(){
		if($("#btn-escanear").html() == 'Escanear código del libro'){
			$("#icono-qr").hide();
			$("#caja-qr").WebcamQRCode({
				onQRCodeDecode: function( resultado ){
					//Métodos para procesar el código QR//
					alert("Contenido QR: "+resultado);
					$("#caja-qr").WebcamQRCode().stop();
				}
			});
			$("#caja-qr").show();
			$("#caja-qr").WebcamQRCode().start();
			$("#btn-escanear").html("Detener");
		} else{
			$("#caja-qr").WebcamQRCode().stop();
			$("#caja-qr").hide();
			$("#icono-qr").show();
			$("#btn-escanear").html("Escanear código del libro");
		}
	});
});