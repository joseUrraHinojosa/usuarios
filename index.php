
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/dist/sweetalert2.min.css" rel="stylesheet">
    <title>Login</title>

   
</head>
<style>

@media screen and (max-width: 480px) {
  #img-login {width: 200px; }
 
}
</style>

<body>

    <div class="container">
        <div class="m-0 vh-100 row justify-content-center align-items-center p-1">

            <div class="card mb-3 col-xl-8 col-sm-12 p-5" style="box-shadow: 6px 5px 5px rgb(240, 240, 240);">
                <div class="row p-2">
                    <div class="col-md-6 ">

                       <!--  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player src="lottie_login.json" background="transparent" speed="1" style="max-width: 300px; max-height: 300px;" loop autoplay></lottie-player> -->
                        <img id="img-login" src="secure-login.gif" alt="login" style="max-width: 320px; max-height: 340px;">

                    </div>
                    <div class="col-md-6 ">
                        <div class="card-body mt-4 mb-4">
                            <h3 class="card-title text-primary">Login</h3>

                            <div id="login" class="row g-3" >
                                <div class="col-md-12" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Su usuario es user">
                                    <label for="usuario" class="form-label">Usuario</label>
                                    <input type="text" class="form-control" id="usuario" name="usuario" tabindex="1">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-12" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Su password es user">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" aria-describedby="validationServer03Feedback" tabindex="2">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>


                                <div class="col-12">
                                    <button id="btn_login" name="btn_login" class="btn btn-primary btnIngresar" type="button" tabindex="3">Ingresar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="plugins/dist/sweetalert2.all.min.js"></script>
    <script src="js/index.js"></script>

    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>

</body>

</html>