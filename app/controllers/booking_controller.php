<?php

class BookingController
{
    public function index(){
        session_start();
        $usuario = register::VerificarCorreo($_SESSION["correo"]);
        $paquetes = package::Listar();
        require_once('../app/views/booking/index.php');
    }

    public function registrar(){

    }


}

?>