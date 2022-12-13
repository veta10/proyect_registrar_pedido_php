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
        
        <table border="1">
            <thead>
                <tr>
                    <th>Nuestros Productos</th>
                    <th>Ingresar Pedido</th>
                    <th>Buscar Pedido</th>
                    <th>Imprimir Pedido</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <a title="Catalogo de Productos" href="CatalogoFecha.php">
                            <img Class="zoom" src="Fotos/Catalogo.jpg" width="220" height="170" alt="Logo"/>
                        </a>                     
                    </td>                    
                    <td>
                        <a title="Ingrese su Pedido" href="ListarCategorias.php">
                            <img Class="zoom" src="Fotos/Pedidos.jpg" width="220" height="170" alt="Logo"/>
                        </a>                     
                    </td>
                    <td>
                        <a title="Buscar Pedido" href="ConsultaPedido.php">
                            <img Class="zoom" src="Fotos/DocPedido.jpg" width="230" height="170" alt="Logo"/>
                        </a>                    
                    </td>
                    <td>
                        <a title="Imprimir Pedido" href="ImprimirPedido.php">
                            <img Class="zoom" src="Fotos/rptPedido.jpg" width="230" height="170" alt="Logo"/>
                        </a>                        
                    </td>
                </tr>
            </tbody>
        </table>
        <?php include ("Pagina/PiePag.html");?>
       </div> 
    </body>
</html>
