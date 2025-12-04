<?php
require '../components/header.php';
require '../components/aside.php';
require '../bd/ConexionBD.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Espacios</title>
    <link rel="stylesheet" href="../assets/styles/general.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/styles/espacios.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/styles/registrarEntrada.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="main">
    <h2>Administrar Espacios</h2>
    <br>

    <!-- FORMULARIO PARA AGREGAR ESPACIO -->
    <form action="../php/CRUDEspacios_Estacionamiento/AgregarEspacio.php" 
          method="post" class="formulario-para-asignar-espacio">

        <!-- LETRA (SECCIÓN) -->
        <select name="seccion" required>
            <option value="">Sección (A, B, C)</option>
            <option value="A">A - Camionetas</option>
            <option value="B">B - Carros</option>
            <option value="C">C - Camion</option>
            <option value="D">D - Motocicleta</option>
            <option value="E">E - Bicicleta</option>
            <option value="F">F - Discapacitados</option>
        </select>

        <!-- NÚMERO -->
        <select name="numero" required>
            <option value="">Número</option>
            <?php
                for ($i = 1; $i <= 15; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
            ?>
        </select>

        <!-- TIPO DE ESPACIO -->
        <select name="tipo" required>
            <option value="">Tipo</option>
            <option value="Camioneta">Camioneta</option>
            <option value="Carro">Carro</option>
            <option value="Camion">Camion</option>
            <option value="Motocicleta">Motocicleta</option>
            <option value="Bicicleta">Bicicleta</option>
            <option value="Discapacitado">Discapacitado</option>
        </select>

        <button class="enviar-Button" type="submit">
            <i class="fa-solid fa-floppy-disk"></i> Registrar
        </button>
    </form>

    <button class="enviar-Button" onclick="location.reload();">Actualizar</button>

    <div class="div-carros-regitrados">
        <?php
        $query = "SELECT * FROM espacios ORDER BY nombre ASC";
        $result = $conexion->query($query);

        if ($result->num_rows > 0) {
            
            echo "<table class='tabla-general'>
                <tr>
                    <th>Nombre</th>
                    <th>Número</th>
                    <th>Sección</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Eliminar</th>
                </tr>";

            while ($row = $result->fetch_assoc()) {

                // Color del estado
                $color = ($row['estado'] == "Disponible") ? "green" : "red";

                echo "
                <tr>
                    <td>{$row['nombre']}</td>
                    <td>{$row['numero']}</td>
                    <td>" . substr($row['nombre'], 0, 1) . "</td>
                    <td>{$row['tipo']}</td>
                    <td style='color:$color; font-weight:bold;'>{$row['estado']}</td>

                    <td>
                        <a href='../php/CRUDEspacios_Estacionamiento/eliminarEspacio.php?id={$row['id']}'
                           onclick='return confirm(\"¿Eliminar este espacio?\")'>
                           <i class='fa-solid fa-trash' style='color:red;'></i>
                        </a>
                    </td>
                </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No hay espacios registrados.</p>";
        }

        $conexion->close();
        ?>
    </div>
</div>
</body>
</html>
