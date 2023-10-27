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
} else {
    // Acción no válida o acción no especificada
    echo "Acción inválida";
}
?>
