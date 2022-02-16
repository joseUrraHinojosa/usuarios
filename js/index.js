//validación de usuario y password 
$(document).ready(function () {
    $("#btn_login").click(function () {

        //campos vacios sweet alert
        if($("#usuario").val() =="" || $("#password").val() == ""){
            Swal.fire({
                icon: 'error',
                title: 'Debe ingresar usuario y password',
                text: 'Por favor vuelva a intentarlo!',
                confirmButtonColor: '#0275d8',
                confirmButtonText: 'Aceptar',
      
              })
        }else{

            //ajax 
            //index
            $.ajax({
                type: 'POST',
                url: 'validalogin.php',
                data: { 'usuario': $("#usuario").val(), 'password': $("#password").val() },
                //dataType: "json",
                success: function (response) {
                   // const datos = JSON.parse(response);
                    
                    if(response == "no registra"){
                        Swal.fire({
                            icon: 'error',
                            title: 'Usuario o password incorrecto',
                            text: 'Por favor vuelva a intentarlo!',
                            confirmButtonColor: '#0275d8',
                            confirmButtonText: 'Aceptar',
                  
                          })
                    }else if(response == "registro ok"){
                            window.location.href = "inicio.php";
                    }
                }
    
            });

        }
        
  
    });
});

