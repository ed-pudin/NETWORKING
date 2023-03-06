<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @livewireStyles

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

                        @php
                        $id = session()->get('id');
                        $user = new App\Models\User();
                        $user = App\Models\User::where('id', '=', $id)->first();
                            if($user != null){

                                $rol = $user->rol;
                                if($rol == 'company')
                                {
                                    $company = new App\Models\company();
                                    $company = App\Models\company::where('user', '=', $user->id)->first();
                                }
                                if($rol == 'student')
                                {
                                    $student = new App\Models\student();
                                    $student = App\Models\student::where('user', '=', $user->id)->first();
                                }
                            }

                        @endphp

                        <li class="nav-item">
                            <a class="nav-link"
                                @if(!empty($company))
                                    href="{{route('empresa.index')}}">
                                @endif

                                @if(!empty($student))
                                href="{{route('estudiante.index')}}">
                                @endif

                                <p style="text-decoration: underline" class="my-0 mx-lg-5 mx-2 nav-txt nav-index"> INICIO </p>
                            </a>
                        </li>

                        @if (!session()->has('id'))
                            <li class="nav-item m-2">
                                <a class="nav-link btn-w" href="{{route('inicioSesion.index')}}">
                                    <p class="my-0 mx-2 nav-txt nav-index"> INGRESAR </p>
                                </a>
                            </li>
                        @else

                            <li class="nav-item">
                                <a class="nav-link btn-w"
                                    @if(!empty($company))
                                        href="{{route('empresa.show', $id)}}">
                                    @endif
                                    @if(!empty($student))
                                        href="{{route('estudiante.show', $id)}}">
                                    @endif
                                    <p class="my-0 mx-2 nav-txt nav-index"> <i class="bi bi-person-fill"></i>
                                        @if(!empty($company))
                                            {{$company->fullName}}
                                        @endif
                                        @if(!empty($student))
                                            {{$student->fullName}}
                                        @endif
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('cerrarSesion')}}">
                                    <p style="text-decoration: underline" class="my-0 mx-lg-3 nav-txt nav-index"> SALIR </p>
                                </a>
                            </li>
                        @endif


                    </ul>

                </div>

            </div>
        </nav>
        @livewireScripts
        @yield('Content')

    </body>
</html>
