<?php

class GalleryController
{
    public function index(){
        session_start();
        require_once('../app/views/gallery/index.php');
    }


}

?>