<?php

class PagesController
{
    public function home(){
        $first_name = 'Pierluig';
        $last_name = 'Vaca';
        require_once('../app/views/pages/home.php');
    }

    public function error404(){
        require_once('../app/views/pages/error404.html');
    }

    public function error500(){
        require_once('../app/views/pages/error500.html');
    }
}

?>