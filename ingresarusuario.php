<?php
if (empty($_POST) && $_SESSION['nombre'] == "") {
    header("location: index.php");
} else {
    session_start();
    include("recursos/conexion.php");
    
         $nombre = $_POST['nombre'];
         $apellido = $_POST['apellido'];
         $correo = $_POST['correo'];
         $rut = $_POST['rut'];
         $telefono = $_POST['telefono'];
         $direccion = $_POST['direccion'];
         //$foto = $_POST['foto'];

         $ruta ="";
         if (is_array($_FILES) && count($_FILES) > 0) {
            if (($_FILES["file"]["type"] == "image/pjpeg")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/png")) {

                $ruta = "img_usuarios/".$_FILES['file']['name'];
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $ruta)) {
                   
                } 
            }
     
        } 
   
        // insert usuarios
       
         //$consul = "CALL ingresarusu('" . $nombre . "', '" . $apellido . "', '" . $correo . "', '" . $rut . "', '" . $telefono . "', '" . $direccion . "', '".$_FILES['file']['name']."')";
        $consul = "INSERT INTO usuarios(nombre, apellido, correo, rut, telefono, direccion, fotografia)  VALUES('" . $nombre . "', '" . $apellido . "', '" . $correo . "', '" . $rut . "', '" . $telefono . "', '" . $direccion . "', '".$_FILES['file']['name']."')";
        $resp = mysqli_query($conexion, $consul) or die("<strong>ERROR insert</strong>");

        if($resp == true){
            echo "insert ok";
        }else{
            echo "insert error";
        }
  
    
}
