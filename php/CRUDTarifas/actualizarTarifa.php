<?php
    require '../../bd/ConexionBD.php';

    $id = $_POST['id'];
    $nuevoPrecio = $_POST['nuevo_precio'];
    
    $actualizarTarifa = "UPDATE tarifas
                        SET tarifa = '$nuevoPrecio'
                        WHERE id = '$id' ";

    if($nuevoPrecio < 0 ){
        echo "<script>alert('Tarifa invalida'); window.history.back();</script>";
    }else{

        if($conexion -> query($actualizarTarifa) === TRUE){
            echo "<script>alert('Tarifa actualizada '); window.history.back();</script>";
        }else{
            echo "<script>alert('ERROR: " . $conexion->error . "'); window.history.back();</script>";
        }

    }

    $conexion->close();
                        
?>