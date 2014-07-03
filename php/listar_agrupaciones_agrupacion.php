<?php
    #NOMBRE DE AGRUPACION
    $query = "SELECT Nombre_Agrupacion, Tipo FROM agrupaciones WHERE Id_Agrupacion = ".$_SESSION["id_agrupacion"]
        or die("Error in the consult.." . mysqli_error($conexion_bd));
    
    if ($resultado = mysqli_query($conexion_bd, $query))
    {
        $fila = mysqli_fetch_row($resultado);
        
        echo '<h2>'.$fila[0].' <small>'.$fila[1].'</small></h2>';
    
        mysqli_free_result($resultado);
    }




    #AGREGAR MIEMBRO
    echo '<a href="#"><button class="btn btn-default btn-sm" alt="Nuevo miembro" title="Nuevo miembro" >
            <span class="glyphicon glyphicon-plus"></span></button></a>';
?>



</br>
<table class="table table-striped">
  <thead>
    <tr>
      <th>CI</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Email</th>
      <th>Carrera</th>
      <th>Acción</th>
    </tr>
  </thead>
  <tbody>
      
  <?php #MOSTRAR LISTA DE MIEMBROS
    # conexión a la base de datos
    //require('sesion/conectar-bd.php');
    # Realizamos la conexion a la base de datos                                            
    $conexion_bd = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Error " . mysqli_error($link));

    $query = "SELECT CI_miembro, Nombre, Apellido, Email, Carrera 
                FROM miembros 
                WHERE Id_Agrupacion = ".$_SESSION["id_agrupacion"]
        or die("Error in the consult.." . mysqli_error($conexion_bd));

    if ($resultado = mysqli_query($conexion_bd, $query))
    {   
        while ($fila=mysqli_fetch_row($resultado))
        {
            echo '<tr><td>'.$fila[0].
                    '</td><td>'.$fila[1].
                    '</td><td>'.$fila[2].
                    '</td><td>'.$fila[3].
                    '</td><td>'.$fila[4].'</td>
                    <td><button class="btn btn-default btn-sm" alt="Eliminar" title="Eliminar" onclick="confirmarEliminar('.$fila[0].',\''.$fila[1].'\',\''.$fila[2].'\','.$_SESSION["id_agrupacion"].');">
                            <span class="glyphicon glyphicon-trash"></span></button></td></tr>';
        }
        
        mysqli_free_result($resultado);
    }


  ?>
      
    </tbody>
</table>