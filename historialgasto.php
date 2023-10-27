<?php
session_start();

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Limpiar los archivos de texto
    $filenameGasto = "historialGastos.txt";
    $filenameIngreso = "historialIngresos.txt";
    
    file_put_contents($filenameGasto, ""); // Vaciar el archivo historialGasto.txt
    file_put_contents($filenameIngreso, ""); // Vaciar el archivo historialIngreso.txt

    if ($action === 'historialingreso') {
        header("Location: historialingreso.php");
        exit();
    } elseif ($action === 'historialgasto') {
        header("Location: historialgasto.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial Gasto</title>
    <link rel="stylesheet" href="css/estilos2.css">
</head>

<body>

    <nav class="navbar">
        <div class="navbar-container">
            <a href="aplicacion.php" title="logo flecha">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 100 100">
                    <path fill="#ffffff" d="M20 50L70 10V30H90V70H70V90z" />
                </svg>
            </a>
            <div class="nav-item">
                <h1>Historial Gasto</h1>
            </div>
        </div>
    </nav>

    <div class="contenedor">
        <h1 class="title2">Historial de Gastos</h1>
            <!-- Mostrar historial de gastos -->
            <?php
            // Leer el contenido del archivo de historial (suponiendo que el archivo se llama historialIngresos.txt)
            $historial = file('historialGastos.txt');

            // Iterar sobre cada línea del historial y mostrarla
            foreach ($historial as $linea) {
                echo '<p>' . htmlspecialchars($linea) . '</p>';
            }
            ?>
    </div>
</body>
</html>
