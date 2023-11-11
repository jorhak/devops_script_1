<?php
require_once('../app/database/connection.php');
session_start();
if (isset($_GET['controller']) && isset($_GET['action'])) {
   $controller = $_GET['controller'];
   $action = $_GET['action'];
} else {
   if (isset($_SESSION["login"])) {
      if ($_SESSION["login"] == "okay") {
         $controller = 'home';
         $action = 'index';
      }
   } else {
      $controller = 'login';
      $action = 'index';
   }
}




require_once('../app/routes.php');
