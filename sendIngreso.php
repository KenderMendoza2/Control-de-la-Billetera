<?php 
session_start();

// Comprobar si el usuario es nuevo y establecer el saldoIngreso en cero
if (!isset($_SESSION['usuario_id'])) {
    $_SESSION['saldoIngreso'] = 0;

    file_put_contents('historialIngresos.txt', '');
}

try {
    $pdo = new PDO("mysql:host=localhost;dbname=formulario", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['sendIngreso'])){
        
        if(
            strlen($_POST['txtIngreso']) >= 1 &&
            strlen($_POST['numberIngreso']) > 1
        ){
            // Obtén el ID del usuario desde la sesión (asumo que lo guardaste previamente)
            $usuario_id = $_SESSION['usuario_id'];

            $txtIngreso = trim($_POST['txtIngreso']);
            $numberIngreso = trim($_POST['numberIngreso']);
            $fecha = date("Y-m-d"); // Formato de fecha compatible con MySQL

            // Guardar los datos en el archivo de historial (historialIngresos.txt)
            $historial = "Ingreso: $txtIngreso - Monto: $numberIngreso Bs. - Fecha: $fecha\n";
            file_put_contents('historialIngresos.txt', $historial, FILE_APPEND);
            
            // Inserta en la tabla ingreso usando el usuario_id obtenido anteriormente
            $consultaIngreso = $pdo->prepare("INSERT INTO ingreso (usuario_id, txtIngreso, numberIngreso, fecha) VALUES (:usuario_id, :txtIngreso, :numberIngreso, :fecha)");
            $consultaIngreso->bindParam(':usuario_id', $usuario_id);
            $consultaIngreso->bindParam(':txtIngreso', $txtIngreso);
            $consultaIngreso->bindParam(':numberIngreso', $numberIngreso);
            $consultaIngreso->bindParam(':fecha', $fecha);
            $consultaIngreso->execute();
            
            // Obtener el ID del usuario después de la inserción
            $usuario_id = $pdo->lastInsertId();

            // Almacena el ID del usuario en la sesión
            $_SESSION['usuario_id'] = $usuario_id;

            
            // Actualizar el saldoIngreso sumando el nuevo ingreso
            $_SESSION['saldoIngreso'] += $numberIngreso;

            header("Location: aplicacion.php");
            exit();
        } else {
            echo '<h3 class="error">Llena todos los campos</h3>';
        }
    }

} catch (PDOException $e) {
    echo '<h3 class="error">Ocurrió un error: ' . $e->getMessage() . '</h3>';
}
?>
