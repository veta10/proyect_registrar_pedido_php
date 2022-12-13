<?php

echo '<select name="lstTransporte" size="15">';
          $query = $mysqli -> query ("SELECT * FROM EmpresasTransporte order by 3");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores["IdTransporte"].'">'.$valores["NombreEmpresa"].'</option>';
          }
        echo '</select>';
        ?>
