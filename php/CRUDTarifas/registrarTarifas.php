<?php
    require '../../bd/ConexionBD.php';

    $tipo_vehiculo = $_POST['vehiculo'];
    $precio = $_POST['Precio_por_Hora'];

    if($precio < 0){
        echo "<script>alert('Precio invalido'); window.history.back();</script>";        
    }else{
        $insertar = "INSERT INTO tarifas(tipo_vehiculo,tarifa) VALUES('$tipo_vehiculo','$precio')";
        if($conexion -> query($insertar) === TRUE){
             echo "<script>alert('Nuevo registro creado correctamente'); window.history.back();</script>";
        }else{
            echo "<script>alert('ERROR: " . $conexion->error . "'); window.history.back();</script>";
        }
    }


    $conexion->close();
?>