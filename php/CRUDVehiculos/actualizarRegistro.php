<?php
    require '../../bd/ConexionBd.php';

    $id = $_POST['id'];
    $dueño = $_POST['propietario'];
    $placa = $_POST['placa'];
    $hora_Entrada = $_POST['hora_entrada'];
    $tipo_Vehiculo = $_POST['tipo_vehiculo'];
    $espacio_asignado = $_POST['espacio_asignado'];

    $actualizar = "UPDATE vehiculos 
        SET dueno = '$dueño',
            placa = '$placa',
            hora_entrada = '$hora_Entrada',
            tipo_vehiculo = '$tipo_Vehiculo',
            espacio_asignado = '$espacio_asignado'
        WHERE id = '$id' ";

    if($conexion -> query($actualizar) === TRUE){
         echo "<script>alert('Registro Actualizado'); window.history.back();</script>";
    }else{
        echo "<script>alert('Ocurrio un error al actualizar el Registro'); window.history.back();</script>";
    }
    
    $conexion->close();


?>