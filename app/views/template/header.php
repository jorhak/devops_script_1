<?php



if (isset($_SESSION["login"])){
    echo $_SESSION["login"];
    if ($_SESSION["login"] != "okay"){
        header("Location: ?controller=login&action=index");
        exit();
    } 
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devops</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/gallery.css">
    <link rel="stylesheet" href="../assets/css/package.css">
</head>

<body>

    <nav>
        <ul class="nav-list">
            <li><a href="?controller=home&action=index">Home Page</a></li>
            <li><a href="?controller=gallery&action=index">Gallery</a></li>
            <li class="active-nat-item"><a href="?controller=package&action=index">Package</a></li>
            <li><a href="?controller=booking&action=index">Booking</a></li>
            <li><a href="?controller=login&action=cerrarSesion">Cerrar Sesion</a></li>
        </ul>
        <?php
        try {
            // Intenta obtener una instancia de la conexión a la base de datos
            $db = Db::getInstance();

            // Verifica si la conexión es válida
            if (!$db instanceof PDO) {
                echo "<h2>Conexión Fallida</h2>";
            } else {
                echo "<h2>Conexión Exitosa</h2>";
            }
        } catch (PDOException $e) {
            // Captura la excepción y muestra un mensaje personalizado
            echo "<h2>Error de conexión a la base de datos: " . $e->getMessage() . "</h2>";
        }


        ?>
    </nav>
    <p><?php echo $_SESSION["login"]; ?> </p>