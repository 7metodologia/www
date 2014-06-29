<?php include("sesion.php"); ?>
<?php include("msjs.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SICAD</title>

    <!-- Bootstrap core CSS -->
    <link href="/cultura/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="/cultura/css/shop-homepage.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#home">SICAD</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav pull-right">

                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hola, 
                          <?php echo $_SESSION["nombre"]; ?> 
                          <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="/cultura/php/sesion/salir.php">Cerrar sesión</a></li>
                        <li><a href="#">Editar perfil</a></li>
                      </ul>
                    </li>

                </ul>
            </div>

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">

            <div class="col-md-3">


                
                 <div class="list-group">
                    <a href="/cultura/php/admin_miembros.php" class="list-group-item active">Administrar miembros</a>
                    <a href="/cultura/php/descripcion.html" class="list-group-item">Descripción</a>
                    
                    <a href="/cultura/php/reportes.html" class="list-group-item">Reportes</a>
                    <a href="/cultura/php/solicitudes.html" class="list-group-item">Solicitudes</a>
                    
                </div>
        


            </div>




            <div class="col-md-9">

                
                    
                <div class="row">

                    <div class="panel panel-default" id="panel_gris">
                      

                      <div class="panel-body">

                        <!-- Filtros de búsqueda -->
                        <p>Filtrar por agrupación:</p>
                        <p>Filtrar por agrupación:</p>
                        <p>Filtrar por agrupación:</p>

                        <!-- Filtros de búsqueda -->

                    </div>
                </div>     

                    <?php #NOMBRE DE AGRUPACION
                        # conexión a la base de datos
                        require('sesion/conectar-bd.php');
                    
                        $query = "SELECT Nombre_Agrupacion, Tipo FROM agrupaciones WHERE Id_Agrupacion = ".$_SESSION["id_agrupacion"]
                            or die("Error in the consult.." . mysqli_error($conexion_bd));
                    
                        if ($resultado = mysqli_query($conexion_bd, $query))
                        {
                            $fila = mysqli_fetch_row($resultado);
                            
                            echo '<h2>'.$fila[0].' <small>'.$fila[1].'</small></h2>';

                            mysqli_free_result($resultado);
                        }
                    
                        mysqli_close ( $conexion_bd );
                    
                    ?>
                    
                    <?php #AGREGAR MIEMBRO
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
                            # Realizamos la conexi�n a la base de datos                                            
                            $conexion_bd = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Error " . mysqli_error($link));
                        
                            $query = "SELECT CI_miembro, Nombre, Apellido, Email, Carrera 
                                        FROM miembros 
                                        WHERE Id_Agrupacion = ".$_SESSION["id_agrupacion"]
                                or die("Error in the consult.." . mysqli_error($conexion_bd));
                        
                            if ($resultado = mysqli_query($conexion_bd, $query))
                            {
                                //$fila = mysqli_fetch_array($resultado);
                                
                                while ($fila=mysqli_fetch_row($resultado))
                                {
                                    echo '<tr><td>'.$fila[0].
                                            '</td><td>'.$fila[1].
                                            '</td><td>'.$fila[2].
                                            '</td><td>'.$fila[3].
                                            '</td><td>'.$fila[4].'</td>
                                            <td><button class="btn btn-default btn-sm" alt="Eliminar" title="Eliminar" onclick="confirmarEliminar('.$fila[0].',\''.$fila[1].'\',\''.$fila[2].'\');">
                                                    <span class="glyphicon glyphicon-trash"></span></button></td></tr>';
                                }
                                
                                mysqli_free_result($resultado);
                            }
                        
                            mysqli_close ( $conexion_bd );
                        
                          ?>
                          
                      </tbody>
                    </table> 

 
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <footer>
            <div class="row">
                <div class="col-xs-8">
                    <p>Proyecto de Metodología del Software </br>UCAB Guayana
                    </p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
    <!-- JavaScript -->
    <script src="/cultura/js/jquery-1.10.2.js"></script>
    <script src="/cultura/js/bootstrap.js"></script>
    <script>
        function confirmarEliminar(ci,nombre,apellido)
        {
            if(confirm("Seguro que desea eliminar a "+nombre+" "+apellido+" con CI: "+ci))
                window.location="/cultura/php/querys.php?funcion=eliminarMiembro&ci="+ci+
                    "&id_agrupacion="+"<?php echo $_SESSION["id_agrupacion"] ?>";
        }
    </script>

</body>

</html>
