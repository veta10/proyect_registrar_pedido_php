<?php

 echo '<select name="lstEmpleado" size="15">';
          $query = $mysqli -> query ("SELECT * FROM Empleado order by 3");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores["IdEmpleado"].'">'.$valores["Nombre"].'</option>';
          }
        echo '</select>';
        ?>