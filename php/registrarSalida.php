<?php
    $HOST = 'localhost';
    $USERNAME = 'root';
    $PASSWORD = '';
    $DBNAME = 'estacionamiento';

    $id = $_POST['id']; //recibe el id desde el formulario
    $horaDeSalida = $_POST['Hora_de_Salida']; //recibe la hora de salida desde el formulario
    $horaDeSalida_Objeto = new DateTime($horaDeSalida); //objeto de la hora de salida
    $horaDeSalida_Fecha = $horaDeSalida_Objeto->format('Y-m-d'); //fecha de la hora de salida

    $conexion = new mysqli($HOST,$USERNAME,$PASSWORD,$DBNAME); //hace una nueva conexion con la bd
    if($conexion -> connect_error){ //Verifica si ha ocurrido un error durante la conexion con la bd
        die("Conexion Fallida: ".$conexion->connect_error); 
    }

    $horaEntradaConsulta = "SELECT hora_entrada FROM vehiculos WHERE id = '$id'"; //Consulta que devuelve la hora de entrada del registro con el id que recibimos del formulario
    $resultado = $conexion->query($horaEntradaConsulta); //Resultado de la consulta de la hora de entrada
    $fila = $resultado->fetch_assoc(); //Sirve para obtener una fila del resultado de la consulta y convertirla en un arreglo
    $horaDeEntrada = $fila['hora_entrada']; //hora de entrada
    $horaDenEntrada_Objeto = new DateTime($horaDeEntrada); //objeto de la hora de entrada
    $horaDeEntrada_Fecha = $horaDenEntrada_Objeto->format('Y-m-d'); //fecha de la hora de salida

    if($horaDeSalida_Fecha < $horaDeEntrada_Fecha){
         echo "<script>alert('No puedes seleccionar una fecha anterior a la fecha registrada. '); window.history.back();</script>";
    }else if{

        $diferencia = date_diff($horaDenEntrada_Objeto,$horaDeSalida_Objeto);
        $tiempoTotal = $diferencia->format('%a dias %H horas %I minutos');
        $tiempoEnEstacionamiento = "UPDATE vehiculos_sin_pagar SET tiempo_en_estacionamiento = '$tiempoTotal' WHERE id_vehiculo = '$id'";
        $conexion->query($tiempoEnEstacionamiento);

        $update = "UPDATE vehiculos_sin_pagar SET horaSalida = '$horaDeSalida' WHERE id_vehiculo = '$id'"; //Consulta que actualiza la columna horaSalida en la tabla vehiculos_sin_pagar
    
        if($conexion -> query($update) === TRUE){ //Muestra un alerta con el mensaje Registro actualizado si no ha ocurrido algun error
             echo "<script>alert('Registro actualizado correctamente'); window.history.back();</script>";
             
        }else{
            echo "<script>alert('ERROR: " . $conexion->error . "'); window.history.back();</script>";
        }
    }

    $conexion->close();
?>