<?php
    require '../components/header.php';
    require '../components/aside.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Entrada de Vehiculos</title>
    <link rel="stylesheet" href="../assets/styles/general.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/styles/registrarEntrada.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div class="main">
        <H2>Registrar Entrada de Vehiculo</H2>
        <br>
        <form action="../php/CRUDVehiculos/registro.php" method="post" class="formulario-para-asignar-espacio">
            <input type="text" name="propietario" id="" placeholder="Propietario" required>
            <input type="text" name="placa" id="" placeholder="Placa" required>
            <input type="datetime-local" name="horaEntrada" id="" placeholder="Hora de Entrada" required>

            <select name="tipoVehiculo">
                <option value="">Elegir Vehiculo</option>
                <?php
                    require '../bd/ConexionBD.php';
                    $select = "SELECT tipo_vehiculo FROM tarifas";

                    if($conexion -> connect_error){
                        die("Conexion Fallida: ".$conexion->connect_error);
                    };

                    $resultado = $conexion->query($select);

                    if($resultado->num_rows > 0){
                        while($row = $resultado->fetch_assoc()){
                            echo "<option value = '" . $row['tipo_vehiculo'] . "'>" . $row['tipo_vehiculo'] . "</option>";
                        };
                    }

                ?>
            </select>


            <input type="text" name="espacioAsignado" id="" placeholder="Espacio Asignado" required>    
            <button class="enviar-Button" type="submit" >
                <i class="fa-solid fa-floppy-disk"></i>
                Registrar
            </button>
        </form>
        <button class="enviar-Button" onclick="location.reload();">Actualizar</button>
        <div class="div-carros-regitrados">
            <?php
                require '../bd/ConexionBD.php';
                $seleccion = "SELECT id ,dueno, placa, hora_entrada, tipo_vehiculo, espacio_asignado FROM vehiculos WHERE estado = 'Sin pagar'";
                $result_select = $conexion->query($seleccion);


                if ($result_select->num_rows > 0) {

                    echo "<table class='tabla-general'>
                            <tr>
                                <th>Dueño</th>
                                <th>Placa</th>
                                <th>Hora de Entrada</th>
                                <th>Tipo de Vehículo</th>
                                <th>Espacio Asignado</th>
                                <th>Actualizar</th>
                                <th>Eliminar</th>
                                
                            </tr>";

                    while($row = $result_select->fetch_assoc()) {
                        echo "<form action = '../php/CRUDVehiculos/actualizarRegistro.php' method='post'>
                                <tr>
                                    <td> <input type='text' name='propietario' value='" . $row['dueno'] . "'> </td>
                                    <td> <input type='text' name='placa' value='" . $row['placa'] . "'> </td>
                                    <td> <input type='text' name='hora_entrada' value='" . $row['hora_entrada'] . "'> </td>
                                    <td> <input type='text' name='tipo_vehiculo' value='" . $row['tipo_vehiculo'] . "'> </td>
                                    <td> <input type='text' name='espacio_asignado' value='" . $row['espacio_asignado'] . "'> </td>
                                    
                                    
                                    <td> <input type='hidden' name='id' value='" . $row['id'] . "'> 
                                        <button type='submit'>
                                        <i class='fa-solid fa-pencil' style='color:purple;'></i>
                                    </td>

                                </form>
                                    <td> 
                                        <form action='../php/CRUDVehiculos/eliminarRegistro.php' method='post'>
                                            <input type='hidden' name='id' value='" . $row['id'] . "'>
                                            <button type='submit'>
                                                 <i class='fa-solid fa-trash' style='color:red;'></i>
                                            </button>
                                        </form>
                                    </td>
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