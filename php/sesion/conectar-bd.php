<?php
    # Este archivo contiene la informaci�n para el acceso a la base de datos
    # El archivo esta establecido para una conexi�n a PostgreSQL 
    
    # Informaci�n de Acceso
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_USER', 'root');
    DEFINE ('DB_PASSWORD', '');
    DEFINE ('DB_NAME', 'sistema_cultura');
    
    # Realizamos la conexi�n a la base de datos                                            
    $conexion_bd = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Error " . mysqli_error($link));
?>