<?php
	session_start();

	if($_POST["txt-email"] == ""){
		echo "vacio";
		break;
	}
	if($_POST["txt-contraseña"] == ""){
		echo "vacio";
		break;
	}


	include_once("../class/class_conexion.php");
	include_once("../class/class_usuario.php");
	$conexion = new Conexion();
	if($fila = Usuario::verificarUsuario($conexion,$_POST["txt-email"],$_POST["txt-contraseña"])){
		$_SESSION['codigo-usuario'] = $fila['codigo_usuario'];
		$_SESSION['codigo-tipo-usuario'] = $fila['codigo_tipo_usuario'];
		$_SESSION['nombre'] = $fila['nombre'];
		$_SESSION['apellido'] = $fila['apellido'];
		echo $fila['codigo_tipo_usuario'];
	}else{
		echo "No existe la cuenta";
	}
	
?>