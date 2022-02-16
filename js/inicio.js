//validaciones formulario registro de usuario
$(document).ready(function () {

    cargatabla();
    let nom_valido = false;
    let apellido_valido = false;
    let correo_valido = false;
    let rut_valido = false;
    let telefono_valido = false;
    let direccion_valido = false;
    let foto_valido = false;

    let msj_nom = "";
    let msj_apellido = "";
    let msj_correo = "";
    let msj_rut = "";
    let msj_telefono = "";
    let msj_direccion = "";
    let msj_foto = "";

    //validación campos con keyup
    //keyup input nombre
    $("#nombre").keyup(function () {
        nom_valido = false;

        $("#nombre").removeClass("is-invalid");
        if ($("#nombre").val() == "") {
            msj_nom = "Debe ingresar un nombre";
            $("#nombre").addClass("is-invalid");
            $(".invalid-nombre").html("<small>" + msj_nom + "</small>");


        } else if ($("#nombre").val().length < 2 && $("#nombre").val().length > 0) {
            msj_nom = "Nombre debe contener más de 1 caracteres";
            $("#nombre").addClass("is-invalid");
            $(".invalid-nombre").html("<small>" + msj_nom + "</small>");

        } else if ($("#nombre").val().length > 20) {
            msj_nom = "Nombre no puede exceder 20 caracteres";
            $("#nombre").addClass("is-invalid");
            $(".invalid-nombre").html("<small>" + msj_nom + "</small>");

        } else {
            msj_nom = "";
            $("#nombre").addClass("is-valid");
            $(".invalid-nombre").html("<small>" + msj_nom + "</small>");
            nom_valido = true;
        }

    });

    // keyup input apellido
    $("#apellido").keyup(function () {

        apellido_valido = false;
        $("#apellido").removeClass("is-invalid");
        if ($("#apellido").val() == "") {
            msj_apellido = "Debe ingresar apellido";
            $("#apellido").addClass("is-invalid");
            $(".invalid-apellido").html("<small>" + msj_apellido + "</small>");


        } else if ($("#apellido").val().length < 2 && $("#apellido").val().length > 0) {
            msj_apellido = "Apellido debe contener más de 1 caracteres";
            $("#apellido").addClass("is-invalid");
            $(".invalid-apellido").html("<small>" + msj_apellido + "</small>");

        } else if ($("#apellido").val().length > 20) {
            msj_apellido = "Apellido no puede exceder 20 caracteres";
            $("#apellido").addClass("is-invalid");
            $(".invalid-apellido").html("<small>" + msj_apellido + "</small>");

        } else {
            msj_apellido = "";
            $("#apellido").addClass("is-valid");
            $(".invalid-apellido").html("<small>" + msj_apellido + "</small>");
            apellido_valido = true;
        }

    });

    //keyup input correo
    $("#correo").keyup(function () {

        correo_valido = false;
        $("#correo").removeClass("is-invalid");
        if ($("#correo").val() == "") {
            msj_correo = "Debe ingresar un correo";
            $("#correo").addClass("is-invalid");
            $(".invalid-correo").html("<small>" + msj_correo + "</small>");

        } else if (validaCorreo($("#correo").val()) == false) {
            msj_correo = "Correo inválido";
            $("#correo").addClass("is-invalid");
            $(".invalid-correo").html("<small>" + msj_correo + "</small>");

        } else {
            msj_correo = "";
            $("#correo").addClass("is-valid");
            $(".invalid-correo").html("<small>" + msj_correo + "</small>");
            correo_valido = true;
        }

    });

    //keyup input rut
    $("#rut").keyup(function () {

        msj_rut="Formato: 11111111-1" ;
        $("#rut").addClass("is-invalid");
        $(".invalid-rut").html("<small>" + msj_rut + "</small>");
        if($("#rut").val()==""){
           msj_rut="Debe ingresar un rut" ;
           $("#rut").addClass("is-invalid");
           $(".invalid-rut").html("<small>" + msj_rut + "</small>");

        }else if(rut_valido = valRun($("#rut").val())==false){

            //rut invalido
        }else{
            msj_rut="" ;
            $("#rut").removeClass("is-invalid");
            $("#rut").addClass("is-valid");
            $(".invalid-rut").html("<small>" + msj_rut + "</small>");
            rut_valido =true;
        }
        

    });


    //keyup input teléfono
    $("#telefono").keyup(function () {
        telefono_valido = false;

        $("#telefono").removeClass("is-invalid");
        if ($("#telefono").val() == "") {
            msj_telefono = "Debe ingresar un teléfono";
            $("#telefono").addClass("is-invalid");
            $(".invalid-telefono").html("<small>" + msj_telefono + "</small>");


        } else if ($("#telefono").val().length < 8 || $("#telefono").val().length > 8) {
            msj_telefono = "Debe ingresar 8 dígitos";
            $("#telefono").addClass("is-invalid");
            $(".invalid-telefono").html("<small>" + msj_telefono + "</small>");

        } else {
            msj_telefono = "";
            $("#telefono").addClass("is-valid");
            $(".invalid-telefono").html("<small>" + msj_telefono + "</small>");
            telefono_valido = true;

        }
    });

    // keyup input dirección
    $("#direccion").keyup(function () {

        direccion_valido = false;
        $("#direccion").removeClass("is-invalid");
        if ($("#direccion").val() == "") {
            msj_direccion = "Debe ingresar una dirección";
            $("#direccion").addClass("is-invalid");
            $(".invalid-direccion").html("<small>" + msj_direccion + "</small>");


        } else if ($("#direccion").val().length > 50) {
            msj_direccion = "Dirección no puede exceder 50 caracteres";
            $("#direccion").addClass("is-invalid");
            $(".invalid-direccion").html("<small>" + msj_direccion + "</small>");

        } else {
            msj_direccion = "";
            $("#direccion").addClass("is-valid");
            $(".invalid-direccion").html("<small>" + msj_direccion + "</small>");
            direccion_valido = true;
        }

    });

    // fotografía   
     $("#foto").change(function (e) {

        if ($("#foto").val() == "") {
            msj_foto = "Debe ingresar una fotografía";
            $("#foto").addClass("is-invalid");
            $(".invalid-foto").html("<small>" + msj_foto + "</small>");


        } else {
            //valida alto y ancho de foto subida 
            var _URL = window.URL || window.webkitURL
            var ancho ="";
            var alto = "";
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                var objectUrl = _URL.createObjectURL(file);
                img.onload = function () {
                    //alert(this.width + " " + this.height);
                    ancho = this.width;
                    alto = this.height;

                    if(ancho == 200 && alto == 300){
                        msj_foto = "";
                        $("#foto").removeClass("is-invalid");
                        $("#foto").addClass("is-valid");
                        $(".invalid-foto").html("<small>" + msj_foto + "</small>");
                        foto_valido = true;
        
                        
                    }else{
                        foto_valido = false;
                       msj_foto ="Debe ingresar imagen con tamaño 200x300px";
                        $("#foto").addClass("is-invalid");
                        $(".invalid-foto").html("<small>" + msj_foto + "</small>");
                    }
                    _URL.revokeObjectURL(objectUrl);
                };
                img.src = objectUrl;
            }
                
        }
    });
 
/* 
    var _URL = window.URL || window.webkitURL;
    $("#foto").change(function (e) {
        var file, img;
        if ((file = this.files[0])) {
            img = new Image();
            var objectUrl = _URL.createObjectURL(file);
            img.onload = function () {
                alert(this.width + " " + this.height);
                _URL.revokeObjectURL(objectUrl);
            };
            img.src = objectUrl;
        }
    }); */

    // boton ingresar usuarios
    $("#btn_registrar").click(function () {
        //validación solo campos vacíos al click boton ingresar usuarios *GUARDAR*
        let n_valido = false;
        let ape_valido = false;
        let corre_valido = false;
        let ru_valido = false;
        let fono_valido = false;
        let direcc_valido = false;
        let fot_valido = false;

        if ($("#nombre").val() == "") {
            msj_nom = "Debe ingresar un nombre";
            $("#nombre").addClass("is-invalid");
            $(".invalid-nombre").html("<small>" + msj_nom + "</small>");

        } else {
            n_valido = true;
        }

        if ($("#apellido").val() == "") {
            msj_apellido = "Debe ingresar un apellido";
            $("#apellido").addClass("is-invalid");
            $(".invalid-apellido").html("<small>" + msj_apellido + "</small>");

        } else {
            ape_valido = true;
        }

        if ($("#correo").val() == "") {
            msj_correo = "Debe ingresar un correo";
            $("#correo").addClass("is-invalid");
            $(".invalid-correo").html("<small>" + msj_correo + "</small>");

        } else {
            corre_valido = true;
        }

        if ($("#rut").val() == "") {
            msj_rut = "Debe ingresar rut";
            $("#rut").addClass("is-invalid");
            $(".invalid-rut").html("<small>" + msj_rut + "</small>");

        } else {
            ru_valido = true;
        }

        if ($("#telefono").val() == "") {
            msj_telefono = "Debe ingresar un teléfono";
            $("#telefono").addClass("is-invalid");
            $(".invalid-telefono").html("<small>" + msj_telefono + "</small>");

        } else {
            fono_valido = true;
        }

        if ($("#direccion").val() == "") {
            msj_direccion = "Debe ingresar una dirección";
            $("#direccion").addClass("is-invalid");
            $(".invalid-direccion").html("<small>" + msj_direccion + "</small>");

        } else {
            direcc_valido = true;
        }

        if ($("#foto").val() == "") {
            msj_foto = "Debe ingresar una fotografía";
            $("#foto").addClass("is-invalid");
            $(".invalid-foto").html("<small>" + msj_foto + "</small>");

        } else {
            fot_valido = true;
        }

        //validación solo campos vacios
        if (n_valido == false || ape_valido == false || corre_valido == false || ru_valido == false || fono_valido == false
            || direcc_valido == false || fot_valido == false) {

            //validación keyup
        } else if (nom_valido == false || apellido_valido == false || correo_valido == false || rut_valido == false
            || telefono_valido == false || direccion_valido == false || foto_valido == false) {


        } else {
            // si todo esta ok se envian campos validos con ajax
            //ajax 

            var formData = new FormData();
            var nombre = $("#nombre").val();
            var apellido = $("#apellido").val();
            var correo = $("#correo").val();
            var rut = $("#rut").val();
            var telefono = $("#telefono").val();
            var direccion = $("#direccion").val();

            var files = $('#foto')[0].files[0];

            formData.append('nombre', nombre);
            formData.append('apellido', apellido);
            formData.append('correo', correo);
            formData.append('rut', rut);
            formData.append('telefono', telefono);
            formData.append('direccion', direccion);
            formData.append('file', files);

            $.ajax({
                type: 'POST',
                url: 'ingresarusuario.php',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {

                    $("#nombre").removeClass("is-valid");
                    $("#apellido").removeClass("is-valid");
                    $("#correo").removeClass("is-valid");
                    $("#rut").removeClass("is-valid");
                    $("#telefono").removeClass("is-valid");
                    $("#direccion").removeClass("is-valid");
                    $("#foto").removeClass("is-valid");
                    $('#form_usuario')[0].reset();
                    cargatabla();

                    if (response == "insert ok") {
                        Swal.fire({
                            icon: 'success',
                            title: '¡Registrado!',
                            text: 'Usuario registrado con éxito',
                            confirmButtonColor: '#0275d8',
                            confirmButtonText: 'Aceptar',

                        })

                    }
                }

            });

        }

    });

    //fin boton ingresar usuarios
});
// fin validaciones formulario registro de usuario

//validacion editar usuario

$(document).ready(function () {

 
    // boton editar usuarios
    $("#btn_editar").click(function () {
        let msj_nom = "";
        let msj_apellido = "";
        let msj_correo = "";
        let msj_rut = "";
        let msj_telefono = "";
        let msj_direccion = "";

        let n_valido = false;
        let ape_valido = false;
        let corre_valido = false;
        let ru_valido = false;
        let fono_valido = false;
        let direcc_valido = false;
        //validación solo campos vacíos al click boton editar usuarios
        cargatabla();
        
        //nombre
        if ($("#nombreEditar").val() == "") {
            msj_nom = "Debe ingresar un nombre";
            $("#nombreEditar").addClass("is-invalid");
            $(".invalid-nombreE").html("<small>" + msj_nom + "</small>");

        } else if ($("#nombreEditar").val().length < 2 && $("#nombreEditar").val().length > 0) {
            msj_nom = "Nombre debe contener más de 1 caracteres";
            $("#nombreEditar").addClass("is-invalid");
            $(".invalid-nombreE").html("<small>" + msj_nom + "</small>");

        } else if ($("#nombreEditar").val().length > 20) {
            msj_nom = "Nombre no puede exceder 20 caracteres";
            $("#nombreEditar").addClass("is-invalid");
            $(".invalid-nombreE").html("<small>" + msj_nom + "</small>");

        } else {
           
            n_valido = true;
            msj_nom = "";
            $("#nombreEditar").removeClass("is-invalid");
             $("#nombreEditar").addClass("is-valid");
            $(".invalid-nombreE").html("<small>" + msj_nom + "</small>");
           
        }

        //apellido
        if ($("#apellidoEditar").val() == "") {
            msj_apellido = "Debe ingresar un apellido";
            $("#apellidoEditar").addClass("is-invalid");
            $(".invalid-apellidoE").html("<small>" + msj_apellido + "</small>");

        } else if ($("#apellidoEditar").val().length < 2 && $("#apellidoEditar").val().length > 0) {
            msj_apellido = "Apellido debe contener más de 1 caracteres";
            $("#apellidoEditar").addClass("is-invalid");
            $(".invalid-apellidoE").html("<small>" + msj_apellido + "</small>");

        } else if ($("#apellidoEditar").val().length > 20) {
            msj_apellido = "Apellido no puede exceder 20 caracteres";
            $("#apellidoEditar").addClass("is-invalid");
            $(".invalid-apellidoE").html("<small>" + msj_apellido + "</small>");    

        } else {
            ape_valido = true;
            msj_apellido="";
            $("#apellidoEditar").removeClass("is-invalid");
            $("#apellidoEditar").addClass("is-valid");
           $(".invalid-apellidoE").html("<small>" + msj_apellido + "</small>");
        }

        //correo
        if ($("#correoEditar").val() == "") {
            msj_correo = "Debe ingresar un correo";
            $("#correoEditar").addClass("is-invalid");
            $(".invalid-correoE").html("<small>" + msj_correo + "</small>");

        } else if (validaCorreo($("#correoEditar").val()) == false) {
            msj_correo = "Correo inválido";
            $("#correoEditar").addClass("is-invalid");
            $(".invalid-correoE").html("<small>" + msj_correo + "</small>");

        } else {
            corre_valido = true;
            msj_correo="";
            $("#correoEditar").removeClass("is-invalid");
            $("#correoEditar").addClass("is-valid");
            $(".invalid-correoE").html("<small>" + msj_correo + "</small>");
        }

        //rut
        if ($("#rutEditar").val() == "") {
            msj_rut = "Debe ingresar rut";
            $("#rutEditar").addClass("is-invalid");
            $(".invalid-rutE").html("<small>" + msj_rut + "</small>");

        }else if(valRun($("#rutEditar").val())==false){
            
            msj_rut = "Rut inválido";
            $("#rutEditar").addClass("is-invalid");
            $(".invalid-rutE").html("<small>" + msj_rut + "</small>");

        } else {
            ru_valido = true;
            msj_rut="";
            $("#rutEditar").removeClass("is-invalid");
            $("#rutEditar").addClass("is-valid");
            $(".invalid-rutE").html("<small>" + msj_rut + "</small>");
        }

        //telefono
        if ($("#telefonoEditar").val() == "") {
            msj_telefono = "Debe ingresar un teléfono";
            $("#telefonoEditar").addClass("is-invalid");
            $(".invalid-telefonoE").html("<small>" + msj_telefono + "</small>");
        
        } else if ($("#telefonoEditar").val().length < 8 || $("#telefonoEditar").val().length > 8) {
            msj_telefono = "Debe ingresar 8 dígitos";
            $("#telefonoEditar").addClass("is-invalid");
            $(".invalid-telefonoE").html("<small>" + msj_telefono + "</small>");

        } else {
            fono_valido = true;
            msj_telefono=""
            $("#telefonoEditar").removeClass("is-invalid");
            $("#telefonoEditar").addClass("is-valid");
           $(".invalid-telefonoE").html("<small>" + msj_telefono + "</small>");
        }


        if ($("#direccionEditar").val() == "") {
            msj_direccion = "Debe ingresar una dirección";
            $("#direccionEditar").addClass("is-invalid");
            $(".invalid-direccionE").html("<small>" + msj_direccion + "</small>");

        } else if ($("#direccionEditar").val().length > 50) {
            msj_direccion = "Dirección no puede exceder 50 caracteres";
            $("#direccionEditar").addClass("is-invalid");
            $(".invalid-direccionE").html("<small>" + msj_direccion + "</small>");

        } else {
            direcc_valido = true;
            msj_direccion=""
            $("#direccionEditar").removeClass("is-invalid");
            $("#direccionEditar").addClass("is-valid");
            $(".invalid-direccionE").html("<small>" + msj_direccion + "</small>");
        }


        //validación solo campos vacios
        if (n_valido == false || ape_valido == false || corre_valido == false || ru_valido == false || fono_valido == false
            || direcc_valido == false ) {
                //formulario invalido
             
           
        } else{
            
            // si todo esta ok se envian campos validos con ajax
            //ajax 
            
            var formData2 = new FormData();
            var nombre = $("#nombreEditar").val();
            var apellido = $("#apellidoEditar").val();
            var correo = $("#correoEditar").val();
            var rut = $("#rutEditar").val();
            var telefono = $("#telefonoEditar").val();
            var direccion = $("#direccionEditar").val();
            var idEditar = $("#idEditar").val();

            formData2.append('nombre', nombre);
            formData2.append('apellido', apellido);
            formData2.append('correo', correo);
            formData2.append('rut', rut);
            formData2.append('telefono', telefono);
            formData2.append('direccion', direccion);
            formData2.append('idEditar', idEditar);
           

            $.ajax({
                type: 'POST',
                url: 'editarusuario.php',
                data: formData2,
                contentType: false,
                processData: false,
                success: function (response) {

                   
                    $("#nombreEditar").removeClass("is-valid");
                    $("#apellidoEditar").removeClass("is-valid");
                    $("#correoEditar").removeClass("is-valid");
                    $("#rutEditar").removeClass("is-valid");
                    $("#telefonoEditar").removeClass("is-valid");
                    $("#direccionEditar").removeClass("is-valid");
                    
                    $('#form_usuarioEditar')[0].reset();
                    cargatabla();

                    if (response == "editar ok") {
                        $('#modal_usuarioEditar').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: '¡Editado!',
                            text: 'Usuario editado con éxito',
                            confirmButtonColor: '#0275d8',
                            confirmButtonText: 'Aceptar',

                        })

                        
                    }
                }

            });

        }

    });

    //fin boton ingresar usuarios
});
// fin validación editar usuario

//funcion carga tabla de usuarios
function cargatabla() {
    $.ajax({
        type: 'POST',
        url: 'cargatabla.php',
        data: { 'cargatabla': "cargatabla" },
        success: function (html) {

            $("#carga_datatable").html(html).show();
        }

    });
}


//función valida correo
function validaCorreo(correo) {
    let cvalido = true;
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailRegex.test(correo)) {
        //VALIDO
    } else {
        cvalido = false;
    }

    return cvalido;
}

// función valida rut
function valRun(run) {
    var texto = run;
    var textoDiv = texto.split("-");
    var valido = false;

    if (texto == "") {

        msj_rut = "Debe ingresar rut";
        $("#rut").addClass("is-invalid");
        $(".invalid-rut").html("<small>" + msj_rut + "</small>");

    } else {

        if (textoDiv.length !== 2) {
            msj_rut = "Formato: 11111111-1";
            $("#rut").addClass("is-invalid");
            $(".invalid-rut").html("<small>" + msj_rut + "</small>");

        } else {
            var runDiv = textoDiv[0].split("");
            var serie = 2;
            var suma = 0;
            for (var i = runDiv.length - 1; i >= 0; i--) {
                if (serie == 8) {
                    serie = 2;
                }
                var prod = runDiv[i] * serie;
                suma = suma + prod;
                serie++;
            }
            var resParcial = suma % 11;
            var resultado = 11 - resParcial;
            if (resultado == 10) {
                resultado = "k";
                if (resultado == textoDiv[1]) {
                   //guion valido
                    valido = true;

                } 

            } else {
                if (resultado == textoDiv[1]) {
                    //rut valido
                    valido = true;

                }

            }

        }

    }

    return valido;
}


//rellena datos del mdoal a plantillausuariospdf



/* 
$(document).ready(function(){
    $("#btn_pdfmodal").click(function(){

        var nom = document.getElementById('nombreModal').textContent;
        jose = nom;
        alert(nom);
        
     

    
})
}) */
