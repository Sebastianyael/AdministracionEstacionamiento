<?php
    $HOST = 'localhost';
    $USERNAME = 'root';
    $PASSWORD = '';
    $DBNAME = 'estacionamiento';

    $conexion = new mysqli($HOST,$USERNAME,$PASSWORD,$DBNAME); //hace una nueva conexion con la bd
    if($conexion -> connect_error){ //Verifica si ha ocurrido un error durante la conexion con la bd
        die("Conexion Fallida: ".$conexion->connect_error); 
    }

    $id = 31;

    $tipoVehiculo_Consulta = $conexion->query("SELECT tipo_vehiculo FROM vehiculos WHERE id = '$id'");
    $tipoVehiculo_Objeto = $tipoVehiculo_Consulta->fetch_assoc();
    $vehiculo = $tipoVehiculo_Objeto['tipo_vehiculo'];
    echo "<br>$vehiculo</br>";

    $tarifa_Consulta = $conexion->query("SELECT tarifa FROM tarifas WHERE tipo_vehiculo = '$vehiculo'");
    $tarifa_Objeto = $tarifa_Consulta->fetch_assoc();
    $tarifa = $tarifa_Objeto['tarifa'];
    echo "<br>$tarifa</br>";
?>