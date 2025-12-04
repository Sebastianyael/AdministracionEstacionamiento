<?php
require '../components/header.php';
require '../components/aside.php';
require '../bd/ConexionBD.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Servicios Extras</title>
    <link rel="stylesheet" href="../assets/styles/general.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/styles/registrarEntrada.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="main">
    <h2>Servicios Extras</h2>
    <br>

    <!-- FORMULARIO PARA AGREGAR SERVICIO -->
    <form action="../php/CRUDServicios/AgregarServicio.php"
          method="post" class="formulario-para-asignar-espacio">

        <input type="text" name="nombre" placeholder="Nombre del servicio" required>

        <input type="text" name="descripcion" placeholder="Descripción (opcional)">

        <input type="number" step="0.01" name="precio" placeholder="Precio" required>

        <button class="enviar-Button" type="submit">
            <i class="fa-solid fa-floppy-disk"></i> Registrar
        </button>

    </form>

    <button class="enviar-Button" onclick="location.reload();">Actualizar</button>

    <div class="div-carros-regitrados">
        <?php
        $query = "SELECT * FROM servicios_extras ORDER BY nombre ASC";
        $result = $conexion->query($query);

        if ($result->num_rows > 0) {

            echo "<table class='tabla-general'>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Eliminar</th>
                </tr>";

            while ($row = $result->fetch_assoc()) {

                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nombre']}</td>
                    <td>{$row['descripcion']}</td>
                    <td>\${$row['precio']}</td>

                    <td>
                        <a href='../php/CRUDServicios/eliminarServicio.php?id={$row['id']}'
                           onclick='return confirm(\"¿Eliminar este servicio?\")'>
                           <i class='fa-solid fa-trash' style='color:red;'></i>
                        </a>
                    </td>
                </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No hay servicios registrados.</p>";
        }

        $conexion->close();
        ?>
    </div>
</div>
</body>
</html>
