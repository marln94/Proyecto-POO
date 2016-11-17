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
	
	/*carga de elementos para los select del formulario*/
	$.ajax({
    	method: "post",
    	url: "../ajax/ctrl_registro_libro.php?opcion=1",
    	dataType: "json",
    	success: function(respuesta){
    		$("#slc-autores").html(respuesta.autores);
    		$("#slc-editorial").html(respuesta.editoriales);
    		$("#slc-categorias").html(respuesta.categorias);
    		$("#slc-sucursal").html(respuesta.sucursales);
    		$("#slc-coleccion").html(respuesta.colecciones);
    	}
    });

	$("#rd-tipo-libro-digital").iCheck({
		checkboxClass: 'icheckbox_square',
		radioClass: 'iradio_square',
	});
	$("#rd-tipo-libro-fisico").iCheck({
		checkboxClass: 'icheckbox_square',
		radioClass: 'iradio_square',
	});
	$("#btn-registrar-libro").click(function(){
		if(verificar()){
			if($("#radios input[name=rd-tipo-libro]:checked").val() == '1'){
				var formData = new FormData($("#form-imagen")[0]);
				formData.append("txt-titulo",$("#txt-titulo").val());
				formData.append("slc-autores",$("#slc-autores").val());
				formData.append("slc-editorial",$("#slc-editorial").val());
				formData.append("txt-año",$("#txt-año").val());
				formData.append("slc-categorias",$("#slc-categorias").val());
				formData.append("txt-ejemplares",$("#txt-ejemplares").val());
				formData.append("txt-descripcion-fisica",$("#txt-descripcion-fisica").val());
				formData.append("slc-coleccion",$("#slc-coleccion").val());
				formData.append("txt-isbn",$("#txt-isbn").val());
				formData.append("txt-ubicacion",$("#txt-ubicacion").val());
				formData.append("slc-sucursal",$("#slc-sucursal").val());
				formData.append("txt-edicion",$("#txt-edicion").val());
				formData.append("rd-tipo-libro",1);
			} else{
				var formData = new FormData($("#form-imagen")[0]);
				formData.append("pdf",$("#form-imagen")[1]);
				formData.append("txt-titulo",$("#txt-titulo").val());
				formData.append("slc-autores",$("#slc-autores").val());
				formData.append("slc-editorial",$("#slc-editorial").val());
				formData.append("txt-año",$("#txt-año").val());
				formData.append("slc-categorias",$("#slc-categorias").val());
				formData.append("txt-ejemplares",$("#txt-ejemplares").val());
				formData.append("txt-descripcion-fisica",$("#txt-descripcion-fisica").val());
				formData.append("slc-coleccion",$("#slc-coleccion").val());
				formData.append("txt-isbn",$("#txt-isbn").val());
				formData.append("txt-ubicacion",$("#txt-ubicacion").val());
				formData.append("slc-sucursal",$("#slc-sucursal").val());
				formData.append("txt-edicion",$("#txt-edicion").val());
				formData.append("rd-tipo-libro",2);
			}
			$.ajax({
				type: "POST",
				url: "../ajax/ctrl_registro_libro.php?opcion=2",
				data: formData,
				contentType: false,
	            processData: false,
				success: function(respuesta){
					console.log(respuesta);
					if(respuesta == 'error'){
						$("#mensaje").addClass('well');
						$("#mensaje").html("Formulario con información errónea");
					} else{
						$("#mensaje-registro").html(respuesta);
						$("#modal-sesion").modal('show');
						$("#modal-sesion").modal('show');
						$("#modal-sesion").on('hidden.bs.modal', function(){
							$(location).attr('href',"registro_libro.php");
						});
					}
				}
			});
		}
	});

	

	verificar = function() {
		var validacion = true;
		var tipoLibro;
		if($("#radios input[name=rd-tipo-libro]:checked").val() == '2'){
			tipoLibro = false;
		} else{
			tipoLibro = true;
		}

		$(".bad").removeClass('bad').find('.alert').remove();
		if( $("#txt-titulo").val() == "" ){
			marcar($("#txt-titulo").closest(".item"),"Introduzca un título");
			validacion = validacion && false;
		} else{desmarcar($("#txt-titulo"))}
		if( $("#slc-autores").val() == null){
			marcar($("#slc-autores").closest(".item"),"Seleccione un autor");
			validacion = validacion && false;
		} else{desmarcar($("#slc-autores"))}
		if( $("#slc-editorial").val() == "" ){
			marcar($("#slc-editorial").closest(".item"),"Seleccione una editorial");
			validacion = validacion && false;
		} else{desmarcar($("#slc-editorial"))}
		if( $("#txt-edicion").val() == "" ){
			marcar($("#txt-edicion").closest(".item"),"Introduzca una edición");
			validacion = validacion && false;
		} else{desmarcar($("#txt-edicion"))}
		if( $("#txt-año").val() == "" ){
			marcar($("#txt-año").closest(".item"),"Introduzca un año");
			validacion = validacion && false;
		} else{desmarcar($("#txt-año"))}
		if( $("#slc-categorias").val() == null ){
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
		if( $("#slc-coleccion").val() == "" ){
			marcar($("#slc-coleccion").closest(".item"),"Introduzca una colección");
			validacion = validacion && false;
		} else{desmarcar($("#slc-coleccion"))}
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


    $("#rd-tipo-libro-digital").on('ifChecked', function(){  				/*evento de iCheck*/
    	$("#txt-ejemplares").attr('disabled','disabled');
		$("#txt-descripcion-fisica").attr('disabled','disabled');
		$("#slc-sucursal").attr('disabled','disabled');
		$("#txt-ubicacion").attr('disabled','disabled');

		$("#txt-ejemplares").val("");
		$("#txt-descripcion-fisica").val("");
		$("#slc-sucursal").val('').change();
		$("#txt-ubicacion").val("");
    });
    $("#rd-tipo-libro-fisico").on('ifChecked',function(){
    	$("#txt-ejemplares").removeAttr('disabled');
		$("#txt-descripcion-fisica").removeAttr('disabled');
		$("#slc-sucursal").removeAttr('disabled');
		$("#txt-ubicacion").removeAttr('disabled');
    });

    /**select2**/
    $(".select2_single").select2({
      placeholder: "Seleccione un elemento",
      allowClear: true
    });
    
    $(".select2_multiple").select2({
      maximumSelectionLength: 100,
      placeholder: "Seleccione elementos",
      allowClear: true
    });

    $("#txt-año").keypress(function (e) {
	    //if the letter is not digit then display error and don't type anything
	    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	    	
		}
   	});
   	$("#txt-ejemplares").keypress(function (e) {
	    //if the letter is not digit then display error and don't type anything
	    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	    	
		}
   	});	
});