<?php
    require '../../bd/ConexionBD.php';

    $id = $_POST['id']; //recibe el id desde el formulario
    $horaDeSalida = $_POST['Hora_de_Salida']; //recibe la hora de salida desde el formulario
    $horaDeSalida_Objeto = new DateTime($horaDeSalida); //objeto de la hora de salida
    $horaDeSalida_Fecha = $horaDeSalida_Objeto->format('Y-m-d'); //fecha de la hora de salida
    $horaDeSalida_Hora = $horaDeSalida_Objeto->format('%H');
    $horaDeSalida_Min = $horaDeSalida_Objeto->format('%I');

    $consulta_id = "SELECT id from vehiculos WHERE id = '$id'";
    $id_resultado = $conexion-> query($consulta_id);

    if($id_resultado ->num_rows  > 0){
        $horaEntradaConsulta = "SELECT hora_entrada FROM vehiculos WHERE id = '$id'"; //Consulta que devuelve la hora de entrada del registro con el id que recibimos del formulario
        $resultado = $conexion->query($horaEntradaConsulta); //Resultado de la consulta de la hora de entrada
        $fila = $resultado->fetch_assoc(); //Sirve para obtener una fila del resultado de la consulta y convertirla en un arreglo
        $horaDeEntrada = $fila['hora_entrada']; //hora de entrada
        $horaDenEntrada_Objeto = new DateTime($horaDeEntrada); //objeto de la hora de entrada
        $horaDeEntrada_Fecha = $horaDenEntrada_Objeto->format('Y-m-d'); //fecha de la hora de salida
        $horaDeEntrada_Hora = $horaDenEntrada_Objeto->format('%H');
        $horaDeEntrada_Min = $horaDenEntrada_Objeto->format('%I');
        
        if($horaDeSalida_Fecha < $horaDenEntrada_Fecha){
             echo "<script>alert('No puedes seleccionar una fecha anterior a la fecha registrada. '); window.history.back();</script>";
        }else{
            $tipoVehiculo_Consulta = $conexion->query("SELECT tipo_vehiculo FROM vehiculos WHERE id = '$id'");
            $tipoVehiculo_Objeto = $tipoVehiculo_Consulta->fetch_assoc();
            $vehiculo = $tipoVehiculo_Objeto['tipo_vehiculo'];
    
            $tarifa_Consulta = $conexion->query("SELECT tarifa FROM tarifas WHERE tipo_vehiculo = '$vehiculo'");
            $tarifa_Objeto = $tarifa_Consulta->fetch_assoc();
            $tarifa = $tarifa_Objeto['tarifa'];
    
            $diferencia = date_diff($horaDenEntrada_Objeto,$horaDeSalida_Objeto);
            $tiempoTotal = $diferencia->format('%a dias %H horas %I minutos');
            $tiempoEnEstacionamiento = "UPDATE vehiculos_sin_pagar SET tiempo_en_estacionamiento = '$tiempoTotal' WHERE id_vehiculo = '$id'";
            $conexion->query($tiempoEnEstacionamiento);
    
            $dias = $diferencia->days;
            $horas = $diferencia->h;
            $min = $diferencia->i;
    
            $tiempoTotal_en_Horas = ($dias * 24) + ($horas) + ($min / 60);
            $tarifa_Completa = $tiempoTotal_en_Horas * $tarifa ;
    
            $subirTarifas_Consulta = "UPDATE vehiculos_sin_pagar SET tarifa = '$tarifa_Completa' WHERE id_vehiculo = '$id'";
            $conexion->query($subirTarifas_Consulta);
            $update = "UPDATE vehiculos_sin_pagar SET horaSalida = '$horaDeSalida' WHERE id_vehiculo = '$id'"; //Consulta que actualiza la columna horaSalida en la tabla vehiculos_sin_pagar
            $estado = "Pagado";
            $conexion->query("UPDATE vehiculos SET estado = '$estado' WHERE id = '$id' ");
    
            $conexion->query("INSERT INTO vehiculos_pagados(tiempo_en_estacionamiento,tarifa,hora_salida,id_vehiculo) VALUES('$tiempoTotal','$tarifa_Completa','$horaDeSalida','$id') ");   
    
    
            $update = "UPDATE vehiculos_sin_pagar SET horaSalida = '$horaDeSalida' WHERE id_vehiculo = '$id'"; //Consulta que actualiza la columna horaSalida en la tabla vehiculos_sin_pagar
        
            if($conexion -> query($update) === TRUE){ //Muestra un alerta con el mensaje Registro actualizado si no ha ocurrido algun error
                 echo "<script>alert('Registro actualizado correctamente'); window.history.back();</script>";
                 
            }else{
                echo "<script>alert('ERROR: " . $conexion->error . "'); window.history.back();</script>";
            }
        }

    }else{
        echo "<script>alert('No se encontro registro'); window.history.back();</script>";
    }



    $conexion->close();
?>