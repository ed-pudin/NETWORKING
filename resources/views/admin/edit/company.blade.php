@extends('struct')
@section('Content')

<style>

    .card-body>.row {
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .card-body {
        padding-top: 5px;
        padding-bottom: 5px;
    }

</style>

<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#editEventImg').attr('src', e.target.result).width(300).height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<div class="background-2 container-fluid min-vh-100">

    <div class="sticky-center">
        <form class="row align-items-center p-5" id="registroEmpresa" action="{{route('adminEmpresa.update', [$cmpy->id])}}" method="post">
            @csrf
            @method('PUT')
            <h1 class="mb-5" style="text-align: center;"> Editando Empresa </h1>
            <div class="row">

                <div class="col-md-8 col-sm-12 col-12 mx-auto mt-5 mt-md-0 p-md-5">

                    <div class="card-profile" style="align-self: center; text-align: -webkit-center;">
                        <div class="card-body" style="align-self: center; text-align: -webkit-center;">

                            <div class="row mb-4">
                                <div class="col-sm-5" style="align-self: end;">
                                    <h5 class="mb-0"  style="align-self: top;">Correo</h5>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    <input class="form-control col-11" type="text" name="regCompanyEmail" id="regCompanyEmail" value="{{$user->email}}" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-5" style="align-self: end;">
                                    <h5 class="mb-0"  style="align-self: top;">Contraseña</h5>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    <input class="form-control col-11" type="text" name="regCompanyPass" id="regCompanyPass" value="{{$user->password}}" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-5" style="align-self: end;">
                                    <h5 class="mb-0"  style="align-self: top;">Nombre de la Empresa</h5>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    <input class="form-control col-11" type="text" name="regCompanyName" id="regCompanyName" value="{{$cmpy->fullName}}"required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-5" style="align-self: top; text-align: -webkit-center;">
                                    <h5 class="mb-0"  style="align-self: top;">LinkedIn</h5>
                                    {{--  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="icon" viewBox="0 0 16 16">
                                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                    </svg>  --}}
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    <input class="form-control col-11" type="text" name="regCompanyLinkedin" id="regCompanyLinkedin" value="{{$cmpy->linkedin}}">
                                    <span style="color:snow; opacity: 30%">Inserte el link</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-5" style="align-self: top; text-align: -webkit-center;">
                                    <h5 class="mb-0"  style="align-self: top;">Intereses</h5>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-floating">
                                        <select class="form-select col-11" id="regCompanyInterests" name="regCompanyInterests[]" multiple="multiple" size="5" style="overflow-y: auto; height:100%">
                                            @foreach ($allInterests as $interest)
                                                <option value="{{$interest->id}}"
                                                    @foreach ($interests as $int)
                                                        @if($interest->id == $int->id)
                                                        selected
                                                        @endif
                                                    @endforeach
                                                    >{{$interest->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span style="color:snow; opacity: 30%">Seleccione uno o más intereses</span>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>


                <div class="col-12 my-5" style="text-align:center;">
                    <button id="regCompany" type="submit" class="col-md-4 col-sm-12 btn btn-primary" style="box-shadow: 0 0 5px 2px #861dc2;">ENVIAR</button>
                </div>

        </form>
    </div>

</div>

<script>
    $("#regCompanyInterests").mousedown(function(e) {
        selections = $(this).val();

      }).click(function() {

        if (selections == null) {
          var selected = -1;
          selections = [];
        } else
          var selected = selections.indexOf($.isArray($(this).val()) ? $(this).val()[$(this).val().length - 1] : $(this).val());

        if (selected >= 0)
          selections.splice(selected, 1);
        else
          selections.push($(this).val()[0]);

        $('#regCompanyInterests option').each(function() {
          $(this).prop('selected', selections.indexOf($(this).val()) >= 0);
        });
      });

  </script>
@endsection
