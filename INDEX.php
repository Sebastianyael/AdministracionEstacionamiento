<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="./assets/styles/general.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./assets/styles/registrarEntrada.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./assets/styles/inicio.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <header>
        <img src="./assets/images/logo.png" alt="logo">
        <h2>Dashboard</h1>
    </header>

    <aside>
        <a href="./INDEX.php">
            <button type="submit" class="button background-blue-color-white">
                <i class="fa-solid fa-house"></i>
                Inicio
            </button>
        </a>

        <a href="./Screens/registrarEntradas.php">
            <button type="submit" class="button">
                <i class="fa-solid fa-car-side"></i>
                Registrar Entrada
            </button>
        </a>

        <a href="./Screens/registrarSalidas.php">
            <button type="submit" class="button">
                <i class="fa-solid fa-car-side"></i>
                Registrar Salida
            </button>
        </a>

        <a href="./Screens/tarifas.php">
            <button type="submit" class="button">
                <i class="fa-solid fa-money-bill-1-wave"></i>
                Tarifas
            </button>
        </a>

         <a href="./Screens/historialVehiculos.php">
            <button type="submit" class="button">
                <i class="fa-solid fa-clock"></i>
                Historial
            </button>
        </a>
    </aside>

    <div class="main">
        <H2>Bienvenido</H2>
        <br>
        <div class="options">

            <a href="./Screens/registrarEntradas.php" class="ancla">
                <div class="acceso-rapido-container">
                    <i class="fa-solid fa-car-side"></i>
                    <h3>Registrar Entrada</h3>
                    <p>Registrar una nueva entrada</p>
                </div>
            </a>

            <a href="./Screens/registrarSalidas.php" class="ancla">
                <div class="acceso-rapido-container">
                    <i class="fa-solid fa-car-side"></i>
                    <h3>Registrar Salida</h3>
                    <p>Registrar salida </p>
                </div>
            </a>


            <a href="./Screens/tarifas.php" class="ancla">
                <div class="acceso-rapido-container">
                    <i class="fa-solid fa-money-bill-1-wave"></i>
                    <h3>Tarifas</h3>
                    <p>Registrar una nueva tarifa</p>
                </div>
            </a>

            <a href="./Screens/historialVehiculos.php" class="ancla">
                <div class="acceso-rapido-container">
                    <i class="fa-solid fa-clock"></i>
                    <h3>Historial</h3>
                    <p>Vehiculos en el estacionamiento</p>
                </div>
            </a>
            
        </div>

    </div>  
</body>
</html>