<?php

session_start();
if ($_SESSION['nombre'] == "") {
  header("location: index.php");
}else{
    include('recursos/conexion.php');
    @$idUsu = $_POST['idModal'];
    ;
    
    $consul = "SELECT * FROM usuarios WHERE id =".@$idUsu;
    $resp = mysqli_query($conexion, $consul) or die("<strong> error al cargar usuario dede pdf</strong>"); 
    $usu = mysqli_fetch_array($resp);
    $_SESSION['nombrePlantilla']= $usu['nombre']." ".$usu['apellido'];
    $_SESSION['correoPlantilla']= $usu['correo'];
    $_SESSION['rutPlantilla']= $usu['rut'];
    $_SESSION['telefonoPlantilla']= $usu['telefono'];
    $_SESSION['direccionPlantilla']= $usu['direccion'];
    $_SESSION['fotoPlantilla']= "img_usuarios/".$usu['fotografia'];
    
}

 require __DIR__ . '/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
 


  ob_start();
require_once('plantillausuariopdf.php');


$html = ob_get_clean();	 
$html2pdf = new Html2Pdf( 'p', 'A4', 'es', 'true', 'UTF-8' );
$html2pdf ->writeHTML($html);

$html2pdf->output(  $_SESSION['nombrePlantilla']= $usu['nombre'].$usu['apellido'].".pdf" ); 

?>