<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <div align="center"> 
    <?php include("Pagina/Cabecera.html");?>
        <form action="rptPedido.php" method="GET">
        Nro. Pedido:
        <input type="text" name="txtNroPedido" value="0" size="10" />
        <input type="submit" value="Buscar" name="btnBuscar" /><br><br>
        <?php
        if(isset($_POST["btnBuscar"])){

        }
        ?>

       </form>
            <?php include ("Pagina/PiePag.html");?>
  </div> 
    </body>
</html>
