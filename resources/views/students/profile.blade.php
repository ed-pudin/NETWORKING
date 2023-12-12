@extends('struct')
@section('Content')


<script type="text/javascript">
    @if(session()->get('status') == "Imagen cambiada")
    document.addEventListener("DOMContentLoaded", function(){
        Swal.fire({
        position: 'center',
        icon: 'success',
        iconColor: '#0de4fe',
        title: `{{ session()->get('status') }}`,
        showConfirmButton: false,
        timer: 1500
        })

    });
    @endif

    @if(session()->get('status') == "Hubo un problema en la edición")
    document.addEventListener("DOMContentLoaded", function(){
        Swal.fire({
        position: 'center',
        icon: 'error',
        iconColor: '#a70202',
        title: `{{ session()->get('status') }}`,
        showConfirmButton: false,
        timer: 1500
        })

    });
    @endif


    @php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    @endphp


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#regStudentImg').attr('src', e.target.result).width(200).height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<div class="background container-fluid min-vh-100">
    <div class="netw-inicio" style="">

        <div class="col-12 col-md-9 mx-auto">

            <livewire:profile-student :student="$student" :idStudent="$student->id" :oldLinkedin="$student->linkedin"/>


            <div class="text-white text-center">Exposiciones: <br>
                @foreach ($allExpos as $ex)
                    <a href="https://expolmad.sistemaregistrofcfm.com/Portfolio/student/{{$student->fullName}}" target="_blank" class="LinkEXPO" ><b>{{$ex->year}}</b></a>
                @endforeach
            </div>
            <hr class="" style="border: 1px solid; border-image: linear-gradient(to right, #39f6e4, #a7ee54); border-image-slice: 1; border-radius:50%; opacity:100%">

            <livewire:interesting-areas-students :interests="$interests" :idStudent="$student->id"/>

        </div>
    </div>
</div>

<script>


    Livewire.on('backFnc', function (filter, index){
        $('#backIcon').show();
        $("#checkIcon").show();
        $('#configIcon').hide();
    });

    Livewire.on('editLinkedin', function (filter, index){
        $('#notFormEditLinkedin').hide();
        $("#formEditLinkedin").show();
    });

    Livewire.on('editImage', function (filter, index){
        $('#fEditImage').hide();
        $('#originalImg').hide();
        $('#formEdit').show();
        $('#tempImg').show();
    });

    Livewire.on('stopEditing', function (filter, index){
        $('#notFormEditLinkedin').show();
        $("#formEditLinkedin").hide();
    });
    
    /*Edit Password Form*/
    // Livewire.on('editPassword', function (filter, index){
    //     $('#modalChangePassword').hide();
    //     $("#formEditPassword").show();
        
    // });

    Livewire.on('saveEditingSuccess', function (filter, index){
        Swal.fire({
        position: 'center',
        icon: 'success',
        iconColor: '#0de4fe',
        title: `Editado exitoso`,
        showConfirmButton: false,
        timer: 1500
        })
    });

    Livewire.on('saveEditingFail', function (filter, index){
        Swal.fire({
        position: 'center',
        icon: 'error',
        iconColor: '#a70202',
        title: `Editado exitoso`,
        showConfirmButton: false,
        timer: 1500
        })
    });

    function submitFormImg() {
        document.getElementById("editarImagenEstudiante").submit();
    }
    
    /*Modal window to change password*/
    function submitFormPassword(){
        document.getElementById("submitFormPasswordUpdate").submit();
    }
    
    $('#editP').click(function(){
        $('#modalChangePassword').hide();
        $("#formEditPassword").show();
    });  
    
    //stopEditing
    $('#stopEditing').click(function(){
        $('#modalChangePassword').show();
        $("#formEditPassword").hide();
    });
</script>

@endsection
