<?php

class register{
    public $id;
    public $nombre;
    public $correo;
    public $usuario;
    public $contrasena;

    public function __construct($id, $nombre, $correo, $usuario, $contrasena){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
    }

    public static function VerificarCorreo($correo){
        $list = [];
        $db = Db::getInstance();
        $response = $db->query('SELECT* FROM usuario WHERE correo="'.$correo.'" ');
        
        foreach ($response->fetchAll() as $tabla) {
            $list[] = new register($tabla['id'], $tabla['nombre'], $tabla['correo'], $tabla['usuario'], $tabla['contrasena']); 
        }
        return $list;
    }

    public static function Guardar($nombre, $correo, $usuario, $contrasena) {
        $db = Db::getInstance();
        $sql = $db->prepare("INSERT INTO usuario(nombre,correo,usuario,contrasena) VALUES (?,?,?,?)");
        $sql->bindParam(1, $nombre, PDO::PARAM_STR, 50);
        $sql->bindParam(2, $correo, PDO::PARAM_STR, 50);
        $sql->bindParam(3, $usuario, PDO::PARAM_STR, 50);
        $sql->bindParam(4, $contrasena, PDO::PARAM_STR, 255);
        
        $response = $sql->execute();
        if ($response) {
            $miArchivo = fopen('USUARIOS/'.$correo.'.txt','a') or die("Unable to open file");
            fwrite($miArchivo, $contrasena);
            fclose($miArchivo);
            return true;
        }else{
            return false;
        }
    }
}

?>