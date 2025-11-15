<?php
    $tipo_vehiculo = $_POST['vehiculo'];
    $precio = $_POST['Precio_por_Hora'];

    $HOST = 'localhost';
    $USERNAME = 'root';
    $PASSWORD = '';
    $DBNAME = 'estacionamiento';

    $conexion = new mysqli($HOST,$USERNAME,$PASSWORD,$DBNAME);

    if($conexion -> connect_error){
        die("Conexion Fallida: ".$conexion->connect_error);
    }

    $insertar = "INSERT INTO tarifas(tipo_vehiculo,tarifa) VALUES('$tipo_vehiculo','$precio')";
    if($conexion -> query($insertar) === TRUE){
         echo "<script>alert('Nuevo registro creado correctamente'); window.history.back();</script>";
    }else{
        echo "<script>alert('ERROR: " . $conexion->error . "'); window.history.back();</script>";
    }

    $conexion->close();
?>