<?php
require '../../bd/ConexionBD.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $dia = $_POST['dia'];
    $apertura = $_POST['apertura'];
    $cierre = $_POST['cierre'];

    // Validar horarios duplicados (un día solo debe tener un horario)
    $check = $conexion->prepare("SELECT * FROM horarios WHERE dia = ?");
    $check->bind_param("s", $dia);
    $check->execute();
    $res = $check->get_result();

    if ($res->num_rows > 0) {
        echo "<script>alert('❌ Ese día ya tiene un horario registrado.'); window.location='../../Screens/horarios.php';</script>";
        exit;
    }

    // Insertar en BD
    $insert = $conexion->prepare("INSERT INTO horarios(dia, hora_apertura, hora_cierre)
                                  VALUES (?, ?, ?)");
    $insert->bind_param("sss", $dia, $apertura, $cierre);
    $insert->execute();

    echo "<script>alert('✔ Horario registrado correctamente'); window.location='../../Screens/horarios.php';</script>";
    exit;
}
?>
