<?php
require '../../bd/ConexionBD.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    // VALIDAR DUPLICADOS
    $check = $conexion->prepare("SELECT * FROM servicios_extras WHERE nombre = ?");
    $check->bind_param("s", $nombre);
    $check->execute();
    $res = $check->get_result();

    if ($res->num_rows > 0) {
        echo "<script>alert('❌ El servicio ya existe'); window.location='../../Screens/servicios.php';</script>";
        exit;
    }

    // INSERTAR
    $insert = $conexion->prepare("INSERT INTO servicios_extras(nombre, descripcion, precio)
                                  VALUES (?, ?, ?)");
    $insert->bind_param("ssd", $nombre, $descripcion, $precio);
    $insert->execute();

    echo "<script>alert('✔ Servicio registrado correctamente'); window.location='../../Screens/servicios.php';</script>";
    exit;
}
?>
