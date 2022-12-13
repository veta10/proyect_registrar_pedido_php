<?php

class BaseDatos {
    public static function Conectar()
    {
        $contraseña = "12345";
        $usuario = "root";
        $BD = "BDNeptuno";
        $Conex=NULL;
        try{
            $Conex = new PDO('mysql:host=localhost;dbname=' . $BD, $usuario, $contraseña);
            //echo 'Conexion Realizada';
            }
        catch(Exception $e){
                echo "Ocurrió algo con la base de datos: " . $e->getMessage();
            }	
                return $Conex;
            }
}
?>

