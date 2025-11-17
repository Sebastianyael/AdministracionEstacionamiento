<?php
    $HOST = 'localhost';
    $USERNAME = 'root';
    $PASSWORD = '';
    $DBNAME = 'estacionamiento';
    $estado = 'Sin Pagar';
    $propietario = $_POST['propietario'];
    $placa = $_POST['placa'];
    $horaEntrada = $_POST['horaEntrada'];
    $tipoVehiculo = $_POST['tipoVehiculo'];
    $espacioAsignado = $_POST['espacioAsignado'];
    

    $conexion = new mysqli($HOST,$USERNAME,$PASSWORD,$DBNAME);

    if($conexion -> connect_error){
        die("Conexion Fallida: ".$conexion->connect_error);
    }

    $insertar  = "INSERT INTO vehiculos (dueno,placa,hora_entrada,tipo_vehiculo,espacio_asignado,estado)
    VALUES('$propietario','$placa','$horaEntrada','$tipoVehiculo','$espacioAsignado','$estado')";


if($conexion -> query($insertar) === TRUE){
        $id_vehiculo = $conexion->insert_id;
        $id = "INSERT INTO vehiculos_sin_pagar(id_vehiculo)
        VALUES('$id_vehiculo')";
        $conexion->query($id);
         echo "<script>alert('Nuevo registro creado correctamente'); window.history.back();</script>";
    }else{
        echo "<script>alert('ERROR: " . $conexion->error . "'); window.history.back();</script>";
    }

    $conexion->close();
?>

