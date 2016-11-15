<?php 
	switch ($_GET["accion"]) {
		case '1':
			if($_POST["txt-nombre"] == ""){
				echo "error";
				break;}
			if($_POST["txt-apellido"] == ""){
				echo "error";
				break;}
			if($_POST["txt-email"] == ""){
				echo "error";
				break;}
			if($_POST["txt-contraseña"] == ""){
				echo "error";
				break;}

			include_once("../class/class_conexion.php");
			include_once("../class/class_usuario.php");
			include_once("../class/class_tipo_usuario.php");
			
			$conexion = new Conexion();

			$usuario = new Usuario(NULL,
				new TipoUsuario(3, "Registrado"),
				$_POST["txt-nombre"],
				$_POST["txt-apellido"],
				$_POST["txt-email"],
				$_POST["txt-contraseña"],
				NULL,
				NULL,
				NULL,
				NULL,
				1);
			$usuario->guardarRegistro($conexion);
			
			if ( ! isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
				echo "Registro creado sin imagen";
			} else{
				$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
			     
			    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= 1024*1024){
			     
			        $imagen_temporal  = $_FILES['imagen']['tmp_name'];  
			        
			        $tipo = $_FILES['imagen']['type'];
			        
			        $fp = fopen($imagen_temporal, 'r+b');
			        $data = fread($fp, filesize($imagen_temporal));
			        fclose($fp);
			        
			        $data = $conexion->escaparCaracteres($data);
			        $ultimoId = $conexion->ultimoId();

			        $resultado = $conexion->ejecutarInstruccion(
			        	sprintf("UPDATE tbl_usuarios 
			            SET imagen_usuario = '%s', 
			            	tipo_imagen = '%s'
			            WHERE codigo_usuario = '%s'",
			            $data,
			            $tipo,
			            $ultimoId
			        ));
			        if (!$resultado){
			            echo "Ocurrió un error al guardar la imagen, puede subirla después.";
			        }
			    } else {
			        echo "Archivo no permitido, el formato no es válido o excede el tamaño de 1mb";
			    }
			}
			$conexion->cerrarConexion();
			break;
		
		default:
			# code...
			break;
	}
?>