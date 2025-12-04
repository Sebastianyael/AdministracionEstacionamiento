<?php
require '../../bd/ConexionBD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $seccion = $_POST['seccion'];  // A, B o C
    $numero = $_POST['numero'];    // 1 - 15
    $tipo = $_POST['tipo'];        // Carro, Camioneta, etc.

    // Nombre final
    $nombre = $seccion . $numero;

    // Validar duplicados
    $check = $conexion->prepare("SELECT * FROM espacios WHERE nombre = ?");
    $check->bind_param("s", $nombre);
    $check->execute();
    $res = $check->get_result();

    if ($res->num_rows > 0) {
        echo "<script>alert('❌ El espacio $nombre ya existe'); 
              window.location='../../Screens/espacios.php';</script>";
        exit;
    }

    // Insertar
    $insert = $conexion->prepare("INSERT INTO espacios(nombre, numero, tipo, estado) VALUES (?, ?, ?, 'Disponible')");
    $insert->bind_param("sis", $nombre, $numero, $tipo);
    $insert->execute();

    echo "<script>alert('✔ Espacio $nombre registrado correctamente'); 
          window.location='../../Screens/espacios.php';</script>";
    exit;
}
?>
