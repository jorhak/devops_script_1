<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devops Login-Registro</title>
    <link rel="stylesheet" href="../assets/css/login_registro.css">
</head>
<body>

    <main>
        <div class="contenedor__todo">
            <!-- Esto es el fondo -->
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <p><?php echo $_SESSION["login"]; ?> </p>
                    <h3>Ya tienes una cuenta?</h3>
                    <p>Inicia sesion para entrar a la pagina</p>
                    <button id="btn__iniciar-sesion">Iniciar sesion</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>Aun no tienes una cuenta?</h3>
                    <p>Registrate para que puedas iniciar sesion</p>
                    <button id="btn__registrarse">Registrarse</button>
                </div>
            </div>
            <!-- Formulario de Login y Registro -->    
            <div class="contenedor__login-register">
                <!-- Login -->
                <form method="POST" action="?controller=login&action=iniciarSesion" class="formulario__login">
                    <h2>Iniciar sesion</h2>
                    <p> <?php echo $MensajeError ?> </p> 
                    <input type="text" placeholder="Correo electronico" id="correo" name="correo">
                    <input type="password" placeholder="Contrasena" id="contrasena" name="contrasena">
                    <button type="submit" >Entrar</button>
                </form>
                <!-- Register -->
                <form method="POST" action="?controller=login&action=registrar" class="formulario__register">
                    <h2>Registrarse</h2>
                    <p> <?php echo $MensajeError ?> </p> 
                    <input type="text" placeholder="Nombre Completo" id="nombre" name="nombre">
                    <input type="text" placeholder="Correo Electronico" id="correo" name="correo">
                    <input type="text" placeholder="Usuario" id="usuario" name="usuario">
                    <input type="password" placeholder="Contrasena" id="contrasena" name="contrasena">
                    <button type="submit" >Registrarse</button>
                </form>
            </div>

        </div>
    </main>
    <script src="../assets/js/login_registro.js"></script>
</body>
</html>