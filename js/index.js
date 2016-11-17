$(document).ready( function(){
	$('#contenedor-categorias').html('<p style="text-align: center;"><img src="images/loading.gif"> </p>');
    $.ajax({
          type: 'POST',
          url: 'ajax/ctrl_index.php?opcion=categorias',
          success: function(respuesta){
            $('#contenedor-categorias').html(respuesta);
        }
    });

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
      $(location).attr('href',"formularios/busqueda.php?q="+$("#txt-busqueda").val());
      $("#txt-busqueda").val("");
    }
  }
});