@extends('struct')
@section('Content')

<div class="background container-fluid min-vh-100">
    <div class="netw-inicio">

        <div class="col-12 col-md-9 mx-auto">

            <h1 class="text-center"> {{$company->fullName}}

            </h1>
            <div class="text-white text-center">Linkedin: <br>
                <a target="_blank" href="{{$company->linkedin}}"style="text-decoration: none;"> <i class="bi bi-linkedin" style="font-style:normal;"> {{$company->fullName}}</i></a>
            </div>
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


</script>

@endsection
