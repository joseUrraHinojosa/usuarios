<?php
header("Content-type: application/xls");
header("Content-Disposition: attachment; filename = listausuarios.xls");
include('recursos/conexion.php')
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <table id="example" class="table table-sm table-hover  table-bordered mt-4" style="width: 100%; font-size:14px">
<thead class="text-white">
  <tr>
    <th class="bg-primary">Id</th>
    <th class="bg-primary">Nombre</th>
    <th class="bg-primary">Apellido</th>
    <th class="bg-primary">Correo</th>
    <th class="bg-primary">Rut</th>
    <th class="bg-primary">Teléfono</th>
    <th class="bg-primary">Dirección</th>
    <th class="bg-primary">Fotograía</th>
   
  </tr>
</thead>
<tbody>

  <?php
  $consul = "CALL traeusuarios()";
  $resp = mysqli_query($conexion, $consul) or die("<strong> error al cargar tabla usuarios</strong>");

  while ($fila = mysqli_fetch_array($resp)) { ?>
    <tr>
      <td><?php echo $fila['id'] ?></td>
      <td><?php echo $fila['nombre'] ?></td>
      <td><?php echo $fila['apellido'] ?></td>
      <td><?php echo $fila['correo'] ?></td>
      <td><?php echo $fila['rut'] ?></td>
      <td><?php echo $fila['telefono'] ?></td>
      <td><?php echo $fila['direccion'] ?></td>
      <td><?php echo $fila['fotografia'] ?></td>


    </tr>
  <?php } ?>

</tbody>
</table>
</body>
</html>


