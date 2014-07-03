<?php
    # conexión a la base de datos
    require('conectar-bd.php');

    #AGRUPACION
    if($_POST["tipousuario_radio"] == "agrupacion")
    {
        $query = "SELECT u.Login, c.Nombre, u.Id_Agrupacion FROM usuarios AS u, coordinadores AS c
                    WHERE u.Login = \"".$_POST["usuario_txt"]."\" AND 
                        u.Password = ".$_POST["contrasena_txt"] 
            or die("Error in the consult.." . mysqli_error($conexion_bd));
    
        if ($resultado = mysqli_query($conexion_bd, $query))
        {
            //inicio la sesion
            session_start();
            
            $fila = mysqli_fetch_row($resultado);
            
            //variables de sesion
            $_SESSION["autentificado"] = true;
            $_SESSION["usuario"] = $fila[0];
            $_SESSION["nombre"] = $fila[1];
            $_SESSION["id_agrupacion"] = $fila[2];
            $_SESSION["tipo_usuario"] = "agrupacion";
    
            header("Location: ../admin_miembros.php");
            
            mysqli_free_result($resultado);
        } else header("Location: ../../login.php?error=si");
    
        mysqli_close ( $conexion_bd );
    }




    #CULTURA
    if($_POST["tipousuario_radio"] == "cultura")
    {
        $query = "SELECT Login, Nombre_Coordinador FROM departamento_cultura
                    WHERE Login = \"".$_POST["usuario_txt"]."\" AND 
                        Password = ".$_POST["contrasena_txt"] 
            or die("Error in the consult.." . mysqli_error($conexion_bd));
    
        if ($resultado = mysqli_query($conexion_bd, $query))
        {
            //inicio la sesion
            session_start();
            
            $fila = mysqli_fetch_row($resultado);
            
            //variables de sesion
            $_SESSION["autentificado"] = true;
            $_SESSION["usuario"] = $fila[0];
            $_SESSION["nombre"] = $fila[1];
            
            $_SESSION["tipo_usuario"] = "cultura";
    
            header("Location: ../admin_miembros.php");
            
            mysqli_free_result($resultado);
        } else header("Location: ../../login.php?error=si");
    
        mysqli_close ( $conexion_bd );
    }

    

?>