<?php

class HomeController
{
    public function login(){
        $first_name = 'Pierluig';
        $last_name = 'Vaca';
        require_once('../app/views/home/login.php');
    }

    

    public function index(){
        require_once('../app/views/home/index.php');
    }

    public function error404(){
        require_once('../app/views/home/404.html');
    }

    public function error500(){
        require_once('../app/views/home/500.html');
    }

    public function iniciarSesion(){
        if ( isset($_POST['correo']) && isset($_POST['contrasena']) ){
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $archivo = "USUARIOS/".$correo.".txt";
            
            if (!file_exists($archivo)) {
                $MensajeError = 'No Existe ese correo';
                require_once('../app/views/home/login.php');
            }else{
                $miArchivo = fopen($archivo,'r') or die('Unable to open file');
                $MensajeError = 'existeArchivo';
            }

            if ($MensajeError=="existeArchivo") {
                $ContrasenaArchivo = trim(fgets($miArchivo));
                fclose($miArchivo);

                $password = hash('sha256', $contrasena);
                if ($ContrasenaArchivo==$password) {
                    session_start();
                    $_SESSION["login"] = "okay";
                    require_once('../app/views/home/index.php');
                }else{
                    $MensajeError = 'Valores invalidos';
                    require_once('../app/views/home/login.php');
                }
            }else{
                $MensajeError = 'Error correo invalido';
                require_once('../app/views/home/login.php');
            }
        }else{
            $MensajeError = 'Introdusca su correo y contrasena';
            require_once('../app/views/home/login.php');
        }
    }

    public function cerrarSesion() {
        session_start();
        $_SESSION["login"] = "okno";
        require_once('../app/views/home/index.php');
    }

    public function registrar(){
        if ( isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['usuario']) && isset($_POST['contrasena']) ){
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];

            /* Verificar si existe correo o no */
            $existeCorreo = register::VerificarCorreo($correo);
            $count = count($existeCorreo);

            if ($count == 0) {
                /* Hash contrasena con SHA256 */
                $password = hash('sha256', $contrasena);
                $response = register::Guardar($nombre,$correo,$usuario,$password);
                if ($response) {
                    require_once('../app/views/home/login.php');
                }else{
                    require_once('../app/views/home/500.html');
                }
            }else{
                $MensajeError = 'El correo ya existe';
                require_once('../app/views/home/login.php');
            }
            
        }else{
            $MensajeError = 'No se ingresaron Datos';
            require_once('../app/views/home/login.php');
        } 
    }


}

?>