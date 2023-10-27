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
    <title>Mi cuenta</title>
    <link rel="stylesheet" href="./css/estilos.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <a href="aplicacion.php" title="logo flecha">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 100 100">
                    <path fill="#ffffff" d="M20 50L70 10V30H90V70H70V90z"/>
                </svg> 
            </a>
          <div class="nav-item">
             <h1>Mi Cuenta</h1>
          </div>
        </div>
      </nav>
    <div class="menu">
        
        <div class="menu-item">
            <label for="nombre">NOMBRE:</label>
            <div class="item-title" name="nameUsuario">
                <?php
                // Verificar si el nombre del usuario está en la sesión y mostrarlo
                if(isset($_SESSION['nombreUsuario'])){
                    echo $_SESSION['nombreUsuario'];
                } else {
                    echo "Nombre de usuario no disponible";
                }
                ?>
            </div>
        </div>
    
        <div class="menu-item">
            <label for="contraseña">CONTRASEÑA:</label>
            <div class="item-title" name="contraseñaUsuario">
                <?php
                // Verificar si la contraseña del usuario está en la sesión y mostrarla
                if(isset($_SESSION['contraseñaUsuario'])){
                    echo $_SESSION['contraseñaUsuario'];
                } else {
                    echo "Contraseña de usuario no disponible";
                }
                ?>
            </div>
        </div>
    
        <div class="menu-item">
            <label for="email">EMAIL:</label>
            <div class="item-title" name="emailUsuario">
                <?php
                // Verificar si el email del usuario está en la sesión y mostrarlo
                if(isset($_SESSION['emailUsuario'])){
                    echo $_SESSION['emailUsuario'];
                } else {
                    echo "Email de usuario no disponible";
                }
                ?>
            </div>
        </div>
        
        <div class="menu-item">
            <label for="email">Fecha de Inicio</label>
            <div class="item-title" name="fechaUsuario">
                <?php
                // Verificar si la fecha del usuario está en la sesión y mostrarla
                if(isset($_SESSION['fechaUsuario'])){
                    echo $_SESSION['fechaUsuario'];
                } else {
                    echo "Fecha de usuario no disponible";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
