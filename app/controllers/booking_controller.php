<?php

class BookingController
{
    public function index(){
        session_start();
        $usuario = register::VerificarCorreo($_SESSION["correo"]);
        $paquetes = package::Listar();
        $reservas = booking::Listar();
        require_once('../app/views/booking/index.php');
    }

    public function nuevo(){
        session_start();
        if ( isset($_POST['id_usuario']) && isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['telefono']) && isset($_POST['direccion']) && isset($_POST['combobox']) && isset($_POST['adultos']) && isset($_POST['ninos']) && isset($_POST['fecha']) ) {
            $id_usuario = $_POST['id_usuario'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $combobox = $_POST['combobox'];
            $adultos = $_POST['adultos'];
            $ninos = $_POST['ninos'];
            $fecha = $_POST['fecha'];
            //echo 'hola'.' '.$nombre.' '. $correo .' '. $telefono .' '. $direccion .' '. $combobox .' '. $adultos .' '. $ninos .' '. $fecha;

            $response = booking::Guardar($id_usuario,$nombre,$correo,$telefono,$direccion,$combobox,$adultos,$ninos,$fecha);
            //echo $response;
            
            $usuario = register::VerificarCorreo($_SESSION["correo"]);
            $paquetes = package::Listar();
            $reservas = booking::Listar();
            require_once('../app/views/booking/index.php');
               
        }

    }


}

?>