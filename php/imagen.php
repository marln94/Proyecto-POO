<?php

    include_once("../class/class_conexion.php");
    $conexion = new Conexion();

    $id = $_GET['id'];
     
    if ($id > 0){
        
        $sql = sprintf("
            SELECT imagen_usuario, tipo_imagen 
            FROM tbl_usuarios
            WHERE codigo_usuario = '%s'",
            $id
        );
        
        $resultado = $conexion->ejecutarInstruccion($sql);
     
        $fila = $conexion->obtenerFila($resultado);
     
        $imagen = $fila['imagen_usuario'];
        $tipo = $fila['tipo_imagen'];
         
        header("Content-type: $tipo");
         
        echo $imagen;
    }
 
?>