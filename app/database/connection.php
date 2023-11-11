<?php



define('DB_HOST', '127.0.0.1:3306'); // 'your-database-host';
define('DB_NAME', 'devops');   // 'your-database-name';
define('DB_USER', 'dev');      // 'your-database-user';
define('DB_PASS', 'devopslinux');      // 'your-database-password';

class Db
{
    private static $instance = NULL;

    private function __construct()
    {
    }

///PATRON DE DISEÑO SINGLETON
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
            self::$instance = new PDO($dsn.'', DB_USER, DB_PASS, $pdo_options);
        }
        return self::$instance;
    }
}


?>