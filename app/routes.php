<?php

function call($controller, $action){
    require_once('controllers/'. $controller . '_controller.php');

    switch($controller){
        case 'pages':
            $controller = new PagesController();
            break;
        case 'booking':
            require_once('models/booking.php');
            $controller = new BookingController();
            break;
        case 'gallery':
            require_once('models/gallery.php');
            $controller = new GalleryController();
            break;
        case 'home':
            require_once('models/home.php');
            $controller = new HomeController();
            break;
        case 'package':
            require_once('models/package.php');
            $controller = new PackageController();
            break;
        case 'login':
            require_once('models/register.php');
            $controller = new LoginController();
            break;
    }

    $controller-> { $action } ();
}

$controllers = array(
    'pages' => ['home', 'error404', 'error500'],
    'booking' => ['index'],
    'gallery' => ['index'],
    'home' => [ 'index'],
    'package' => ['index','nuevo'],
    'login' => ['index', 'registrar', 'iniciarSesion', 'cerrarSesion'],
);

if (array_key_exists($controller, $controllers)){
    if (in_array($action, $controllers[$controller])){
        call($controller, $action);
    }else{
        call('pages', 'error500');
    }
}else{
    call('pages', 'error404');
}



?>