<?php

class booking{
    public $id;
    public $id_usuario;
    public $usuario_nombre;
    public $usuario_correo;
    public $telefono;
    public $direccion;
    public $id_paquete;
    public $adultos;
    public $ninos;
    public $fecha;

    public function __construct($id, $id_usuario, $usuario_nombre, $usuario_correo, $telefono, $direccion, $id_paquete, $adultos, $ninos, $fecha){
        $this->id= $id;
        $this->id_usuario = $id_usuario;
        $this->usuario_nombre = $usuario_nombre;
        $this->usuario_correo = $usuario_correo;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->id_paquete = $id_paquete;
        $this->adultos = $adultos;
        $this->ninos = $ninos;
        $this->fecha = $fecha;
    }

    public static function Guardar($id_usuario, $usuario_nombre, $usuario_correo, $telefono, $direccion, $id_paquete, $adultos, $ninos, $fecha) {
        $db = Db::getInstance();
        $sql = $db->prepare("INSERT INTO reserva(id_usuario,usuario_nombre,usuario_correo,telefono,direccion,id_paquete,adultos,ninos,fecha) VALUES (?,?,?,?,?,?,?,?,?)");
        $sql->bindParam(1, $id_usuario, PDO::PARAM_INT);
        $sql->bindParam(2, $usuario_nombre, PDO::PARAM_STR, 50);
        $sql->bindParam(3, $usuario_correo, PDO::PARAM_STR, 50);
        $sql->bindParam(4, $telefono, PDO::PARAM_STR, 8);
        $sql->bindParam(5, $direccion, PDO::PARAM_STR, 50);
        $sql->bindParam(6, $id_paquete, PDO::PARAM_INT);
        $sql->bindParam(7, $adultos, PDO::PARAM_INT);
        $sql->bindParam(8, $ninos, PDO::PARAM_INT);
        $sql->bindParam(9, $fecha, PDO::PARAM_STR, 10);
        
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
        $response = $db->query("SELECT* FROM reserva ORDER BY id DESC");
        foreach($response->fetchAll() as $tabla){
            $list[] = new booking($tabla['id'], $tabla['id_usuario'], $tabla['usuario_nombre'], $tabla['usuario_correo'], $tabla['telefono'], $tabla['direccion'], $tabla['id_paquete'], $tabla['adultos'], $tabla['ninos'], $tabla['fecha']); 
        }
        return $list;
    }

}

?>