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
        <form id="form">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Recipient's username" id="interest"/>
                  <button class="btn-secondary">+</button>
            </div>
        </form>
        <table class="table" id="table">
            <tbody id="tbody">
            </tbody>
        </table>
        <div class="row">
            <div class="col-12" align="right">
                <button class="btn-secondary" style="align:right;">Confirmar</button>
            </div>
        </div>
        <script>
            const formEl = document.querySelector("form");
            const tbodyEl = document.querySelector("tbody");
            const tableEl = document.querySelector("table");
            function onAddWebsite(e) {
              e.preventDefault();
              const interest = document.getElementById("interest").value;
              tbodyEl.innerHTML += `
                  <tr>
                      <td>${interest}</td>
                      <td><button class="btn-primary">Delete</button></td>
                  </tr>
              `;
            }
                function onDeleteRow(e) {
                  if (!e.target.classList.contains("btn-primary")) {
                    return;
                  }
                  const btn = e.target;
                  btn.closest("tr").remove();
                }
                formEl.addEventListener("submit", onAddWebsite);
                tableEl.addEventListener("click", onDeleteRow);
        </script>
        </div>
    </div>
</div>
