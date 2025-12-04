<?php
require '../../bd/ConexionBD.php';

$id = $_GET['id'];

$delete = $conexion->prepare("DELETE FROM horarios WHERE id = ?");
$delete->bind_param("i", $id);
$delete->execute();

echo "<script>alert('✔ Horario eliminado correctamente'); window.location='../../pages/horarios.php';</script>";
exit;
?>
