<?php

class BaseDatos {
    public static function Conectar()
    {
        $contraseña = "9gxJ9ftY9Zk3AKM7S7Cm";
        $usuario = "root";
        $BD = "bdneptuno";
        $Conex=NULL;
        try{
            $Conex = new PDO('mysql:host=containers-us-west-86.railway.app;dbname=' . $BD, $usuario, $contraseña);
            //echo 'Conexion Realizada';
            }
        catch(Exception $e){
                echo "Ocurrió algo con la base de datos: " . $e->getMessage();
            }	
                return $Conex;
            }
}
?>

