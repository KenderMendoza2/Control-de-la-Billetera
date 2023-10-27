<?php 
session_start();
if (!isset($_SESSION['usuario_id'])) {
    $_SESSION['saldoGasto'] = 0;

    file_put_contents('historialGastos.txt', '');
}
try {
    $pdo = new PDO("mysql:host=localhost;dbname=formulario", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['sendGasto'])){
        if(
            strlen($_POST['txtGasto']) >= 1 &&
            strlen($_POST['numberGasto']) > 1
        ){
            $txtGasto = trim($_POST['txtGasto']);
            $numberGasto = trim($_POST['numberGasto']);
            $fecha = date("Y-m-d"); // Formato de fecha compatible con MySQL
            
            // Guardar los datos en el archivo de historial (historialIngresos.txt)
            $historial = "Gasto: $txtGasto - Monto: $numberGasto Bs. - Fecha: $fecha\n";
            file_put_contents('historialGastos.txt', $historial, FILE_APPEND);

            $consultaGasto = $pdo->prepare("INSERT INTO gasto (usuario_id, txtGasto, numberGasto, fecha) VALUES (:usuario_id, :txtGasto, :numberGasto, :fecha)");
            $consultaGasto->bindParam(':usuario_id', $usuario_id);
            $consultaGasto->bindParam(':txtGasto', $txtGasto);
            $consultaGasto->bindParam(':numberGasto', $numberGasto);
            $consultaGasto->bindParam(':fecha', $fecha);
            $consultaGasto->execute();

            $usuario_id = $pdo->lastInsertId(); // Obtener el ID después de la inserción
            
            $_SESSION['usuario_id'] = $usuario_id; // Almacena el ID del usuario en la sesión

            $_SESSION['saldoGasto'] += $numberGasto; // Suma al saldoGasto
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
