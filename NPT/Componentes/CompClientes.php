<?php
  $mysqli = new mysqli('containers-us-west-86.railway.app', 'root', '9gxJ9ftY9Zk3AKM7S7Cm', 'bdneptuno', 7510);
        echo '<select name="lstClientes" size="15">';
          $query = $mysqli -> query ("SELECT * FROM Cliente order by 3");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores["IdCliente"].'">'.$valores["NombreContacto"].'</option>';
          }
        echo '</select>';
        
         
?>


