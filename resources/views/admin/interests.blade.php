<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Intereses</title>

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

<div class="background container-fluid min-vh-100">
    <div class="col-12 col-md-9 mx-auto">
        <div class="row">
            <h1 class="text-center"> Intereses </h1>
        </div>
        <form id="form" method="POST" enctype="multipart/form-data" action="{{route('adminInterests.store')}}">
            @csrf
            <div class="input-group mb-3">
                <input name="interest" id="interest" type="text" class="form-control" placeholder="Recipient's username"/>
                <button type="submit" class="btn-secondary">+</button>
            </div>
        </form>

            <table class="table" id="table">
                <tbody id="tbody">
                @foreach ($interests as $interest)
                <form id="delete" method="post" enctype="multipart/form-data" action="{{route('adminInterests.destroy', [$interest->id])}}">
                @method('DELETE')
                @csrf
                <tr>
                      <td>{{$interest->name}}</td>
                      <td><button type="submit" class="btn-primary">Eliminar</button></td>
                  </tr>
                </form>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
