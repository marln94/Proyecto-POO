<?php 

	switch ($_GET["opcion"]) {
		case '1':
			include_once("../class/class_conexion.php");
			include_once("../class/class_categoria.php");
			$conexion = new Conexion();
			

			$categoria = new Categoria(NULL,$_POST["txt-nombre-categoria"],0,NULL,1);
			$categoria->guardarRegistro($conexion);
			$codigoCategoria = $conexion->ultimoId();
			
			if ( ! isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
				echo "Registro creado sin imagen";
			} else{
				$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
			    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= 1024*1024){
			    	$target_path = "../upload/categorias/";
					$target_path = $target_path . basename( $_FILES['imagen']['name']); 

			    	if(move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path)) {
			    		$categoria->guardarImagen($conexion,$target_path,$codigoCategoria);
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