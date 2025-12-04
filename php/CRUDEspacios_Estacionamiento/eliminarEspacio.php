<?php
require '../../bd/ConexionBD.php';

$id = $_GET['id'];

$delete = $conexion->prepare("DELETE FROM espacios WHERE id = ?");
$delete->bind_param("i", $id);
$delete->execute();

echo "<script>alert('✔ Espacio eliminado correctamente'); window.location='../../Screens/espacios.php';</script>";
exit;
?>
