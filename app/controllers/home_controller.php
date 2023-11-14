<?php

class HomeController
{

    public function index(){
        session_start();
        require_once('../app/views/home/index.php');
    }


}

?>