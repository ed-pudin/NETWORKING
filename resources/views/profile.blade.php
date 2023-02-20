    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Profile</title>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

        <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-dark sticky-top">
            <div class="container-fluid">
                <div class="col-md-0 p-2">
                    <a class="navbar-brand" href="/"> <img class="logo-img" src="{{ asset('imgs/logo-w.png') }}" height="40"> </a>
                </div>
                <button class="m-0 navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">

                    <ul class="nav navbar-nav navbar-left">
                        
                    </ul>
                    <ul class="nav navbar-nav ms-auto me-2">

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <p style="text-decoration: underline" class="my-0 mx-lg-5 mx-2 nav-txt nav-index"> INICIO </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link btn-w" href="#">
                                <p class="my-0 mx-2 nav-txt nav-index"> CERRAR SESION </p>
                            </a>
                        </li>
                        
                    </ul>

                </div>

            </div>
        </nav>

        <div class="background container-fluid min-vh-100">
            <div class="netw-inicio min-vh-80" style="">
                <div class="row" >
                    <div class="col-md-7 col-12" style="
                    align-self: center;
                    text-align: -webkit-center;">
                        <img class="img img-fluid p-5 rounded-circle" src="https://placehold.co/450x450" alt="EXPO LMAD 2023">
                    </div>

                    <div class="col-md-5 col-12 py-lg-0 py-5 px-5" style="align-self: end;">
                        <div class="row">
                            <form class="my-4 form-login" id="login" action="" method="post">
                                @csrf
                                <div class="col-12 d-flex justify-content-center my-5">
                                    <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:-webkit-xxx-large"> Información Básica: </h1>
                                </div>
    
                                <div class="d-flex justify-content-center">
    
                                    <div class="col-md-10 my-4 mx-3">
                                        <div class="" syle="transform-origin: unset;">
                                            <ul type="text" class="form-control text-center" name="key" id="key" placeholder="Clave de inicio de sesión">
                                            </ul>
                                        </div>
                                    </div>
    
                                </div>
    
                                <div class="d-flex justify-content-center">
    
                                    <div class="col-md-10 my-4 mx-3">
                                        <div class="" syle="transform-origin: unset;">
                                            <ul type="password" class="form-control text-center" name="pas" id="pas" placeholder="Contraseña">
                                            </ul>
                                        </div>
                                    </div>
    
                                </div>
    
                                <div class="d-flex justify-content-center my-4">
                                    <button type="submit" class="btn btn-primary col-md-6">Modificar Datos?</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
