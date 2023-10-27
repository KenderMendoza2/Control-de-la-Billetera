<?php
session_start();

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'cuenta') {
        header("Location: cuenta.php");
        exit();
    } elseif ($action === 'acercade') {
        header("Location: acercade.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de</title>
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
                <h1>Acerca de</h1>
            </div>
        </div>
    </nav>

    <div class="contenedor">
        <div class="objetivos">
            <h2>OBJETIVOS</h2>
            <P>El objetivo principal del proyecto ex proporcionar a los usuarios
                una herramienta que les permita realizar un seguimiento se sus ingresos,
                gastos y y presupuestos de manera conveniente y eficiente. Esta solución
                busca mejorar la educación financiera y promover la toma de decisiones
                financieras informadas.
            </P>
        </div>
        <div class="porque">
            <h2>PORQUE CREAMOS</h2>
            <p>Creamos este proyecto para abordar las necesidades de las personas en lo
                que respecta a la gestión financiera personal y proporcionarles herramientas
                y recursos que faciliten la toma de decisiones financieras.
                <br>
            </p>
        </div>
        <br>
        <div class="footer" style="text-align: center;">
            &copy; 2023 Kender Mendoza & Ramiro Patzi Todos los derechos reservados.
        </div>
    </div>
</body>

</html>
