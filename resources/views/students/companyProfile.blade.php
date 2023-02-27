@extends('struct')
@section('Content')

<div class="background container-fluid min-vh-100">
    <div class="netw-inicio" style="">

        <div class="col-12 col-md-9 mx-auto">

            <h1 class="text-center"> Coppel
            </h1>
            <div class="text-white text-center">Linkedin: <a href="https://www.linkedin.com/in/edna-lecea-contreras-9bbb9a261/">edna-lecea-contreras</a></div>

            <hr class="" style="border: 1px solid; border-image: linear-gradient(to right, #39f6e4, #a7ee54); border-image-slice: 1; border-radius:50%; opacity:100%">

            <h5 class="text-center mt-5">Areas de interes</h5>

            <div class="d-flex justify-content-center">

                <div class="card col-12 col-md-4 studentsCards">
                    <div class="d-lg-flex">
                       <div class="col" >
                            <div class="card-body">
                                <div class="clickable"onclick="alert('cicl');" style="cursor:pointer">
                                    <div class="d-flex justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-pc-display-horizontal my-2" viewBox="0 0 16 16">
                                            <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v7A1.5 1.5 0 0 0 1.5 10H6v1H1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5v-1h4.5A1.5 1.5 0 0 0 16 8.5v-7A1.5 1.5 0 0 0 14.5 0h-13Zm0 1h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5ZM12 12.5a.5.5 0 1 1 1 0 .5.5 0 0 1-1 0Zm2 0a.5.5 0 1 1 1 0 .5.5 0 0 1-1 0ZM1.5 12h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1ZM1 14.25a.25.25 0 0 1 .25-.25h5.5a.25.25 0 1 1 0 .5h-5.5a.25.25 0 0 1-.25-.25Z"/>
                                        </svg>
                                    </div>
                                    <h5 class="card-title text-center"> Efectos visuales</h5>
                                </div>
                                <div class="text-center">
                                    <a href="https://www.linkedin.com/in/edna-lecea-contreras-9bbb9a261/">VER MAS</a>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
