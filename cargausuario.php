<?php
if (empty($_POST) && $_SESSION['nombre'] == "") {
    header("location: index.php");
} else {
    session_start();
    include("recursos/conexion.php");

    $consul = "SELECT * FROM usuarios WHERE id =". $_POST['id'];
    $resp = mysqli_query($conexion, $consul) or die("<strong> error al cargar usuario</strong>"); 

    $usu = mysqli_fetch_array($resp);

    $json = json_encode($usu);


    echo  $json;
}
    ?>





