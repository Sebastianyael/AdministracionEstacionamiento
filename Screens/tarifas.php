
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../assets/styles/general.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/styles/tarifas.css?v=<?php echo time(); ?>">
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
            <button type="submit" class="button">
                <i class="fa-solid fa-car-side"></i>
                Registrar Salida
            </button>
        </a>

        <a href="../Screens/tarifas.php">
            <button type="submit" class="button background-blue-color-white">
                <i class="fa-solid fa-money-bill-1-wave"></i>
                Tarifas
            </button>
        </a>
    </aside>

    <div class="main">
        <H2>Administrar Tarifas</H2>
         <br>
        <form action="../php/registrarTarifas.php" method="post" class="formulario-para-asignar-tarifas">
            <input type="text" name="vehiculo" id="" placeholder="Vehiculo" required>
            <input type="number" name="Precio_por_Hora" id="" placeholder="Precio por Hora" required>
            <button class="enviar-Button" type="submit" >
                <i class="fa-solid fa-money-bill-1-wave"></i>
                Registrar
            </button>
        </form>
        <br>
        <button class="enviar-Button" onclick="location.reload();">Actualizar</button>
        <div class="tarifas_container">
                <?php
                    $HOST = 'localhost';
                    $USERNAME = 'root';
                    $PASSWORD = '';
                    $DBNAME = 'estacionamiento';

                    $conexion = new mysqli($HOST, $USERNAME, $PASSWORD, $DBNAME);
                        if ($conexion->connect_error) {
                        die("Conexión Fallida: " . $conexion->connect_error);
                    }

                    $seleccion = "SELECT id,tipo_vehiculo,tarifa FROM tarifas";
                    $result_select = $conexion->query($seleccion);
                     if($result_select->num_rows > 0){
                        while($row = $result_select->fetch_assoc()){
                            echo "
                            <div class='tarjeta'>
                                <h2>" . $row['tipo_vehiculo'] . "</h2>
                                <p>Precio por hora: " . $row['tarifa'] . "</p>
                                <p>ID: " . $row['id'] . ' ' .'$' . "</p>
                                <form action='../php/registrarTarifas.php' method='post'>
                                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                                    <input type='number' name='nuevo_precio' placeholder='Actualizar Precio' >
                                    <button type='submit'>Actualizar</button>
                                </form>
                            </div>
                            ";
                        }
                     }else{
                            echo "No hay registros para mostrar";
                        }
                     $conexion->close();
                ?>
        </div> 
    </div>  
</body>
</html>