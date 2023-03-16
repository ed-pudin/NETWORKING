@extends('struct')
@section('Content')

<div class="background container-fluid min-vh-100">
    <div class="netw-inicio">

        <div class="col-12 col-md-9 mx-auto">

            <h1 class="text-center"> {{$company->fullName}}

            </h1>

            <livewire:profile-company :company="$company" :idCompany="$company->id" :oldLinkedin="$company->linkedin"/>


            <hr class="" style="border: 1px solid; border-image: linear-gradient(to right, #39f6e4, #a7ee54); border-image-slice: 1; border-radius:50%; opacity:100%">

            <livewire:interesting-areas :interests="$interests" :idCompany="$company->id"/>


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

    Livewire.on('stopEditing', function (filter, index){
        $('#notFormEditLinkedin').show();
        $("#formEditLinkedin").hide();
    });

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


</script>

@endsection
