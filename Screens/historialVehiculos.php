<?php
    require '../components/header.php';
    require '../components/aside.php';
    require '../bd/ConexionBD.php';
    $resultadoHtml = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $fecha = $_POST['fecha_filtro'];
        $seleccion = "SELECT id,dueno,placa,hora_entrada,horaSalida,tipo_vehiculo,espacio_asignado,estado,tarifa FROM vehiculos_vista WHERE DATE(hora_entrada) = '$fecha' ORDER BY id DESC";
        $result_select = $conexion->query($seleccion);
    
        if ($result_select->num_rows > 0) { 
            $resultadoHtml .=  "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; text-align: center;font-size:15px;'>
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
                $resultadoHtml .= "<tr>
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
    
            $resultadoHtml .= "</table>";
        }else {
            $resultadoHtml .= "No hay registros para mostrar.";
        }
    
    
        $conexion->close();
    }

            
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Historial</title>
        <link rel="stylesheet" href="../assets/styles/general.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="../assets/styles/historial.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    </head>
    <body>
        
        <div class="main">
            <H2>Buscar por fecha</H2>
            
            <div class="formulario-historial">
                <form action="" method="post">
                    <input type="date" name="fecha_filtro" id="" require>
                    <button type="submit" class="enviar-Button">
                        Enviar
                    </button>
                </form>
                <button class="enviar-Button" onclick="location.reload();">Actualizar</button>
                
            </div>
            
            <div class="ver-historial">
                <?php 
                    echo $resultadoHtml;
                ?>       
            </div>
            <br>
            <br>
            <br><br><br>
            <H2>Historial</H2>
            <div class="historial-container">
                <?php
                require '../bd/ConexionBD.php';
                $seleccion = "SELECT id,dueno, placa, hora_entrada,horaSalida, tipo_vehiculo, espacio_asignado,estado,tarifa FROM vehiculos_vista  ORDER BY id DESC ";
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
        <br>
        <br>
    </div>  
</body>
</html>