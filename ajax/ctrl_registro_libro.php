<?php
	switch ($_GET["opcion"]) {
		case '1':
			include_once("../class/class_conexion.php");
			include_once("../class/class_libro.php");
			$conexion = new Conexion();
			Libro::datosRegistroLibro($conexion);
			break;
		
		case '2':
			include_once("../class/class_conexion.php");
			include_once("../class/class_libro.php");
			include_once("../php/generarqr.php");
			$conexion = new Conexion();
			$libro = new Libro(NULL,
								$_POST["rd-tipo-libro"],
								$_POST["slc-editorial"],
								$_POST["txt-año"],
								$_POST["slc-coleccion"],
								1,
								$_POST["txt-edicion"],
								$_POST["txt-titulo"],
								$_POST["txt-ejemplares"],
								$_POST["txt-descripcion-fisica"],
								$_POST["txt-isbn"],
								$_POST["txt-ubicacion"],
								NULL,NULL,NULL);
			$libro->guardarRegistro($conexion);

			$autores = explode(",",$_POST["slc-autores"]);
			$categorias = explode(",",$_POST["slc-categorias"]);
			$sucursales = explode(",",$_POST["slc-sucursal"]);
			$codigoLibro = $conexion->ultimoId();
			$urlImagenQR = GeneradorQR::generarqr($codigoLibro,$_POST["txt-titulo"]);
			$libro->guardarRegistro2($conexion,
								$autores,
								$categorias,
								$sucursales,
								$urlImagenQR,
								$codigoLibro);
			if ( ! isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
				echo "Registro creado sin imagen";
			} else{
				$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
			    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= 1024*1024){
			    	$target_path = "../upload/portadas/";
					$target_path = $target_path . basename( $_FILES['imagen']['name']); 

			    	if(move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path)) {
			    		$libro->guardarImagen($conexion,$target_path,$codigoLibro);
					} else{
					echo "error";
					}
			    }
			}
			
			if ( ! isset($_FILES["pdf"]) || $_FILES["pdf"]["error"] > 0){
				echo "Libro sin archivo PDF";
			} else{
				$permitidos = array("application/pdf");
			    if (in_array($_FILES['pdf']['type'], $permitidos) && $_FILES['pdf']['size'] <= 1024*1024){
			    	$target_path = "../upload/pdf/";
					$target_path = $target_path . basename( $_FILES['pdf']['name']); 

			    	if(move_uploaded_file($_FILES['pdf']['tmp_name'], $target_path)) {
			    		$libro->guardarPDF($conexion,$target_path,$codigoLibro);
					} else{
					echo "error";
					}
			    }
			}
			break;

		default:
			# code...
			break;
	}
?>