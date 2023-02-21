<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Index</title>

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
                    <a class="navbar-brand" href="/"> <img class="logo-img" src="{{ asset('imgs/logo.png') }}" height="40"> </a>
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
                        <li class="nav-item" href="#">
                            <button type="button" class="swal2-styled swal2-confirm my-0 mx-lg-5 mx-2 nav-txt nav-index">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"></path>
                                </svg>
                                    USERNAME
                            </button>

                        </li>
                        
                    </ul>

                </div>

            </div>
        </nav>

        <div class="background-2 container-fluid min-vh-100">
            <div class="netw-inicio min-vh-80" style="">
                <div class="row">
                    <nav class="navbar navbar-expand-lg" id="navbarNav2">
                    <div class="container-fluid">
                        <div class="col-md-4 col-5">
                            <div class="input-group flex-nowrap">
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                        </svg>
                                    </button>
                            </div>
                        </div>
                        <button class="m-0 navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav2" aria-controls="navbarNav2" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="nav navbar-nav navbar-left"></ul>
                            <div class="col-md-5 col-10">
                                <div class="navbar-nav">
                                   <div class="collapse navbar-collapse" id="navbarNav2">
                                        <li class="nav-item">
                                            <button class="swal2-styled swal2-confirm my-0 mx-lg-2 mx-2 nav-txt nav-index">Animación 2D</button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="swal2-styled swal2-confirm my-0 mx-lg-2 mx-2 nav-txt nav-index">Animación 3D</button>
                                        </li>        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </nav>
                </div>

                <div class="row">
                <div class="container-fluid">
                <div class="card">
                    <div class="additional">
                        <div class="user-card">
                            <svg width="110" height="110" viewBox="0 0 250 250" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="title desc" class="center">
                                <img src="https://placehold.co/110x110" class="img-fluid  mx-lg-3 my-2 rounded-circle" style="align=center" alt="..." height="150">
                                <div class="col-md-2 col-3 mx-lg-2 my-0">
                                    <img src="{{ asset('imgs/logo.png') }}" class="img-fluid  mx-lg-2 my-0" height="10"> 
                                </div>
                            </svg>
                        </div>
                        <div class="more-info">
                                <div class="row my-0">
                                <h4 class="student-name">Nombre del Alumno</h4>
                                </div>
                                <div class="row my-0">
                                    <p class="linkedin">Linkedin</p>
                                </div>
                            <div class="coords">
                                    <button type="button" class="btn-programming">Programación</button>
                                    <button type="button" class="btn-animation3D">Animación 3D</button>
                                    <button type="button" class="btn-animation2D">Animación 2D</button>
                                    <button type="button" class="btn-databases">Bases de Datos</button>
                                    <button type="button" class="btn-vfx">Efectos Visuales</button>
                            </div>
                        </div>
                    </div>
                    <div class="general">
                        <div class="container-fluid">
                            <div class="row my-0">
                                <h4 class="student-fullname">Nombre del Alumno</h4>
                            </div>
                            <div class="row my-0">
                                <div class="labels">
                                    <button type="button" class="btn-programming">Programación</button>
                                    <button type="button" class="btn-animation3D">Animación 3D</button>
                                    <button type="button" class="btn-animation2D">Animación 2D</button>
                                    <button type="button" class="btn-databases">Bases de Datos</button>
                                    <button type="button" class="btn-vfx">Efectos Visuales</button>
                                    <!--<p class="more">Pase sobre la tarjeta para más información</p>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>