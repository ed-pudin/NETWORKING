@extends('company.struct')
@section('Content')
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
@endsection