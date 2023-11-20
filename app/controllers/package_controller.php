<?php

class PackageController
{
    public function index(){
        session_start();
        $paquetes = package::Listar();
        require_once('../app/views/package/index.php');
    }

    public function registrar(){
        require_once('../app/views/package/registrar.php');
    }

    public function nuevo(){
        //Definir Tamaño de archivo 5MB
        define('LIMITE', 5000);
        //Definir arreglo con extensiones permitidas usar serialize
        define('ARREGLO', serialize( array('image/jpg', 'image/jpeg', 'image/gif','image/png')));
        $PERMITIDOS = unserialize(ARREGLO); //Usar unserialize para obtener el arreglo
        if ($_FILES["foto"]["error"] > 0){
            echo'<script type="text/javascript">
                        alert("Error de FILE Selecciona un Archivo");
                        window.location="http://localhost/subirArchivos/index.php"
                        </script>';
        }else {
            if (in_array($_FILES['foto']['type'], $PERMITIDOS) && $_FILES['foto']['size'] <= LIMITE * 1024){
                //Desde subir.php a la carpeta imagenes hay que salir un directorio
                //../imagenes/nombreDeArchivo
                $rutaEnServidor = "../assets/images/" . $_FILES['foto']['name'];
 
                //Desde index.php, la carpeta imagenes está en imagenes/nombreDeArchivo
                $ruta = "../assets/images/" . $_FILES['foto']['name'];
 
                if (!file_exists($ruta)){
                    $resultado = move_uploaded_file($_FILES["foto"]["tmp_name"], $rutaEnServidor);
                    if ($resultado){
                        $nombre = $_POST['nombre'];
                        $descripcion = $_POST['descripcion'];
                        $dias = $_POST['dias'];
                        $precio = $_POST['precio'];
                        $destino = $_POST['destino'];
                        $response = package::Guardar($nombre, $descripcion, $dias, $precio, $destino, $ruta);
 
                    }else {
                        echo'<script type="text/javascript">
                            alert("Ocurrió un error al mover archivo");
                            window.location="http://localhost/subirArchivos/index.php"
                            </script>';
                    }
 
                }else{
                    echo'<script type="text/javascript">
                        alert("Este archivo ya existe en la BD");
                        window.location="http://localhost/subirArchivos/index.php"
                        </script>';
                }
 
            }else {
                echo'<script type="text/javascript">
                        alert("Tipo de archivo no permitido o excede tamaño");
                        window.location="http://localhost/subirArchivos/index.php"
                        </script>';
            }
        }
    }

    public function listar(){
        $paquetes = package::Listar();
        require_once('../app/views/package/index.php');
    }


}

?>