
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../assets/styles/general.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/styles/registrarSalida.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/styles/registrarSalida.css">
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

        <a href="../Screens/registrarEntradas.php">
            <button type="submit" class="button">
                <i class="fa-solid fa-car-side"></i>
                Registrar Entrada
            </button>
        </a>

        <a href="../Screens/registrarSalidas.php">
            <button type="submit" class="button background-blue-color-white">
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
        <H2>Registrar Salida de Vehiculo</H2>

        <br>
        <form action="../php/registrarSalida.php" method="post" class="formulario-para-registrar-salida">
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
               $HOST = 'localhost';
                $USERNAME = 'root';
                $PASSWORD = '';
                $DBNAME = 'estacionamiento';

                $conexion = new mysqli($HOST, $USERNAME, $PASSWORD, $DBNAME);

                if ($conexion->connect_error) {
                    die("Conexión Fallida: " . $conexion->connect_error);
                }

                $seleccion = "SELECT id,dueno, placa, hora_entrada,horaSalida, tipo_vehiculo, espacio_asignado, persona_en_turno,tarifa FROM vista_completa";
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
                                <th>Persona en Turno</th>
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
                                <td>" . $row["persona_en_turno"] . "</td>
                                <td>" . $row["tarifa"] . "</td>
                                
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