<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
   <form action="send.php" method="post" autocomplete="off">

    <img src="img/person-circle.svg" alt="">
<!-- FORMULARIO -->
    <div class="input-group">
        <!-- NOMBRE -->
        <div class="input-container">
            <input type="text" name="name" placeholder="Nombre" >
            <i class="fa-solid fa-user" ></i>
        </div>

        <!-- CONTRASEÑA -->
        <div class="input-container">
            <input type="password" name="password" placeholder="Contraseña" >
            <i class="fa-solid fa-lock" ></i>
        </div>
        <!--EMAIL  -->
        <div class="input-container">
            <input type="email" name="email" placeholder="Email" >
            <i class="fa-solid fa-envelope" ></i>
        </div>

        <a href="#"> Términos y condiciones</a>

        <input name="send" type="submit" class="btn" value="Enviar">
    </div>

   </form>
    <?php

    include("send.php")

    ?>
</body>
</html>
