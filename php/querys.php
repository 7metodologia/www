<?php
    if(isset($_GET["funcion"]))
        if( $_GET["funcion"] == "eliminarMiembro" )
        {
            # conexión a la base de datos
            require('sesion/conectar-bd.php');
            
            $query = 'DELETE FROM miembros
                        WHERE CI_miembro = '.$_GET["ci"].' AND
                            Id_Agrupacion = '.$_GET["id_agrupacion"]
                or die("Error in the consult.." . mysqli_error($conexion_bd));
            
            if ($resultado = mysqli_query($conexion_bd, $query))
            {
                header('Location: /cultura/php/admin_miembros.php?msj='.urlencode("Eliminado con exito"));
                
                mysqli_free_result($resultado);
            } else echo 'Error';
            
            mysqli_close ( $conexion_bd );
        }


?>