<?php
session_start();
if ($_SESSION['nombre'] == "") {
  header("location: index.php");
}

include('templates/header.php');

?>

<!-- inicio navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">US</a>
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">


      <div style="margin-left:auto">
        <ul class="navbar-nav ml-auto ms-md-0 me-3 me-lg-4">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#!"><i class="fas fa-user"></i> <?php echo $_SESSION['nombre'] ?></a></li>

              <li>
                <hr class="dropdown-divider" />
              </li>
              <li><a class="dropdown-item" href="cerrarsesion.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
            </ul>
      </div>
    </div>

  </div>

</nav>
<!-- fin navbar -->

<div class="p-3">
  <a href="excel.php" class="btn btn-success btn-md float-end" style="margin-right: 14px;"><i class="fas fa-file-excel"></i></a>
</div>

<div class="container-fluid  ml-5 mr-5">

  <nav class="">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Registro de usuarios</button>
      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Ingresar usuario</button>
    </div>
  </nav>
  <div class="tab-content m-2" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

      <!-- data table usuarios -->
      <div id="carga_datatable" class=" pl-1 pr-1 mt-2" style="font-size: 14px;">


      </div>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

      <!--  Formulario ingreso de usuarios -->
      <form id="form_usuario" class="row g-3  mt-4 p-2">
        <div class="col-md-4">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" tabindex="1" required>
          <div class="invalid-nombre text-danger">

          </div>

        </div>
        <div class="col-md-4">
          <label for="apellido" class="form-label">Apellido</label>
          <input type="text" class="form-control" id="apellido" name="apellido" tabindex="2" required>
          <div class="invalid-apellido text-danger">

          </div>
        </div>

        <div class="col-md-4">
          <label for="correo" class="form-label">Correo</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="email" class="form-control" id="correo" name="correo" aria-describedby="inputGroupPrepend" tabindex="3" required>
          </div>
          <div class="invalid-correo text-danger ">

          </div>
        </div>


        <div class="col-md-4">
          <label for="rut" class="form-label">Rut</label>
          <input type="text" class="form-control" id="rut" name="rut" tabindex="4" required>
          <div class="invalid-rut text-danger">

          </div>
        </div>

        <div class="col-md-4">
          <label for="telefono" class="form-label">Teléfono</label>
          <input type="number" class="form-control" id="telefono" name="telefono" tabindex="5" required>
          <div class="invalid-telefono text-danger">

          </div>
        </div>

        <div class="col-md-4">
          <label for="direccion" class="form-label">Dirección</label>
          <input type="text" class="form-control" id="direccion" name="direccion" tabindex="6" required>
          <div class="invalid-direccion text-danger">

          </div>
        </div>

        <div class="col-md-6">
          <label for="foto" class="form-label">Fotogrfia</label>
          <input type="file" class="form-control" aria-label="file example" accept="pjpeg, .jpeg,.jpg, .png" id="foto" name="foto" tabindex="7" required >
          <div class="invalid-foto text-danger">

          </div>
          <small>*Fotograía solo en formato jpeg, jpg, png</small>
        </div>


        <div class="col-12">
          <button id="btn_registrar" name="btn_registrar" class="btn btn-primary" type="button">Guardar </button>
        </div>
      </form>
      <!-- Fin formulario ingreso de usuarios -->
    </div>

  </div>



</div>

<!-- modal ver usuario-->
<div class="modal fade " id="modal_usuario" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="p-4">
        <button type="button" class="btn-close float-end " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body row justify-content-center">

        <div class=" w-100 ">
          <div class=" row">
            <div class="col-md-5 text-center">
              <img id="fotoModal" src="" class="" alt="IMG Perfil" style="max-width: 200px; max-height: 300px;">
            </div>
            <div class="col-md-7 align-items-center">

              <h4 id="nombreModal" class="card-title mt-5"></h4>
              <div id="correoModal"></div>
              <div id="rutModal"></div>
              <div id="telefonoModal"></div>
              <div id="direccionModal"></div>

            </div>

          </div>
        </div>

      </div>
      <div class="modal-footer">

        <!--  Se recupera id para recuperare datos de usuario para carlos en el pdf -->
        <form action="usuariopdf.php" method="POST" target="_blank">
          <input id="idModal" name="idModal" type="text" hidden>
          <button id="btn_pdfmodal" type="submit" class="btn btn-primary"><i class="fas fa-file-pdf"></i></button>
        </form>

      </div>
    </div>
  </div>

</div>
<!-- fin modal ver usuario-->


<!-- modal editar usuario -->
<div class="modal fade " id="modal_usuarioEditar" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body row justify-content-center">

        <div class=" w-100 ">
          <div class=" row ">
            <div class="col-md-12 ">
              <form id="form_usuarioEditar" class="row g-3 p-4  ">
                
                <div class="col-md-4">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="nombreEditar" name="nombreEditar" tabindex="1" >
                  <div class="invalid-nombreE text-danger">

                  </div>

                </div>
                <div class="col-md-4">
                  <label for="apellido" class="form-label">Apellido</label>
                  <input type="text" class="form-control" id="apellidoEditar" name="apellidoEditar" tabindex="2">
                  <div class="invalid-apellidoE text-danger">

                  </div>
                </div>

                <div class="col-md-4">
                  <label for="correo" class="form-label">Correo</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="email" class="form-control" id="correoEditar" name="correoEditar" aria-describedby="inputGroupPrepend" tabindex="3" >
                  </div>
                  <div class="invalid-correoE text-danger ">

                  </div>
                </div>


                <div class="col-md-4">
                  <label for="rut" class="form-label">Rut</label>
                  <input type="text" class="form-control" id="rutEditar" name="rutEditar" tabindex="4" placeholder="formato: 11111111-1">
                  <div class="invalid-rutE text-danger">

                  </div>
                </div>

                <div class="col-md-4">
                  <label for="telefono" class="form-label">Teléfono</label>
                  <input type="number" class="form-control" id="telefonoEditar" name="telefonoEditar" tabindex="5" >
                  <div class="invalid-telefonoE text-danger">

                  </div>
                </div>

                <div class="col-md-4">
                  <label for="direccion" class="form-label">Dirección</label>
                  <input type="text" class="form-control" id="direccionEditar" name="direccionEditar" tabindex="6" >
                  <div class="invalid-direccionE text-danger">

                  </div>
                </div>

                
               

            </div>

          </div>
        </div>

      </div>
      <div class="modal-footer mt-5">
         <input id="idEditar" name="idEditar" type="text" hidden >
        <button id="btn_editar" name="btn_editar" type="button" class="btn btn-primary">Editar</button>
      </div>
      </form>
    </div>
  </div>

</div>
<!-- fin modal editar -->


<script>
  $(document).ready(function(){
     $("#cargaFoto").css("display","none");
  })

  $("#cambiarImg").click(function(){
    $("#cargaFoto").css("display","block");
  })
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function(form) {
        form.addEventListener('submit', function(event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()
</script>