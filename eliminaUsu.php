<?php

session_start();
if ($_SESSION['nombre'] == "") {
  header("location: index.php");
}else{

    include('recursos/conexion.php');
    $idElimina = $_POST['idElimina'];

    $consul = "SELECT fotografia  FROM usuarios WHERE id =".$idElimina;
    $resp = mysqli_query($conexion, $consul); 
    $fila = mysqli_fetch_assoc($resp);
    

    $consul2 = "DELETE  FROM usuarios WHERE id =".$idElimina;
    $resp2 = mysqli_query($conexion, $consul2) or die("<strong> error eliminar usu</strong>"); 

    if($resp2){

        if (file_exists("img_usuarios/".$fila['fotografia'])) {
          unlink("img_usuarios/".$fila['fotografia']);
           
        }
        
        echo 'eliminado';
    }else{
        echo 'error';
    }

}



?>