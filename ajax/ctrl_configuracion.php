<?php
	session_start();
	switch ($_GET["accion"]) {
		case '1':
			include_once("../class/class_conexion.php");
			include_once("../class/class_usuario.php");
			$conexion = new Conexion();
			$fila = Usuario::informacionUsuario($conexion,$_POST["codigo-usuario"]);
			echo json_encode($fila);
			break;
		case '2':
			include_once("../class/class_conexion.php");
			include_once("../class/class_usuario.php");
			$conexion = new Conexion();
			$_SESSION["nombre"] = Usuario::actualizarNombre($conexion,$_POST["codigo-usuario"],$_POST["nuevo-valor"]);
			break;

		case '3':
			include_once("../class/class_conexion.php");
			include_once("../class/class_usuario.php");
			$conexion = new Conexion();
			$_SESSION["apellido"] = Usuario::actualizarApellido($conexion,$_POST["codigo-usuario"],$_POST["nuevo-valor"]);
			break;

		case '4':
			include_once("../class/class_conexion.php");
			include_once("../class/class_usuario.php");
			$conexion = new Conexion();
			Usuario::actualizarCorreoElectronico($conexion,$_POST["codigo-usuario"],$_POST["nuevo-valor"]);
			break;

		case '5':
			include_once("../class/class_conexion.php");
			include_once("../class/class_usuario.php");
			$conexion = new Conexion();
			Usuario::actualizarContraseña($conexion,$_POST["codigo-usuario"],$_POST["nuevo-valor"],$_POST["valor-actual"]);
			break;
		
		case '6':
			include_once("../class/class_conexion.php");
			$conexion = new Conexion();

			if ( ! isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
				echo "error";
			} else{
				$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
			     
			    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= 1024*1024){
			     
			        $imagen_temporal  = $_FILES['imagen']['tmp_name'];  
			        
			        $tipo = $_FILES['imagen']['type'];
			        
			        $fp = fopen($imagen_temporal, 'r+b');
			        $data = fread($fp, filesize($imagen_temporal));
			        fclose($fp);
			        
			        $data = $conexion->escaparCaracteres($data);

			        $resultado = $conexion->ejecutarInstruccion(
			        	sprintf("UPDATE tbl_usuarios 
			            SET imagen_usuario = '%s', 
			            	tipo_imagen = '%s'
			            WHERE codigo_usuario = '%s'",
			            $data,
			            $tipo,
			            $_POST["codigo-usuario"]
			        ));
			        if (!$resultado){
			            echo "error";
			        }else{

			        }
			    } else {
			        echo "error";
			    }
			}
			break;

		case '7':
			include_once("../class/class_conexion.php");
			include_once("../class/class_usuario.php");
			$conexion = new Conexion();
			Usuario::eliminarCuenta($conexion,$_POST["codigo-usuario"]);
			break;

		default:
			# code...
			break;
	}
?>