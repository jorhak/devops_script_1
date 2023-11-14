<?php

class PackageController
{
    public function index(){
        session_start();
        require_once('../app/views/package/index.php');
    }


}

?>