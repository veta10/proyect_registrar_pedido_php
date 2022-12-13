<?php
    function fechaHoy(){
        date_default_timezone_set("America/Lima");
        return date("d")."-".date("m")."-".date("Y");
    }
    function fechaDate($Fecha){//02-11-2020
        $DMA = explode('-', $Fecha);
        $dia = $DMA[0];
        $mes   = $DMA[1];
        $año  = $DMA[2];
        return $año.'-'.$mes.'-'.$dia;//2020/11/02
    }
    function horaActual(){
        date_default_timezone_set("America/Lima");
        return date("h").":".date("i").":".date("s")." ".date("A");
    }
    function contador($archivo)
    {
         //el archivo que contiene en numero
        $f = fopen($archivo, "r"); //abrimos el archivo en modo de lectura
        if($f)
        {
            $contador = fread($f, filesize($archivo)); //leemos el archivo
            $contador = $contador + 1; //sumamos +1 al contador
            fclose($f);
        }
        
        $f = fopen($archivo, "w+");
        if($f)
        {
            fwrite($f, $contador);
            fclose($f);
        }
        return $contador;
    }
?>

