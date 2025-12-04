<?php
require '../../bd/ConexionBD.php';

$id = $_POST['id'];
$tipo = $_POST['tipo'];
$nivel = $_POST['nivel'];

$sql = "UPDATE espacios 
        SET nivel='$nivel', tipo='$tipo'
        WHERE id=$id";

$conexion->query($sql);

header("Location: ../../Screens/espacios.php");
?>
