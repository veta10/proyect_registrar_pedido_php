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
        <?php session_start();
            include("Pagina/Cabecera.html");
            include ("Clases/Libreria.php");
            include ("Clases/AdminPedidos.php");
            $ObjCRUD=new ProcPedido();
            $Fecha= fechaHoy();
            if(isset($_POST["btnRegPedido"])){
                $IdPedido=$ObjCRUD->getMaxIdPedido()+1;
                if( isset($_POST["lstClientes"])){
                    $IdCliente=$_POST["lstClientes"];
                } else {
                    $IdCliente="0000";
                }
                
                if( isset($_POST["lstEmpleado"])){
                    $IdEmpleado=$_POST["lstEmpleado"];
                } else {
                    $IdEmpleado=0;
                    
                 
                }
                 if( isset($_POST["lstTransporte"])){
                    $IdEmpresasTransporte=$_POST["lstTransporte"];
                } else {
                    $IdEmpresasTransporte=0;
                }
                
                
               
                $FechaPedido= fechaDate($Fecha); 
                $FechaEntrega=$FechaPedido;
                $FechaEnvio=$FechaPedido;
                
                $Cargo=0.0;
                $Destinatario=$_POST["txtDestinatario"];
                $DireccionDestinatario=$_POST["txtDireccion"];
                $CiudadDestinatario=$_POST["txtCiudad"];
                $RegionDestinatario=$_POST["txtRegion"]; 
                $CodPostalDestinatario=$_POST["txtCodPostal"];
                $PaisDestinatario=$_POST["txtPais"];;
                $ObjPedido=new Pedido($IdPedido, $IdCliente, $IdEmpleado, $FechaPedido, 
                        $FechaEntrega, $FechaEnvio, $IdEmpresasTransporte, $Cargo, 
                        $Destinatario, $DireccionDestinatario, $CiudadDestinatario, 
                        $RegionDestinatario, $CodPostalDestinatario, $PaisDestinatario);
                
                $ObjCRUD->insertPedido($ObjPedido);
                //Registrar Detalle
             @$size=count((array)$_SESSION['Producto']);
                for($n=0;$size;++$n){
                    $IdProducto=$_SESSION['Id'][$n];
                    $Cantidad=$_SESSION['Cantidad'][$n];
                    $Precio=$_SESSION['Precio'][$n];
                    $Descuento=0.0;
                    $objDetalle=new DetallePedido($IdPedido, $IdProducto, $Precio, $Cantidad, $Descuento);
                    $ObjCRUD->insertDetalle($objDetalle);
                }
                $msg = "Su pedido fue registrado con el Nro.: ".$IdPedido; 
                echo "<script type='text/javascript'>alert('$msg');</script>"; 

            }
        ?>
        <div align="center">
        <table border="1">
            <thead>
                <tr>
                    <th>CLIENTE</th>
                    <th colspan="2">DATOS DEL PEDIDO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td align="center" rowspan="7">
                     <?php include ("Componentes/CompClientes.php"); ?> 
                       
                      <br> 
                      Empleados
                      <br> 
                      
                     <?php include ("Componentes/CompEmpleados.php"); ?>  
                            
                     <br> 
                     Cliente
                      <br> 
                     <?php include ("Componentes/CompTransporte.php"); ?>  
                    </td>

                    <td>Fecha</td>
                    <td><?php echo $Fecha; ?></td>
                </tr>
                <tr>
                    <td>Destinatario</td>
                    <td>
                        <input type="text" name="txtDestinatario" value=" " size="30" />  
                    </td>
                </tr>
                <tr>
                    <td>Direccion</td>
                    <td>
                        <input type="text" name="txtDireccion" value=" " size="30" />
                    </td>
                </tr>
                <tr>
                    <td>Ciudad</td>
                    <td>
                        <input type="text" name="txtCiudad" value=" " size="20" />
                    </td>
                </tr>
                <tr>
                    <td>Region</td>
                    <td>
                        <input type="text" name="txtRegion" value=" " size="15" />
                    </td>
                </tr>
                <tr>
                    <td>Cod. Postal</td>
                    <td>
                        <input type="text" name="txtCodPostal" value=" " size="5" />
                    </td>
                </tr>
                <tr>
                    <td>Pais</td>
                    <td>
                        <input type="text" name="txtPais" value=" " size="15" />
                    </td>
                </tr>
            </tbody>
        </table>
            <input type="submit" value="Registrar Pedido" name="btnRegPedido" />     
        <?php include ("Pagina/PiePag.html");?>
     </div>
    </form>
   </body>
</html>
