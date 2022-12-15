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
        <form action="ConsultaPedido.php" method="POST">
        Nro. Pedido:
        <input type="text" name="txtNroPedido" value="0" size="10" />
        <input type="submit" value="Buscar" name="btnBuscar" /><br><br>
        <?php
        if(isset($_POST["btnBuscar"])){
          $IdPedido=$_POST["txtNroPedido"];
          $mysqli = new mysqli("containers-us-west-86.railway.app", "root", "9gxJ9ftY9Zk3AKM7S7Cm", "bdneptuno",7510);
          //Datos del pedido
          $query = $mysqli -> query ("SELECT * FROM VistaPedido Where IdPedido=".$IdPedido);
              echo '<table border="1" width="75%">';
              echo '<thead>';
              echo '<th align="center">'.'ID'.'</th>';
              echo '<th align="center">'.'DESTINATARIO'.'</th>';
              echo '<th align="center">'.'FECHA DEL PEDIDO'.'</th>';
              echo '<th align="center">'.'DIRECCION'.'</th>';
              echo '<th align="center">'.'CIUDAD:'.'</th>';
              echo '<th align="center">'.'PAIS'.'</th>';
              echo '<th align="center">'.'EMPRESA'.'</th>';
              echo '</thead>';
          while ($Pedido = mysqli_fetch_array($query)) {
              echo '<tr>';
              echo  '<td align="center">'.$Pedido['IdPedido'].'</td>';
              echo  '<td align="center">'.$Pedido['Destinatario'].'</td>';
              echo  '<td align="center">'.$Pedido['FechaPedido'].'</td>';
              echo  '<td align="center">'.$Pedido['DireccionDestinatario'].'</td>';
              echo  '<td align="center">'.$Pedido['CiudadDestinatario'].'</td>';
              echo  '<td align="center">'.$Pedido['PaisDestinatario'].'</td>';
              echo  '<td align="center">'.$Pedido['NombreEmpresa'].'</td>';
              echo '</tr>';
              echo '</table>';
          }
          // Detalles del pedido
              echo '<table border="1" width="75%">';
              echo '<thead>';
              echo '<th align="center">'.'ITEM'.'</th>';
              echo '<th align="center">'.'PRODUCTO'.'</th>';
              echo '<th align="center">'.'PRESENTACION'.'</th>';
              echo '<th align="center">'.'PRECIO'.'</th>';
              echo '<th align="center">'.'CANTIDAD'.'</th>';
              echo '<th align="center">'.'IMP.COMP'.'</th>';
              echo '<th align="center">'.'IMP.DSCTO'.'</th>';
              echo '<th align="center">'.'IMP.VENTA'.'</th>';
              echo '</thead>';
           $query = $mysqli -> query ("SELECT * FROM VistaDetalle Where IdPedido=".$IdPedido);
           $N=1;
           $TotComp=0;$TotDscto=0;$TotVta=0;
           while ($Detalle = mysqli_fetch_array($query)) {
               echo '<tr>'; 
               echo  '<td align="center">'.$N.'</td>';++$N;
               echo  '<td align="left">'.$Detalle['NombreProducto'].'</td>';
               echo  '<td align="left">'.$Detalle['CantidadPorUnidad'].'</td>';
               echo  '<td align="right">'.number_format($Detalle['PrecioUnidad'],2,'.',',').'</td>';
               echo  '<td align="right">'.number_format($Detalle['Cantidad'],2,'.',',').'</td>';
               echo  '<td align="right">'.number_format($Detalle['ImpCompra'],2,'.',',').'</td>';
               echo  '<td align="right">'.number_format($Detalle['ImpDscto'],2,'.',',').'</td>';
               echo  '<td align="right">'.number_format($Detalle['ImpVta'],2,'.',',').'</td>';
               echo '</tr>';
           $TotComp=$TotComp+$Detalle['ImpCompra'];
           $TotDscto=$TotDscto+$Detalle['ImpDscto'];
           $TotVta=$TotVta+$Detalle['ImpVta'];     
          }
          echo '<tr>';
               echo  '<td colspan="5" align="Right">Totales</td>';
               echo  '<td align="Right">'.number_format($TotComp,2,'.',',').'</td>';
               echo  '<td align="Right">'.number_format($TotDscto,2,'.',',').'</td>';
               echo  '<td align="Right">'.number_format($TotVta,2,'.',',').'</td>';       
          echo '</tr>';
         echo '</table>';
        }
        ?>

       </form>
            <?php include ("Pagina/PiePag.html");?>
  </div> 
    </body>
</html>
