
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
    <header>

    </header>

    <aside>
        <a href="../INDEX.php">
            <button type="submit" class="button">
                <i class="fa-solid fa-house"></i>
                Inicio
            </button>
        </a>

        <button type="submit" class="button background-blue-color-white">
            <i class="fa-solid fa-car-side"></i>
            Registrar Entrada
        </button>

        <a href="../Screens/registrarSalidas.php">
            <button type="submit" class="button">
                <i class="fa-solid fa-car-side"></i>
                Registrar Salida
            </button>
        </a>

        <a href="../Screens/tarifas.php">
            <button type="submit" class="button">
                <i class="fa-solid fa-money-bill-1-wave"></i>
                Tarifas
            </button>
        </a>
    </aside>

    <div class="main">
        <H2>Registrar Entrada de Vehiculo</H2>
        <br>
        <form action="../php/registro.php" method="post" class="formulario-para-asignar-espacio">
            <input type="text" name="propietario" id="" placeholder="Propietario" required>
            <input type="text" name="placa" id="" placeholder="Placa" required>
            <input type="datetime-local" name="horaEntrada" id="" placeholder="Hora de Entrada" required>

            <select name="tipoVehiculo">
                <option value="">Elegir Vehiculo</option>
                <?php
                    $HOST = 'localhost';
                    $USERNAME = 'root';
                    $PASSWORD = '';
                    $DBNAME = 'estacionamiento';

                    $conexion = new mysqli($HOST,$USERNAME,$PASSWORD,$DBNAME);
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
            <input type="text" name="personaTurno" id="" placeholder="Persona en Turno" required>
            <input type="text" name="estado" id="" placeholder="Estado" required>
            <button class="enviar-Button" type="submit" >
                <i class="fa-solid fa-floppy-disk"></i>
                Registrar
            </button>
        </form>
        <button class="enviar-Button" onclick="location.reload();">Actualizar</button>
        <div class="div-carros-regitrados">
            <?php
               $HOST = 'localhost';
                $USERNAME = 'root';
                $PASSWORD = '';
                $DBNAME = 'estacionamiento';

                $conexion = new mysqli($HOST, $USERNAME, $PASSWORD, $DBNAME);

                if ($conexion->connect_error) {
                    die("Conexión Fallida: " . $conexion->connect_error);
                }

                $seleccion = "SELECT id ,dueno, placa, hora_entrada, tipo_vehiculo, espacio_asignado, persona_en_turno,estado FROM vehiculos";
                $result_select = $conexion->query($seleccion);


                if ($result_select->num_rows > 0) {

                    echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; text-align: center;'>
                            <tr>
                                <th>Dueño</th>
                                <th>Placa</th>
                                <th>Hora de Entrada</th>
                                <th>Tipo de Vehículo</th>
                                <th>Espacio Asignado</th>
                                <th>Persona en Turno</th>
                                <th>Estado</th>
                            </tr>";
                        while($row = $result_select->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["dueno"] . "</td>
                                    <td>" . $row["placa"] . "</td>
                                    <td>" . $row["hora_entrada"] . "</td>
                                    <td>" . $row["tipo_vehiculo"] . "</td>
                                    <td>" . $row["espacio_asignado"] . "</td>
                                    <td>" . $row["persona_en_turno"] . "</td>
                                    <td>" . $row["estado"] . "</td>
                                    <td> 
                                        <form action='./pruebas.php' method='post'>
                                            <input type='hidden' name='id' value='" . $row['id'] . "'>
                                            <button type='submit'>
                                                <i class='fa-solid fa-trash'></i>
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