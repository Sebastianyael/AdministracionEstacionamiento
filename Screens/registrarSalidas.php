<?php
    require '../components/header.php';
    require '../components/aside.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Salida</title>
    <link rel="stylesheet" href="../assets/styles/general.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/styles/registrarSalida.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/styles/registrarSalida.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div class="main">
        <H2>Registrar Salida de Vehiculo</H2>

        <br>
        <form action="../php/CRUDSalida_de_Vehiculos/registrarSalida.php" method="post" class="formulario-para-registrar-salida">
            <input type="text" name="id"  placeholder="Id del registro">
        
            <input type="datetime-local" name="Hora_de_Salida" placeholder="Hora de salida">

            <button class="enviar-Button" type="submit" >
                <i class="fa-solid fa-pen"></i>
                Actualizar
            </button>
        </form>
        <button class="enviar-Button" onclick="location.reload();">Actualizar</button>
        <div class="div-carros-regitrados">
            <?php
                require '../bd/ConexionBD.php';
                $seleccion = "SELECT id,dueno, placa, hora_entrada,horaSalida, tipo_vehiculo, espacio_asignado,estado,tarifa FROM vehiculos_vista WHERE estado = 'Sin Pagar'";
                $result_select = $conexion->query($seleccion);


                if ($result_select->num_rows > 0) {

                    echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; text-align: center;font-size:15px;'>
                            <tr>
                                <th>ID</th>
                                <th>Dueño</th>
                                <th>Placa</th>
                                <th>Hora de Entrada</th>
                                <th>Hora de Salida</th>
                                <th>Tipo de Vehículo</th>
                                <th>Espacio Asignado</th>
                                <th>Estado</th>
                                <th>Tarifa</th>
                            </tr>";

                    while($row = $result_select->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["dueno"] . "</td>
                                <td>" . $row["placa"] . "</td>
                                <td>" . $row["hora_entrada"] . "</td>
                                <td>" . $row["horaSalida"] . "</td>
                                <td>" . $row["tipo_vehiculo"] . "</td>
                                <td>" . $row["espacio_asignado"] . "</td>
                                <td>" . $row["estado"] . "</td>
                                <td>" . $row["tarifa"] . ' '  . 'MXN' ."</td>
                                
                            </tr>";
                    }

                    echo "</table>";

                } else {
                    echo "No hay registros para mostrar.";
                }

                $conexion->close();
            ?>
        </div>
    </div>  
</body>
</html>