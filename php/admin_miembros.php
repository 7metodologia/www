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

                    <?php #LISTADO AGRUPACION (AGRUPACION)
                        # conexión a la base de datos
                        require('sesion/conectar-bd.php');
                    
                        #AGRUPACION
                        if($_SESSION["tipo_usuario"] == "agrupacion")
                        {
                            include("listar_agrupaciones_agrupacion.php");
                        } 

                        #CULTURA
                        else if ($_SESSION["tipo_usuario"] == "cultura")
                        {
                            echo 'antes';
                            require('listar_agrupaciones_cultura.php');
                            echo 'despues';
                        }
                    
                        
                    
                        mysqli_close ( $conexion_bd );
                    
                    ?>

 
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
        function confirmarEliminar(ci,nombre,apellido,id_agrupacion)
        {
            if(confirm("Seguro que desea eliminar a "+nombre+" "+apellido+" con CI: "+ci))
                window.location="/cultura/php/querys.php?funcion=eliminarMiembro&ci="+ci+
                    "&id_agrupacion="+id_agrupacion;
        }
    </script>

</body>

</html>
