<?php
require '../components/header.php';
require '../components/aside.php';
require '../bd/ConexionBD.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> Horarios de atencion</title>
    <link rel="stylesheet" href="../assets/styles/general.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/styles/registrarEntrada.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="main">
    <h2>Horarios de atencion</h2>
    <br>

    <!-- FORMULARIO PARA AGREGAR HORARIO -->
    <form action="../php/CRUDHorarios/AgregarHorario.php" 
          method="post" 
          class="formulario-para-asignar-espacio">

        <select name="dia" required>
            <option value="">Día</option>
            <option value="Lunes">Lunes</option>
            <option value="Martes">Martes</option>
            <option value="Miércoles">Miércoles</option>
            <option value="Jueves">Jueves</option>
            <option value="Viernes">Viernes</option>
            <option value="Sábado">Sábado</option>
            <option value="Domingo">Domingo</option>
        </select>

      <label>Horario de apertura: <input type="time" name="apertura" required></label> 

       <label>Horario de cierre:<input type="time" name="cierre" required></label> 

        <button class="enviar-Button" type="submit">
            <i class="fa-solid fa-floppy-disk"></i> Registrar
        </button>
    </form>

    <button class="enviar-Button" onclick="location.reload();">Actualizar</button>

    <div class="div-carros-regitrados">
        <?php
        $query = "SELECT * FROM horarios ORDER BY id ASC";
        $result = $conexion->query($query);

        if ($result->num_rows > 0) {

            echo "<table class='tabla-general'>
                <tr>
                    <th>ID</th>
                    <th>Día</th>
                    <th>Apertura</th>
                    <th>Cierre</th>
                    <th>Eliminar</th>
                </tr>";

            while ($row = $result->fetch_assoc()) {

                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['dia']}</td>
                    <td>{$row['hora_apertura']}</td>
                    <td>{$row['hora_cierre']}</td>

                    <td>
                        <a href='../php/CRUDHorarios/eliminarHorario.php?id={$row['id']}'
                           onclick='return confirm(\"¿Eliminar este horario?\")'>
                           <i class='fa-solid fa-trash' style='color:red;'></i>
                        </a>
                    </td>
                </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No hay horarios registrados.</p>";
        }

        $conexion->close();
        ?>
    </div>
</div>

</body>
</html>
