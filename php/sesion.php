<?php
    session_start();

    if(!$_SESSION["autentificado"])
    {
        header("Location: sesion/salir.php");
    }
?>