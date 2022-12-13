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
        <form action="" method="POST">
        <?php include("Pagina/Cabecera.html");?> 
        <div align="center">
        <table border="1" width="75%">
            <thead>
            <th>ID</th>
            <th>PRODUCTO</th>
            <th>DESCRIPCION</th>
            <th>CANTIDAD</th>
            <th>PRECIO</th>
            <th>IMPORTE</th>
            <th>QUITAR</th>
            </thead>
        <?php session_start();
        if(isset($_POST["btnRegPed"])){
            header("Location: RegistrarPedido.php");
        }        
        if(isset($_POST["btnNvoPed"])){
            unset($_SESSION['Id']);
            unset($_SESSION['Producto']);
            unset($_SESSION['Descripcion']);
            unset($_SESSION['Cantidad']);
            unset($_SESSION['Precio']);
            header("Location: ListarCategorias.php");
        }
        for($n=0;$n<count($_SESSION['Producto']);++$n){
            $txt="btnX".$n;
            if(isset($_POST[$txt])){
                array_splice($_SESSION['Id'], $n,1);
                array_splice($_SESSION['Producto'], $n,1);
                array_splice($_SESSION['Descripcion'], $n,1);
                array_splice($_SESSION['Cantidad'], $n,1);
                array_splice($_SESSION['Precio'], $n,1);
            }
        }
        
        $Importe=0;
        $Total=0;
        for($n=0;$n<count($_SESSION['Producto']);++$n){
            $Id=$_SESSION['Id'][$n];
            $Producto=$_SESSION['Producto'][$n];
            $Descripcion=$_SESSION['Descripcion'][$n];
            $Cantidad=$_SESSION['Cantidad'][$n];
            $Precio=$_SESSION['Precio'][$n];
            $Importe=$Precio*$Cantidad;
            $Total=$Total+$Importe;
            echo '<tr>';
            echo '<td>'.$Id.'</td>';
            echo '<td>'.$Producto.'</td>';
            echo '<td>'.$Descripcion.'</td>';
            echo '<td align="right">'.number_format($Cantidad,2,'.',',').'</td>';
            echo '<td align="right">'.number_format($Precio,2,'.',',').'</td>';
            echo '<td align="right">'.number_format($Importe,2,'.',',').'</td>';
            echo "<td  align='center'><input type = 'submit' value = 'X' name = 'btnX".$n."' />";
            echo '</tr>';
        }
        echo '<tr><td colspan="5">Total Importes</td>';
        echo '<td align="right">'.number_format($Total,2,'.',',').'</td></tr>';
        ?>
        </table>
            <a href="ListarCategorias.php">Catalogo de Categorias</a>   
            <input type="submit" value="Nuevo Pedido" name="btnNvoPed" />
            <input type="submit" value="Registrar Pedido" name="btnRegPed" />
       </form> 
        <?php include("Pagina/PiePag.html");?>
    </Div>
    </body>
</html>
