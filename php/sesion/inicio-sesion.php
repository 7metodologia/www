<form name="inicio_sesion_post_frm" action="control.php" method="post" enctype="application/x-www-form-urlencoded">
    <?php
        error_reporting(E_ALL ^ E_NOTICE);
        if($_GET["error"]=="si")
        {
            echo "<span>Verificar datos</span>";
        }else
        {
            echo "<span>Introduce tus datos</span>";
        }
    ?>
    <br /><br />
    C&eacute;dula de identidad:
    <input type="number" name="cedula_num" />
    <br /><br />
    Contrase&ntilde;a:
    <input type="password" name="contrasena_txt" />
    <br /><br />
    <input type="hidden" name="" />
    <input type="submit" id="iniciar_btn" name="iniciar_btn" value="Iniciar" onclick="validarDatos()" />
</form>

<?php
?>