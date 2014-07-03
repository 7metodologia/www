<?php include("header.php") ?>

    <div class="container">


        <ul class="nav nav-tabs">
          
          <li><a href="/metodologiatemplate/admin_miembros.php">Administrar miembros</a></li>
          <li><a href="/metodologiatemplate/descripcion.php">Descripción</a></li>
          <li><a href="/metodologiatemplate/reportes.php">Reportes</a></li>
          <li class="active"><a href="/metodologiatemplate/solicitudes.php">Solicitudes</a></li>
        </ul>

        <br>

        <div class="row">

<!--             <div class="col-md-3">
                 <div class="list-group">
                    <a href="/metodologiatemplate/admin_miembros.html" class="list-group-item ">Administrar miembros</a>
                    <a href="/metodologiatemplate/descripcion.html" class="list-group-item active">Descripción</a>
                    <a href="/metodologiatemplate/reportes.html" class="list-group-item">Reportes</a>
                    <a href="/metodologiatemplate/solicitudes.html" class="list-group-item">Solicitudes</a>
                    
                </div>
            </div> -->

            <div class="col-md-12">

                
                    
                <div class="row">

                        <hr>
                        <h3>Añadir nueva solicitud</h3>
                        <form role="form">
                          <div class="form-group">
                            <label for="nombre_solicitud">Introduzca el título del formulario</label>
                            <input type="text" class="form-control" id="nombre_solicitud" placeholder="Introduzca el nombre de la solicitud">                            
                          </div>


                          <div class="form-group">
                            <label for="archivo_solicitud">Archivo solicitud</label>
                            <input type="file" id="archivo_solicitud">                            
                          </div>
                           

                        <hr>   
                        <h3>Seleccione las agrupaciones que recibirán este formulario</h3>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" value="">
                            {{agrupacion 1}}
                          </label>                        
                        </div>

                        <div class="checkbox">
                          <label>
                            <input type="checkbox" value="">
                            {{agrupacion 1}}
                          </label>                        
                        </div>

                        <div class="checkbox">
                          <label>
                            <input type="checkbox" value="">
                            {{agrupacion 1}}
                          </label>                        
                        </div>


                          <button type="submit" class="btn btn-default">Enviar solicitud</button>
                        </form>
 

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

<?php include("footer.php"); ?>
