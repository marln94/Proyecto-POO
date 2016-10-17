$(document).ready(function(){
	$("#btn-ingresar-libro").click(function(){
		if(verificar()){
			var parametros = "txt-titulo="+$("#txt-titulo").val()+"&"+"slc-autores="+$("#slc-autores").val()+"&"+"slc-editoriales="+$("#slc-editoriales").val()+"&"+"txt-año="+$("#txt-año").val()+"&"+"slc-categorias="+$("#slc-categorias").val()+"&"+"txt-codigo-libro="+$("#txt-codigo-libro").val()+"&"+"txt-ejemplares="+$("#txt-ejemplares").val()+"&"+"txt-descripcion-fisica="+$("#txt-descripcion-fisica").val()+"&"+"txt-coleccion="+$("#txt-coleccion").val()+"&"+"txt-isbn="+$("#txt-isbn").val()+"&"+"slc-sucursal="+$("#slc-sucursal").val();
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
		if( $("#slc-categorias").val() == null ){
			marcar($("#slc-categorias").closest(".item"),"Seleccione una categoría");
			validacion = validacion && false;
		} else{desmarcar($("#slc-categorias"))}
		if( $("#txt-codigo-libro").val() == "" ){
			marcar($("#txt-codigo-libro").closest(".item"),"Introduzca el codigo del libro");
			validacion = validacion && false;
		} else{desmarcar($("#txt-codigo-libro"))}
		if( $("#txt-ejemplares").val() == "" ){
			marcar($("#txt-ejemplares").closest(".item"),"Introduzca una cantidad");
			validacion = validacion && false;
		} else{desmarcar($("#txt-ejemplares"))}
		if( $("#txt-descripcion-fisica").val() == "" ){
			marcar($("#txt-descripcion-fisica").closest(".item"),"Introduzca una descripción");
			validacion = validacion && false;
		} else{desmarcar($("#txt-descripcion-fisica"))}
		if( $("#txt-coleccion").val() == "" ){
			marcar($("#txt-coleccion").closest(".item"),"Introduzca una colección");
			validacion = validacion && false;
		} else{desmarcar($("#txt-coleccion"))}
		if( $("#txt-isbn").val() == "" ){
			marcar($("#txt-isbn").closest(".item"),"Introduzca el código ISBN");
			validacion = validacion && false;
		} else{desmarcar($("#txt-isbn"))}
		if( $("#slc-sucursal").val() == null ){
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
});