<?php
session_start();
if ($_SESSION['nombre'] == "") {
  header("location: index.php");
}

if ($_POST["cargatabla"] == "cargatabla") {
  include('recursos/conexion.php');

?>

  <div class="row ">
    <div class="col-lg-12">
      <div class="table-responsive p-1  mt-1 mb-4">
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
              <th class="bg-primary">Foto</th>
              <th class="bg-primary">Acciones</th>
            </tr>
          </thead>
          <tbody>

            <?php
           // $consul = "CALL traeusuarios()";
            $consul = "SELECT * FROM usuarios";
            $resp = mysqli_query($conexion, $consul) or die("<strong> error al cargar tabla usuarios</strong>");

            while ($fila = mysqli_fetch_array($resp)) { ?>
              <tr>
                <td><?php echo $fila['id'] ?></td>
                <td><?php echo $fila['nombre'] ?></td>
                <td><?php echo $fila['apellido'] ?></td>
                <td><?php echo $fila['correo'] ?></td>
                <td><?php

                    $rut = substr($fila['rut'], 4, strlen($fila['rut']));

                    echo "XXXX" . $rut ?></td>
                <td><?php echo $fila['telefono'] ?></td>
                <td><?php echo $fila['direccion'] ?></td>
                <td><?php echo $fila['fotografia'] ?></td>
                <td class="" style="min-width: 106px;">

                  <button class="btn btn-sm btn-secondary  " data-bs-toggle="modal" href="#modal_usuario"><i class="fas fa-eye"></i></button>
                  <button class="btn btn-sm btn-primary " data-bs-toggle="modal" href="#modal_usuarioEditar"><i class="far fa-edit"></i></button>
                  <button class="btn btn-sm btn-danger btnEliminar "><i class="fas fa-trash"></i></button>

                </td>

              </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="dataTable/datatables.min.js"></script>
  <script src="dataTable/table.js"></script>
  <script>
    //evento click para recuperar id y mostra datos de usuario seleccionado boton ver
    $(document).ready(function() {

      var table = $('#example').DataTable();
      var id = "";
      $('#example tbody').on('click', 'tr', function() {

            //limpia modal antes de cargar nuevos datos
            $("#idModal").val("");
            $("#nombreModal").html("");
            $("#correoModal").html("");
            $("#rutModal").html("");
            $("#telefonoModal").html("");
            $("#direccionModal").html("");
            $("#fotoModal").attr("src", "");

        var data = table.row(this).data();
        id = data[0];

        $("#id").val(id);
        $.ajax({
          type: 'POST',
          url: 'cargausuario.php',
          data: {
            'id': id
          },

          success: function(response) {
            const datos = JSON.parse(response);

            //carga modal ver usuario
            $("#idModal").val(datos.id);
            $("#nombreModal").html(datos.nombre + " " + datos.apellido);
            $("#correoModal").html("<strong>Correo: </strong> " + datos.correo);
            $("#rutModal").html("<strong>Rut: </strong> " + datos.rut);
            $("#telefonoModal").html("<strong>Teléfono: </strong> " + datos.telefono);
            $("#direccionModal").html("<strong>Dirección: </strong> " + datos.direccion);
            $("#fotoModal").attr("src", "img_usuarios/"+datos.fotografia);

            //carga modal editar usuario
            $("#idEditar").val(datos.id);
            $("#nombreEditar").val(datos.nombre);
            $("#apellidoEditar").val(datos.apellido);
            $("#correoEditar").val( datos.correo);
            $("#rutEditar").val(datos.rut);
            $("#telefonoEditar").val(datos.telefono);
            $("#direccionEditar").val(datos.direccion);
           
          }

        });
      });




      //Elimiar usuario desde tabla boton eliminar
      $(".btnEliminar").click(function() {
        Swal.fire({
          title: 'Eliminar usuario',
          text: "¿Desea realmente eliminar a este usuario?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#0275d8',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Eliminar'
        }).then((result) => {
          if (result.isConfirmed) {

            $.ajax({
              type: 'POST',
              url: 'eliminaUsu.php',
              data: {
                'idElimina': id
              },
              success: function(response) {
                if(response ="eliminado"){
                    cargatabla();
                }
            

              }

            });

          }
        })


      })

    })


    function cargatabla() {
                  $.ajax({
                    type: 'POST',
                    url: 'cargatabla.php',
                    data: {
                      'cargatabla': "cargatabla"
                    },
                    success: function(html) {

                      $("#carga_datatable").html(html).show();
                    }

                  });
                }

  </script>
<?php } ?>