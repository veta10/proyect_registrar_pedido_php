<!DOCTYPE html>
<?php 
  $mysqli = new mysqli("containers-us-west-86.railway.app", "root", "9gxJ9ftY9Zk3AKM7S7Cm", "bdneptuno",7510);
  if (mysqli_connect_errno()) {
      echo 'Falló la conexión:'.$mysqli->connect_error;
      exit();
    }
?>
<html>
<head>
  <title>Catalogo de Categorias</title>
  <meta charset=utf-8" />
</head>
<body>  
  <div align="center"> 
    <?php 
//    include("Pagina/Cabecera.html");

    ?>
      ;
        <table border="1" width="50%">
            <thead>
                <?php
                $Cols=3;
                  echo '<th colspan="'.$Cols.'"><h3>Nuestros Productos</h3></th>';
                ?>
            </thead>
        <?php
          $Consulta = $mysqli -> query ("SELECT * FROM categoria");
                   
          $C=0;
          while ($Tabla = mysqli_fetch_array($Consulta)) {
              if($C==0){echo "<tr>";$N=1;}
              echo "<td align=center>";
              echo '<a title="'.$Tabla['NombreCategoria'].
                   '" href="ListarProductos.php?IdCategoria='.$Tabla['IdCategoria'].
                   '&Categoria='.$Tabla['NombreCategoria'].'">'.
                   $Tabla['NombreCategoria'];
              echo '<br>';
              echo '<img Class="zoom" src="Fotos/Categoria'.$Tabla['IdCategoria'].'.jpg" width="160" height="100"/>';
              echo "</a>";
              echo "</td>";
              ++$C;
              if($C==$Cols){echo "</tr>";$C=0;}
        }
        ?>             
      </table>
    <?php 
//    include ("Pagina/PiePag.html");
    ?>
  </div> 
</body>
</html>