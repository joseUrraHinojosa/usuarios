<?php
session_start();

?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <style>

        body{
            font-family: 'Trebuchet MS', sans-serif;
        }
        table tr td {
            width: 367px;

        }

        table {
            margin-top: 30px;
            background-color:  gainsboro;
        }

        .img {
            text-align: center;
        }

        ul li {
            padding: 5px;
        }

        ul {
            list-style: none;
        }

        h1 {
            text-align: center;

        }

        .contenedor div {
            width: 740px;
            height: auto;

        }
        img{
            margin-top: 40px;
            margin-bottom: 40px;
        }

        #datosUsuPdf{
            margin-top: 80px; 
        }


    </style>
</head>

<body>
    <div class="contenedor">
        <div>
            <h1>Ficha De Usuario</h1>
        </div>
        <table>

            <tr>
                <td id="imgUsuarioPdf" class="img"><img src="<?php echo  $_SESSION['fotoPlantilla']; ?>" alt="img"></td>
                <td>
                    <ul id="datosUsuPdf">
                        <li>
                            <h2><?php echo  $_SESSION['nombrePlantilla']; ?></h2>
                        </li>
                        <li><strong>Correo: </strong><?php echo  $_SESSION['correoPlantilla']; ?></li>
                        <li><strong>Rut: </strong><?php echo  $_SESSION['rutPlantilla']; ?></li>
                        <li><strong>Dirección: </strong><?php echo  $_SESSION['telefonoPlantilla']; ?></li>
                        <li><strong>Teléfono: </strong><?php echo  $_SESSION['direccionPlantilla']; ?></li>

                    </ul>
                </td>
            </tr>
        </table>

    </div>

    

</body>


</html>