<?php include("sesion.php"); ?>
Bienvenido:
<?php echo $_SESSION["usuario"]; ?>
<br /><br />
Estas en una pagina segura con sesiones en php
<br /><br />
<a href="salir.php">Salir</a>