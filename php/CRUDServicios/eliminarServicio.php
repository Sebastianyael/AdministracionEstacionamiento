<?php
require '../../bd/ConexionBD.php';

$id = $_GET['id'];

$delete = $conexion->prepare("DELETE FROM servicios_extras WHERE id = ?");
$delete->bind_param("i", $id);
$delete->execute();

echo "<script>alert('✔ Servicio eliminado correctamente'); window.location='../../Screens/servicios.php';</script>";
exit;
?>
