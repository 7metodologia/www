<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SICAD</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
        font-family: Tahoma;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 50px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 45px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 3px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
      #logo{
       width: 110spx;
       height: 110px;
}
    </style>

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
            <!--
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav pull-right">
                    <li><a href="#about">About</a>
                    </li>
                    <li><a href="#services">Services</a>
                    </li>
                    <li><a href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            -->
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

                
            
    
    <div class="container">

        <div class="row">
            
            <div class="col-md-8">
                <div class="jumbotron">
                    <img id="logo" src="imagen.png"/>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <h1>BIENVENID@</h1>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p class="lead">Te damos la cordial bienvenida al nuevo  SICAD 5.</p>
                </div>
            </div>
            
            
            <!-- FORMULARIO INICIO DE SESION -->
            
            <div class="col-md-4" style="margin-top:50px">
                <h1>Inicio de sesión</h1></br>
            
                
                
                <form role="form" name="inicio_sesion_post_frm" action="php/sesion/control.php" method="post" enctype="application/x-www-form-urlencoded">
                  <div class="form-group">
                      <input class="form-group" type="radio" id="tipousuario_radio" name="tipousuario_radio" value="cultura" > Cultura<br>
                      <input class="form-group" type="radio" id="tipousuario_radio" name="tipousuario_radio" value="agrupacion" > Agrupaci&oacute;n<br>
                  </div>
                  <div class="form-group">
                    <?php #ERROR USUARIO
                        error_reporting(E_ALL ^ E_NOTICE);
                        if($_GET["error"]=="si")
                            echo '<span style="color:red;">Ingrese su nombre de usuario</span></br>';
                    ?>
                    <label for="usuario">Nombre de usuario</label>
                    <input type="text" class="form-control" id="usuario_txt" name="usuario_txt" placeholder="usuario">
                  </div>
                  <div class="form-group">
                    <?php #ERROR CONTRASEÑA
                        error_reporting(E_ALL ^ E_NOTICE);
                        if($_GET["error"]=="si")
                            echo '<span style="color:red;">Ingrese su contrase&ntilde;a</span></br>';
                    ?>
                    <label for="contrasena">Contraseña</label>
                    <input type="password" class="form-control" id="contrasena_txt" name="contrasena_txt" placeholder="contraseña">
                  </div>
                  <button type="submit" class="btn btn-default" id="ingresar_btn" name="ingresar_btn" value="Ingresar">Ingresar</button>
                  <hr>
                  <small>Si no puede iniciar sesión comuníquese con el CADH
                  </br>
                  </small>
                </form>
                <!-- FORMULARIO INICIO DE SESION -->
        
        
        
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
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>

</html>
