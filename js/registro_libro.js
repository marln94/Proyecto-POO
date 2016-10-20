$(document).ready(function(){
	$("#btn-registrar-libro").click(function(){
		if(verificar()){
			if($("#radios input[name=rd-tipo-libro]:checked").val() == 'fisico'){
				var parametros = "txt-titulo="+$("#txt-titulo").val()+"&"+"slc-autores="+$("#slc-autores").val()+"&"+"slc-editoriales="+$("#slc-editoriales").val()+"&"+"txt-año="+$("#txt-año").val()+"&"+"slc-categorias="+$("#slc-categorias").val()+"&"+"txt-ejemplares="+$("#txt-ejemplares").val()+"&"+"txt-descripcion-fisica="+$("#txt-descripcion-fisica").val()+"&"+"txt-coleccion="+$("#txt-coleccion").val()+"&"+"txt-isbn="+$("#txt-isbn").val()+"&"+"slc-sucursal="+$("#slc-sucursal").val()+"&rd-tipo-libro=fisico";
			} else{
				var parametros = "txt-titulo="+$("#txt-titulo").val()+"&"+"slc-autores="+$("#slc-autores").val()+"&"+"slc-editoriales="+$("#slc-editoriales").val()+"&"+"txt-año="+$("#txt-año").val()+"&"+"slc-categorias="+$("#slc-categorias").val()+"&"+"txt-ejemplares="+""+"&"+"txt-descripcion-fisica="+""+"&"+"txt-coleccion="+$("#txt-coleccion").val()+"&"+"txt-isbn="+$("#txt-isbn").val()+"&"+"slc-sucursal="+""+"&rd-tipo-libro=digital";
			}
			$.ajax({
				type: "POST",
				url: "../php/registro.php?opcion=libro",
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
		var tipoLibro;
		if($("#radios input[name=rd-tipo-libro]:checked").val() == 'digital'){
			tipoLibro = false;
		} else{
			tipoLibro = true;
		}

		$(".bad").removeClass('bad').find('.alert').remove();
		if( $("#txt-titulo").val() == "" ){
			marcar($("#txt-titulo").closest(".item"),"Introduzca un título");
			validacion = validacion && false;
		} else{desmarcar($("#txt-titulo"))}
		if( $("#slc-autores").val() == ""){
			marcar($("#slc-autores").closest(".item"),"Seleccione un autor");
			validacion = validacion && false;
		} else{desmarcar($("#slc-autores"))}
		if( $("#slc-editoriales").val() == "" ){
			marcar($("#slc-editoriales").closest(".item"),"Seleccione una editorial");
			validacion = validacion && false;
		} else{desmarcar($("#slc-editoriales"))}
		if( $("#txt-año").val() == "" ){
			marcar($("#txt-año").closest(".item"),"Introduzca un año");
			validacion = validacion && false;
		} else{desmarcar($("#txt-año"))}
		if( $("#slc-categorias").val() == "" ){
			marcar($("#slc-categorias").closest(".item"),"Seleccione una categoría");
			validacion = validacion && false;
		} else{desmarcar($("#slc-categorias"))}
		if( $("#txt-ejemplares").val() == "" && tipoLibro){
			marcar($("#txt-ejemplares").closest(".item"),"Introduzca una cantidad");
			validacion = validacion && false;
		} else{desmarcar($("#txt-ejemplares"))}
		if( $("#txt-descripcion-fisica").val() == "" && tipoLibro){
			marcar($("#txt-descripcion-fisica").closest(".item"),"Introduzca una descripción");
			validacion = validacion && false;
		} else{desmarcar($("#txt-descripcion-fisica"))}
		if( $("#txt-coleccion").val() == "" ){
			marcar($("#txt-coleccion").closest(".item"),"Introduzca una colección");
			validacion = validacion && false;
		} else{desmarcar($("#txt-coleccion"))}
		/*if( $("#txt-isbn").val() == "" ){
			marcar($("#txt-isbn").closest(".item"),"Introduzca el código ISBN");
			validacion = validacion && false;
		} else{desmarcar($("#txt-isbn"))}*/
		if( $("#slc-sucursal").val() == null && tipoLibro){
			marcar($("#slc-sucursal").closest(".item"),"Seleccione una sucursal");
			validacion = validacion && false;
		} else{desmarcar($("#slc-sucursal"))}
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

	$("#rd-tipo-libro-digital").click(function(){
      $("#txt-ejemplares").attr('disabled','disabled');
      $("#txt-descripcion-fisica").attr('disabled','disabled');
      $("#slc-sucursal").attr('disabled','disabled');

      $("#txt-ejemplares").val("");
      $("#txt-descripcion-fisica").val("");
      $("#slc-sucursal").val('').change();
    });
    $("#rd-tipo-libro-fisico").click(function(){
      $("#txt-ejemplares").removeAttr('disabled');
      $("#txt-descripcion-fisica").removeAttr('disabled');
      $("#slc-sucursal").removeAttr('disabled');
    });

    /**select2**/
    $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Seleccione un elemento",
          allowClear: true
        });
        
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "Máximo 4 elementos",
          allowClear: true
        });
      });
});