<?php
    require '../../bd/ConexionBD.php';

    $id = $_POST['id'];

    $eliminarquery = "DELETE FROM tarifas WHERE id = '$id'";

    if($conexion -> query($eliminarquery) === TRUE){
        echo "<script>alert('Tarifa Eliminada'); window.history.back();</script>";
    }else{
        echo "<script>alert('ERROR: " . $conexion->error . "'); window.history.back();</script>";
    }

?>