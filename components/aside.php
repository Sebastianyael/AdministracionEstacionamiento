<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/styles/general.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./assets/styles/registrarEntrada.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <aside>
        <a href="../INDEX.php">
            <button type="submit" class="button">
                <i class="fa-solid fa-house"></i>
                Inicio
            </button>
        </a>

        <a href="../Screens/registrarEntradas.php">
            <button type="submit" class="button registrar_Entrada">
                <i class="fa-solid fa-car-side"></i>
                Registrar Entrada
            </button>
        </a>

        <a href="../Screens/registrarSalidas.php">
            <button type="submit" class="button registrar_Salida">
                <i class="fa-solid fa-car-side"></i>
                Registrar Salida
            </button>
        </a>

        <a href="../Screens/tarifas.php">
            <button type="submit" class="button registrar_Tarifa">
                <i class="fa-solid fa-money-bill-1-wave"></i>
                Tarifas
            </button>
        </a>

         <a href="../Screens/historialVehiculos.php">
            <button type="submit" class="button button-historial">
                <i class="fa-solid fa-clock"></i>
                Historial
            </button>
        </a>
    </aside>
    
</body>
</html>