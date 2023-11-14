<?php

class BookingController
{
    public function index(){
        session_start();
        require_once('../app/views/booking/index.php');
    }


}

?>