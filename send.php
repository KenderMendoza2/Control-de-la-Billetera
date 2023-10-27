<?php
session_start();

if(isset($_POST['send'])){
    if(
        strlen($_POST['name']) >= 1 &&
        strlen($_POST['password']) >= 1 &&
        strlen($_POST['email']) >= 1
    ){
        $name = trim($_POST['name']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);
        $fecha = date("d/m/y");

        $_SESSION['saldoIngreso'] =0;
        $_SESSION['saldoGasto'] =0;

        // Limpiar los archivos de texto
        $filenameGasto = "historialGastos.txt";
        $filenameIngreso = "historialIngresos.txt";
        
        file_put_contents($filenameGasto, ""); // Vaciar el archivo historialGasto.txt
        file_put_contents($filenameIngreso, ""); // Vaciar el archivo historialIngreso.txt

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=formulario", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $consulta = $pdo->prepare ("INSERT INTO datos(nombre, contraseña, email, fecha) VALUES (:nombre, :contrasena, :email, :fecha)");
            $consulta->bindParam(':nombre', $name);
            $consulta->bindParam(':contrasena', $password);
            $consulta->bindParam(':email', $email);
            $consulta->bindParam(':fecha', $fecha);
            $consulta->execute();
            
            // Obtener el ID del usuario después de la inserción
            $usuario_id = $pdo->lastInsertId();

            $_SESSION['usuario_id'] = $usuario_id; // Almacena el ID del usuario en la sesión
            // Guardar el nombre en la sesión para su posterior uso
            $_SESSION['nombreUsuario'] = $name;
            $_SESSION['contraseñaUsuario'] = $password;
            $_SESSION['emailUsuario'] = $email;
            $_SESSION['fechaUsuario'] = $fecha;

            header("Location: aplicacion.php");
            exit();
            
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo '<h3 class="error">Llena todos los campos</h3>';
    }
}
?>
