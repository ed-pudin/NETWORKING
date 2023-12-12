@extends('struct')
@section('Content')

<div class="background container-fluid min-vh-100">
    <div class="netw-inicio" style="">
        <div class="col-12 col-md-9 mx-auto">

            <div class="col-12 text-center">
                <img style="object-fit: cover; height:200px; width:200px; border-radius:50%;" @if(is_null($sdt->image)) src="https://api.dicebear.com/5.x/pixel-art/svg?seed={{$sdt->fullName}}&backgroundColor=b6e3f4" @else src="{{asset("/studentImages/".$sdt->image)}}" @endif alt="avatar"/>
            </div>

            <h1 class="text-center">
                {{$sdt->fullName}}
            </h1>

            <div class="text-white text-center">LinkedIn: <br>

                <div id="notFormEditLinkedin">
                    @if($sdt->linkedin != null)
                    <a target="_blank" href="{{$sdt->linkedin}}"style="text-decoration: none;">
                         <i class="bi bi-linkedin" style="font-style:normal;"> {{$sdt->fullName}}</i></a>
                    </i>
                    </a>
                    @else
                    <h5 style="font-size:.9rem; ">No se ha registrado LinkedIn</h5>
                    @endif
                </div>

                <div class="mb-4" id="formEditLinkedin" style="display: none">
                        <div class="d-flex justify-content-center" style="align-items: center;text-align-last: start;">
                            <div class="col-md-6 col-12 mx-1">
                                <div class="form-floating">
                                    <input autocomplete="off" wire:model.lazy="oldLinkedin" name="editCompanyName" type="text" class="form-control" placeholder="LinkedIn" required>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            <!--div class="text-white text-center">
                
            </div-->

            <div class="text-white text-center">Exposiciones: <br>
                @foreach ($allExpos as $ex)
                    <a href="https://expolmad.sistemaregistrofcfm.com/Portfolio/student/{{$sdt->fullName}}" target="_blank" class="LinkEXPO" ><b>{{$ex->year}}</b></a>
                @endforeach
            </div>
            
            <hr class="" style="border: 1px solid; border-image: linear-gradient(to right, #39f6e4, #a7ee54); border-image-slice: 1; border-radius:50%; opacity:100%">

            <h5 class="text-center mt-5">
               <!--b><a href="https://expolmad.sistemaregistrofcfm.com/Portfolio/student/{{$sdt->fullName}}" style="color: #2AD2FF; text-decoration: none; text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);" target="_blank" >
                   Ver Proyectos
                   <br ><img src='{{ asset('imgs/logo.png') }}' height="29" width="50" style="margin-top: 10px;"> 
                   </a>
                </b--->
            </h5>

            <h5 class="text-center mt-5">
                    Áreas de interés
            </h5>
            <div class="d-flex flex-wrap justify-content-center">

                @foreach ($interests as $interest)
                    <div class="card col-12 col-md-3 studentsCards">
                        <div class="d-lg-flex">
                        <div class="col" >
                                <div class="card-body">
                                    <div class="clickable">
                                        <div class="d-flex justify-content-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-pc-display-horizontal my-2" viewBox="0 0 16 16">
                                                <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v7A1.5 1.5 0 0 0 1.5 10H6v1H1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5v-1h4.5A1.5 1.5 0 0 0 16 8.5v-7A1.5 1.5 0 0 0 14.5 0h-13Zm0 1h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5ZM12 12.5a.5.5 0 1 1 1 0 .5.5 0 0 1-1 0Zm2 0a.5.5 0 1 1 1 0 .5.5 0 0 1-1 0ZM1.5 12h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1ZM1 14.25a.25.25 0 0 1 .25-.25h5.5a.25.25 0 1 1 0 .5h-5.5a.25.25 0 0 1-.25-.25Z"/>
                                            </svg>
                                        </div>
                                        <h5 class="card-title text-center"> {{$interest->name}}</h5>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{route('empresa.index')}}">VER MAS</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

@endsection
