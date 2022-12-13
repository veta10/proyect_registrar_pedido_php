<?php
  $mysqli = new mysqli('localhost', 'root', '12345', 'BDNeptuno');
        echo '<select name="lstClientes" size="15">';
          $query = $mysqli -> query ("SELECT * FROM Cliente order by 3");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores["IdCliente"].'">'.$valores["NombreContacto"].'</option>';
          }
        echo '</select>';
        
         
?>


