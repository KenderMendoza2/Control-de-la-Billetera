<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta ['theme-color' ] content="#2196f3">
    <!--link para css  -->
    
    <title>Control de la Billetera v1</title>
    <!-- Path to Framework7 Library CSS, Material Theme -->
    <link rel="stylesheet" href="css/framework7.material.min.css">
    <!-- Path to Framework7 color related styles, Material Theme -->
    <link rel="stylesheet" href="css/framework7.material.colors.min.css">
    
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,300,500,700" rel="stylesheet" type="text/css">
    
    <!-- Path to your custom app styles-->
    <link rel="stylesheet" href="css/aplicacion.css">
    <link rel="stylesheet" href="css/style_aplicacion.css">
    <title>Aplicacion de Finanzas personales</title>
</head>

<body>
    <!-- ================ ! PANELES ================== >

<!-- !Menu opciones-->
<div class="statusbar-overlay"></div>
    <div class="panel-overlay"></div>
    <div class="panel panel-left panel-cover">
        <div class="view navbar-fixed">
            <div class="pages">
                <div data-page="panel-left" class="page">
                    <div class="navbar">
                        <div class="navbar-inner">
                            <div class="center">Menú</div>
                        </div>
                    </div>
                    <div class="page-content">
                        <div class="list-block media-list">
                            <ul>
                                <li>
                                    <div class="item-content">
                                        <div class="item-media">
                                            <img src="img/person-circle.svg" alt="foto-perfil" width="44" title="foto_perfil"/>
                                        </div>
                                        <div class="item-inner">
                                            <div class="item-title-row">
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
                                            <div class="item-subtitle"> Disponible: 
                                                <span class="color-green" name="saldoTotal"> 
                                                        <?php
                                                    // Verificar si el nombre del usuario está en la sesión y mostrarlo
                                                    if(isset($_SESSION['saldoIngreso']) && isset($_SESSION['saldoGasto'])){ 
                                                        // Verificar si el saldo de ingreso es mayor que el saldo de gasto
                                                        if($_SESSION['saldoIngreso'] >= $_SESSION['saldoGasto']) {
                                                            // Calcula el saldo total
                                                            $saldoTotal=0;
                                                            $saldoTotal = $_SESSION['saldoIngreso'] - $_SESSION['saldoGasto'];
                                                            echo $saldoTotal . " Bs.";
                                                        } else {
                                                            echo "El saldo de ingreso es menor que el saldo de gasto. Por favor, ingrese sus datos de ingreso.";
                                                            // Aquí puedes mostrar un formulario para que el usuario ingrese sus datos de ingreso
                                                        }
                                                    } else {
                                                        echo "El saldo no disponible";
                                                    }
                                                    ?> 
                                                </span> 
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- LINKS DEL MENU -->
                        <div class="list-block">
                            <ul>
                            <li><a href="#" id="cuentaLink" class="link">Ir a Mi Cuenta</a></li>
                            <li><a href="#" id="acercadeLink" class="link">Acerca de Nosotros</a></li>
                            <li><a href="#" id="hingresoLink" class="link">Historial Ingreso</a></li>
                            <li><a href="#" id="hgastoLink" class="link">Historial Gasto</a></li>
                            </ul>
                        </div>
                        <!-- ! fin .list-block-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- !Toda la pagina -->
    <div class="views">

        <!-- !opciones -->
        <div class="view view-main">
            <!-- ?Pages, debido a que usamos una barra de navegación y una barra de herramientas fijas, tiene clases apropiadas adicionales-->
            <div class="pages navbar-fixed">
                <!-- ?Página, "data-page" contiene el nombre de la página -->
                <div data-page="index" class="page">

                    <!-- ?Barra de navegación superior. En el tema Material debe estar dentro de la página-->
                    <div class="navbar">
                        <div class="navbar-inner">
                            <div class="center">Control de la Billetera</div>
                            <div class="right"><a href="#" title="icono-only" class="open-panel link icon-only"><i
                                        class="icon icon-bars"></i></a></div>
                        </div>
                    </div>
                    
                    <div class="toolbar tabbar">
                        <div class="toolbar-inner">
                            <a href="#tab1" class="active tab-link">INICIO </a>
                            <a href="#tab2" class="tab-link">INGRESOS</a>
                            <a href="#tab3" class="tab-link">GASTOS</a>
                        </div>
                    </div>
                    <div class="tabs-animated-wrap">
                        <div class="tabs">
                            <div id="tab1" class="page-content tab active">
                                <!-- !COLOCAR EL CONTENDOR MOSTRAR MONTO  -->
                                <div class="fondo">
                                    <!-- title -->
                                    <h1 class="title">Saldo total</h1>
                                    <div class="contenedor">
                                        <!-- entrada de datos -->
                                        <h2 name="saldoTotal" class="titleRes"> 
                                            <?php
                                            // Verificar si el nombre del usuario está en la sesión y mostrarlo
                                            if(isset($_SESSION['saldoIngreso']) && isset($_SESSION['saldoGasto'])){ 
                                                // Verificar si el saldo de ingreso es mayor que el saldo de gasto
                                                if($_SESSION['saldoIngreso'] >= $_SESSION['saldoGasto']) {
                                                    // Calcula el saldo total
                                                    $saldoTotal=0;
                                                    $saldoTotal = $_SESSION['saldoIngreso'] - $_SESSION['saldoGasto'];
                                                    echo $saldoTotal . " Bs.";
                                                } else {
                                                    echo "El saldo de ingreso es menor que el saldo de gasto. Por favor, ingrese sus datos de ingreso.";
                                                    // Aquí puedes mostrar un formulario para que el usuario ingrese sus datos de ingreso
                                                }
                                            } else {
                                                echo "El saldo no disponible";
                                            }
                                            ?> 
                                        </h2>
                                        <br>
                                    </div>
                                    <div class="fondo2">
                                    <!-- title -->
                                    <div class="contenedor">
                                        <h1 class="title2">INGRESO</h1>
                                        <!-- entrada de datos -->
                                        <h2 name="saldoIngreso" class="title2">
                                        <?php
                                                    // Verificar si el nombre del usuario está en la sesión y mostrarlo
                                                if(isset($_SESSION['saldoIngreso'])){
                                                    echo $_SESSION['saldoIngreso'];
                                                } else {
                                                    echo "El saldo no disponible";
                                                }
                                                ?> 
                                        </h2>
                                        <br>
                                    </div>
                                    </div>
                                    <div class="fondo3">
                                        <!-- title -->
                                        <div class="contenedor">
                                            <h1 class="title3">GASTO</h1>
                                        <!-- entrada de datos -->
                                            <h2 name="saldoGasto" class="title3">
                                            <?php
                                                    // Verificar si el nombre del usuario está en la sesión y mostrarlo
                                                if(isset($_SESSION['saldoGasto'])){
                                                    echo $_SESSION['saldoGasto'];
                                                } else {
                                                    echo "El saldo no disponible";
                                                }
                                                ?> 
                                            </h2>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- !INGRESOS -->
                            <div id="tab2" class="page-content tab">
                                <!-- !COLOCAR EL CONTENDOR MOSTRAR MONTO  -->
                                <div class="fondo">
                                <!-- title -->
                                    <form form action="sendIngreso.php" method="post" autocomplete="off"> 
                                        <h1 class="title">Añadir Ingreso</h1>
                                            <div class="contenedor">
                                            <!-- entrada de datos -->
                                                <label for="" class="title"> Ingrese los datos </label>
                                                <br>
                                                <input type="texto" name="txtIngreso" title="ingreso" placeholder="Sueldo, iversion...">
                                                <input type="number" name="numberIngreso" title="monto" placeholder="Monto  Bs.">
                                                <!-- botones -->
                                                <div class="btn">
                                                <input name="sendIngreso" type="submit" class="button" value="Añadir">
                                                </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </form>
                                <!-- TODO GASTOS -->
                            <div id="tab3" class="page-content tab">

                            <div class="fondo">
                                <!-- title -->
                                    <form form action="sendGasto.php" method="post" autocomplete="off"> 
                                        <h1 class="title">Añadir Gasto</h1>
                                            <div class="contenedor">
                                            <!-- entrada de datos -->
                                                <label for="" class="title"> Ingrese los datos </label>
                                                <br>
                                                <input type="texto" name="txtGasto" title="ingreso" placeholder="Sueldo, iversion...">
                                                <input type="number" name="numberGasto" title="monto" placeholder="Monto  Bs.">
                                                <!-- botones -->
                                                <div class="btn">
                                                <input name="sendGasto" type="submit" class="button" value="Añadir">
                                                </div>
                                            </div>
                                    </form>        
                                </div>
                            </div>
                        </div>
                    </div> <!-- fin tabs -->
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("cuentaLink").addEventListener("click", function(event) {
            event.preventDefault(); // Previene el comportamiento predeterminado del enlace
            window.location.href = "cuenta.php";
        });

        document.getElementById("acercadeLink").addEventListener("click", function(event) {
            event.preventDefault(); // Previene el comportamiento predeterminado del enlace
            window.location.href = "acercade.php";
        });
        document.getElementById("hingresoLink").addEventListener("click", function(event) {
            event.preventDefault(); // Previene el comportamiento predeterminado del enlace
            window.location.href = "historialingreso.php";
        });

        document.getElementById("hgastoLink").addEventListener("click", function(event) {
            event.preventDefault(); // Previene el comportamiento predeterminado del enlace
            window.location.href = "historialgasto.php";
        });
    </script>
    <!-- ================ LIBRERIAS JS ================== >

    <!-- Framework7 Library JS-->
    <script type="text/javascript" src="js/framework7.min.js"></script>

    <!-- jQuery -->
    <!--script src="js/jquery.js"> </script>

    <!-- JSs-->
    <script type="text/javascript" src="js/app-start.js"></script>
    <!--script type="text/javascript" src="js/main.js"></script-->

    <script src="links.js"></script>
</body>

</html>