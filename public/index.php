<?php
require_once('../app/database/connection.php');
if (isset($_GET['controller']) && isset($_GET['action'])) {
   $controller = $_GET['controller'];
   $action = $_GET['action'];
} else {
   session_start();
   if(isset($_SESSION["login"]) && $_SESSION["login"] == "okay"){
      $controller = 'home';
      $action = 'index';
   }
   $controller = 'login';
   $action = 'index';

}




require_once('../app/routes.php');
