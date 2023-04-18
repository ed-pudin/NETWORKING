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
                $('#adminEditStudentImg').attr('src', e.target.result).width(300).height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<div class="background-2 container-fluid min-vh-100">

    <div class="sticky-center">
        <form class="row align-items-center p-5" enctype="multipart/form-data" id="adminStudentEdit" action="{{route('adminEstudiante.update', [$student->id])}}" method="post">
            @csrf
            @method('PUT')
            <h1 class="mb-5" style="text-align: center;"> Editando Estudiante </h1>
            <div class="row">
                <div class="col-md-8 col-sm-12 col-12 mx-auto mt-5 mt-md-0 p-md-5">

                    <div class="mb-4 d-flex justify-content-center">
                        <img width="200" height="200" onclick="document.getElementById('adminEditBtnStudent').click();" name="adminEditStudentImg" style="object-fit: cover" id="adminEditStudentImg"
                            @if(is_null($student->image)) src="https://api.dicebear.com/5.x/pixel-art/svg?seed={{$student->fullName}}&backgroundColor=b6e3f4"
                            @else src="{{asset('storage/studentImages/'.$student->image)}}" @endif
                            alt="avatar"
                            required
                        />
                    </div>

                    <div class="d-flex justify-content-center">
                        <div class="btn btn-primary btn-rounded" onclick="document.getElementById('adminEditBtnStudent').click();">
                            <label class="form-label text-white m-1" for="adminEditBtnStudent"><i class="bi bi-image-fill"></i></label>
                            <input accept="image/*" type="file" class="form-control d-none" name="adminEditBtnStudent" id="adminEditBtnStudent" onchange="readURL(this)"/>
                            <input name="originalImage" id="originalImage" type="text" value="{{$student->image}}" hidden>
                        </div>
                    </div>

                    <div class="card-profile" style="align-self: center; text-align: -webkit-center;">
                        <div class="card-body" style="align-self: center; text-align: -webkit-center;">

                            <div class="row mb-4">
                                <div class="col-sm-5">
                                    <h5 class="mb-0">Correo</h5>
                                </div>
                                <div class="col-sm-7 text-secondary"> <input value="{{$user->email}}" class="form-control col-11" type="text" name="adminEditStudentEmail" id="adminEditStudentEmail" readonly> </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-5" style="align-self: center; text-align: -webkit-center;">
                                    <h5 class="mb-0">Contraseña</h5>
                                </div>
                                <div class="col-sm-7 text-secondary"> <input value="{{$user->password}}" class="form-control col-11" type="text" name="adminEditStudentPassword" id="adminEditStudentPassword" required> </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-5">
                                    <h5 class="mb-0">Nombre del estudiante</h5>
                                </div>
                                <div class="col-sm-7 text-secondary"> <input value="{{$student->fullName}}" class="form-control col-11" type="text" name="adminEditStudentName" id="adminEditStudentName"required> </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-5" style="align-self: center; text-align: -webkit-center;">
                                    <h5 class="mb-0"  style="align-self: top;">Linkedin</h5>
                                </div>
                                <div class="col-sm-7 text-secondary"> <input value="{{$student->linkedin}}" class="form-control col-11" type="text" name="adminEditStudentLinkedin" id="adminEditStudentLinkedin"> </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-5" style="align-self: top; text-align: -webkit-center;">
                                    <h5 class="mb-0"  style="align-self: top;">Intereses</h5>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-floating" style="background-color: black;">
                                        <select class="form-select" id="adminEditStudentInterests" name="adminEditStudentInterests[]" multiple="multiple" size="5" style="overflow-y: auto; height:100%">
                                            @foreach ($allInterests as $interest)
                                                <option value="{{$interest->id}}"
                                                    @foreach($studentInterests as $sInterest)
                                                        @if($interest->id == $sInterest->id) selected @endif
                                                    @endforeach >{{$interest->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span style="color:snow; opacity: 30%">Seleccione uno o más intereses</span>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-5" style="align-self: top; text-align: -webkit-center;">
                                    <h5 class="mb-0"  style="align-self: top;">EXPOS asistidas</h5>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-floating" style="background-color: black;">
                                        <select class="form-select" id="regStudentExpos" name="regStudentExpos[]" multiple="multiple" size="5" style="overflow-y: auto; height:100%" required>
                                        @foreach ($allExpos as $expo)
                                            <option value="{{$expo->id}}"
                                                @foreach($studentExpos as $sExpo)
                                                    @if($expo->id == $sExpo->id) selected @endif
                                                @endforeach
                                                >{{$expo->year}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <span style="color:snow; opacity: 30%">Seleccione una o más exposiciones</span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12 my-5" style="text-align:center;">
                    <button id="adminEditStudent" type="submit" class="col-md-4 col-sm-12 btn btn-secondary">CONFIRMAR</button>
                </div>
            </div>
        </form>
    </div>

</div>

<script>
    $("#regStudentExpos").mousedown(function(e) {
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

        $('#regStudentExpos option').each(function() {
          $(this).prop('selected', selections.indexOf($(this).val()) >= 0);
        });
      });

      $("#adminEditStudentInterests").mousedown(function(e) {
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

        $('#adminEditStudentInterests option').each(function() {
          $(this).prop('selected', selections.indexOf($(this).val()) >= 0);
        });
      });

  </script>

@endsection
