<?php
 session_start();
if ($_SESSION['nombre'] == "" ) {
    header("location: index.php");
} else {
    
   
       
        include("recursos/conexion.php");
        
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $rut = $_POST['rut'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $id = $_POST['idEditar'];
        //$foto = $_POST['foto'];

    
  
       // editar usuario
       //$consul = "CALL actualizaUsu('".$nombre."','".$apellido."','".$correo."','".$rut."',".$telefono.",'".$direccion."',".$id.")";
       $consul ="UPDATE usuarios SET  nombre ='".$nombre."', apellido ='".$apellido."', correo ='".$correo."', rut ='".$rut."', telefono =".$telefono.", direccion ='".$direccion."' WHERE id =".$id."";
       $resp = mysqli_query($conexion, $consul) or die("<strong>ERROR editar</strong>");

       if($resp == true){
           echo "editar ok";
       }else{
           echo "editar error";
       }
    
}


?>