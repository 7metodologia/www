<?php
$query2 = "SELECT Id_Agrupacion FROM agrupaciones"
    or die("Error in the consult.." . mysqli_error($conexion_bd));

if ($resultado2 = mysqli_query($conexion_bd, $query2))
{
    
    #WHILE NOMBRE AGRUPACION
    while ($id_agrupacion = mysqli_fetch_row($resultado2))
    {
        $query = "SELECT Nombre_Agrupacion, Tipo FROM agrupaciones WHERE Id_Agrupacion = ".$id_agrupacion[0]
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

    
    
    echo '</br>
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
      <tbody>';
          
      #MOSTRAR LISTA DE MIEMBROS
        # conexión a la base de datos
        //require('sesion/conectar-bd.php');
        # Realizamos la conexion a la base de datos                                            
        $conexion_bd = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Error " . mysqli_error($link));
    
        $query3 = "SELECT CI_miembro, Nombre, Apellido, Email, Carrera 
                    FROM miembros 
                    WHERE Id_Agrupacion = ".$id_agrupacion[0]
            or die("Error in the consult.." . mysqli_error($conexion_bd));
    
        if ($resultado3 = mysqli_query($conexion_bd, $query3))
        {   
            while ($fila3 = mysqli_fetch_row($resultado3))
            {
                echo '<tr><td>'.$fila3[0].
                        '</td><td>'.$fila3[1].
                        '</td><td>'.$fila3[2].
                        '</td><td>'.$fila3[3].
                        '</td><td>'.$fila3[4].'</td>
                        <td><button class="btn btn-default btn-sm" alt="Eliminar" title="Eliminar" onclick="confirmarEliminar('.$fila3[0].',\''.$fila3[1].'\',\''.$fila3[2].'\','.$id_agrupacion[0].');">
                                <span class="glyphicon glyphicon-trash"></span></button></td></tr>';
            }
            
            mysqli_free_result($resultado3);
        }
        
        echo '</tbody>
        </table>';

    
    }
}
?>