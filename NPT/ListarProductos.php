<!DOCTYPE html>
<html>
<head>
  <title>Catalogo de Productos</title>
  <meta charset=utf-8" />

</head>
<?php session_start();
// Verificamos la conexión con el servidor y la base de datos
  $mysqli = new mysqli('localhost', 'root', '12345', 'BDNeptuno');
  if(!isset($_SESSION['Id'])){
     $_SESSION['Id']=array(); 
     $_SESSION['Producto']=array();
     $_SESSION['Descripcion']=array();
     $_SESSION['Cantidad']=array();
     $_SESSION['Precio']=array(); 
  }
  $Id=array();
  $Producto=array();
  $Descripcion=array();
  $Cantidad=array();
  $Precio=array();
?>
<body>
<form action="" method="POST">  
  <div align="center"> 
    <?php include ("Pagina/Cabecera.html");?>
      <h3>CATALOGO DE PRODUCTOS :<?php echo $_GET["Categoria"]; ?></h3> 
        <table border="1" width="75%">
            <thead>
                <th>ID</th>
                <th>PRODUCTO</th>
                <th>PRESENTACION</th>
                <th>PRECIO</th>
                <th>EXISTENCIA</th>
                <th>PEDIDO</th>
            </thead>
        <?php
          $query = $mysqli -> query ("SELECT * FROM PRODUCTO WHERE IDCATEGORIA=".$_GET["IdCategoria"]);
          $n=0;
          while ($valores = mysqli_fetch_array($query)) {
            echo "<tr>";
              echo "<td>".$valores['IdProducto']."</td>";
              echo "<td>".$valores['NombreProducto']."</td>";
              echo "<td>".$valores['CantidadPorUnidad']."</td>";
              echo "<td>".$valores['PrecioUnidad']."</td>";
              echo "<td>".$valores['UnidadesEnExistencia']."</td>";
              echo "<td><input type = 'text' name = 'txtCantidad".$n."' value = '0' size = '5' /></td>";
              echo "</tr>";
              array_push($Id, $valores['IdProducto']);
              array_push($Producto, $valores['NombreProducto']);
              array_push($Descripcion, $valores['CantidadPorUnidad']);
              array_push($Cantidad, $valores['0']);
              array_push($Precio, $valores['PrecioUnidad']);
              ++$n;
          }
        if(isset($_POST["btnPedido"])){
        $p=0;
        while($p<$n){
            $txt="txtCantidad".$p;
            $CantPed=$_POST[$txt];
            if($CantPed>0){
                $_SESSION['Id'][]=$Id[$p];
                $_SESSION['Producto'][]=$Producto[$p];
                $_SESSION['Descripcion'][]=$Descripcion[$p];
                $_SESSION['Cantidad'][]=$CantPed;
                $_SESSION['Precio'][]=$Precio[$p];
            }
          ++$p;
        }
        header("Location: Pedido.php");
        }
        ?>
      </table>
      <input type="submit" value="Añadir al Pedido" name="btnPedido" />
    <?php include ("Pagina/PiePag.html");?>
  </div> 
 </form>
</body>
</html>