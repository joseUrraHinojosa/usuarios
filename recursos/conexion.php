<?php

    $servidor ="localhost";
    $usuario ="root";
    $password ="";
    $bdatos ="bd_usuarios";

    $conexion = mysqli_connect($servidor,$usuario,$password) or die("<strong>NO SE HA PODIDO ESTABLECER CONEXION CON EL SERVIDOR</strong>");
    mysqli_set_charset($conexion,"utf8");
    $db = mysqli_select_db($conexion,$bdatos) or die("<strong> NO SE HA PODIDO ESTABLECER CONEXION CON LA BASE DE DATOS</strong>");


?>
