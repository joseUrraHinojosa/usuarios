<?php
//valida que llegue datos post
if(empty($_POST)){
    header("location: index.php");
}else{
include("recursos/conexion.php");
session_start();
$usu = $_POST['usuario'];
$pass = $_POST['password'];

$accede ="no registra";

//consulta usuario y clave
$consul = "SELECT nombre, usuario, passw FROM user WHERE usuario = '" . $usu . "'";
$resp = mysqli_query($conexion, $consul);

// echo json_encode($fila) ;


if (mysqli_num_rows($resp) > 0) {
    $fila = mysqli_fetch_array($resp);

    // while($fila){
    if (password_verify($pass, $fila['passw'])) {

        $_SESSION['nombre'] = $fila['nombre'];
        $accede ="registro ok";
        
    }
}
 
echo  $accede;
}