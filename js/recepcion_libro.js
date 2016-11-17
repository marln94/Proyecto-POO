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
	
	$("#btn-escanear").click(function(){
		if($("#btn-escanear").html() == 'Escanear código del libro'){
			$("#icono-qr").hide();
			$("#caja-qr").WebcamQRCode({
				onQRCodeDecode: function( resultado ){
					//Métodos para procesar el código QR//
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
	$("#btn-introducir-codigo").click(function(){
		if($("#txt-codigo-libro").val() != ""){
			recibirLibro($("#txt-codigo-libro").val());
		}
	});
	$("#txt-codigo-libro").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Sólo números").show().fadeOut("slow");
               return false;
    }
   });	
});

function recibirLibro(codigoLibro){
	var parametros = "codigo-libro="+codigoLibro
						+"&codigo-usuario="+$("#codigo-usuario").val()
						+"&fecha-devolucion="+obtenerFecha();
	$.ajax({
		method: "post",
		url: "../ajax/ctrl_prestamos.php?opcion=2",
		data: parametros,
		success: function(resultado){
			if(resultado == 'vacio'){
				$("#mensaje-aviso").html("No se puede recibir el libro.");
				$("#modal-aviso").modal("show");
			} else{
				$("#mensaje-aviso").html("Recepción realizada.");
				$("#modal-aviso").modal("show");
			}
			$("#txt-codigo-libro").val("");
		}
	});
}

obtenerFecha = function() {
    var tdate = new Date();
   	var dd = tdate.getDate(); //yields day
   	var MM = tdate.getMonth(); //yields month
   	var yyyy = tdate.getFullYear(); //yields year
   	var xxx = yyyy + "-" +( MM+1) + "-" + dd;

   	return xxx;
}