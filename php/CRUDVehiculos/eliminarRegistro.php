<?php
    require '../../bd/ConexionBD.php';
   
    $id = $_POST['id'];

    if($conexion->query("DELETE FROM vehiculos_sin_pagar WHERE id_vehiculo = '$id' ") === TRUE){
        $conexion->query("DELETE FROM vehiculos WHERE id = '$id' ");
        echo "<script>alert('Registro Eliminado'); window.history.back();</script>";
    }else{
        echo "<script>alert('Ocurrio un error al eliminar el Registro'); window.history.back();</script>";
    }
    
    $conexion->close();
?>