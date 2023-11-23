<?php

class package{
    public $id;
    public $nombre;
    public $descripcion;
    public $dias;
    public $precio;
    public $destino;
    public $foto;

    public function __construct($id, $nombre, $descripcion, $dias, $precio, $destino, $foto){
        $this->id= $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->dias = $dias;
        $this->precio = $precio;
        $this->destino = $destino;
        $this->foto = $foto;
    }

    public static function Guardar($nombre, $descripcion, $dias, $precio, $destino, $foto) {
        $db = Db::getInstance();
        $sql = $db->prepare("INSERT INTO paquete(nombre,descripcion,dias,precio,destino,foto) VALUES (?,?,?,?,?,?)");
        $sql->bindParam(1, $nombre, PDO::PARAM_STR, 50);
        $sql->bindParam(2, $descripcion, PDO::PARAM_STR, 50);
        $sql->bindParam(3, $dias, PDO::PARAM_STR, 2);
        $sql->bindParam(4, $precio, PDO::PARAM_STR, 4);
        $sql->bindParam(5, $destino, PDO::PARAM_STR, 50);
        $sql->bindParam(6, $foto, PDO::PARAM_STR, 255);
        
        $response = $sql->execute();
        if ($response) {
            return true;
        }else{
            return false;
        }
    }
    
    public static function Listar(){
        $list = [];
        $db = Db::getInstance();
        $response = $db->query("SELECT* FROM paquete");
        foreach($response->fetchAll() as $tabla){
            $list[] = new package($tabla['id'], $tabla['nombre'], $tabla['descripcion'], $tabla['dias'], $tabla['precio'], $tabla['destino'], $tabla['foto']); 
        }
        return $list;
    }

}

?>