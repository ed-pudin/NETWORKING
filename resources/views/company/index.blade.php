@extends('struct')
@section('Content')
<div class="background-2 container-fluid min-vh-100">

    <div class="container col-md-10 col-sm-12 d-flex justify-content-center">

          <input type="text" class="form-control" name="search" id="search" placeholder="Búsqueda" required autocomplete="false">

          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg>
            </span>
          </div>

    </div>

    <div class="row mt-4">
        <div class="container col-12 col-md-10 mx-auto">

            <div class="selected-area">
                <button type="button" class="btn-vfx">Efectos Visuales</button>
                <button type="button" class="btn-programming">Programación</button>
                <button type="button" class="btn-animation3D">Animación 3D</button>
            </div>
            <hr class="" style="border: 1px solid; border-image: linear-gradient(to right, #39f6e4, #a7ee54); border-image-slice: 1; border-radius:50%; opacity:100%">

            <div class="all-areas">
                <button type="button" class="btn-animation3D">Animación 3D <i class="bi bi-x-circle-fill" onclick="alert('click')"></i></button>
                <button type="button" class="btn-vfx">Efectos Visuales <i class="bi bi-x-circle-fill" onclick="alert('click')"></i></button>
            </div>
        </div>

        <div class="d-flex flex-wrap justify-content-center">

            <div class="card col-12 col-md-4 studentsCards">
                <div class="d-lg-flex">
                    <div class="" style="background-color: #141424" >
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAJZZoEhCvLquyDxHONSY6Qbzp2yrXQs_fGFyUF-K3oKpfKOdAMeRMLl-OQestasHpspI&usqp=CAU" class="img-fluid p-2 rounded-circle" style="height:200px; width:200px;cursor:pointer" onclick="alert('cicl');">
                    </div>
                    <div class="col" onclick="alert('cicl');" style="cursor:pointer">
                        <div class="card-body">
                            <h5 class="card-title student-fullname"> Edna Alexandra Lecea Contreras</h5>
                            <div class="card-subtitle">
                              <div class="text-white">Linkedin: <a href="https://www.linkedin.com/in/edna-lecea-contreras-9bbb9a261/">edna-lecea-contreras</a></div>
                            </div>
                            <div class="areas mt-1">
                              <button type="button" class="btn-vfx" disabled>Efectos Visuales</button>
                              <button type="button" class="btn-animation3D">Animación 3D</button>
                              <button type="button" class="btn-animation2D">Animación 2D</button>
                              <button type="button" class="btn-databases">Bases de Datos</button>
                            </div>

                          </div>
                    </div>
                </div>
            </div>

            <div class="card col-12 col-md-4 studentsCards">
                <div class="d-lg-flex">
                    <div class="" style="background-color: #141424">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAJZZoEhCvLquyDxHONSY6Qbzp2yrXQs_fGFyUF-K3oKpfKOdAMeRMLl-OQestasHpspI&usqp=CAU" class="img-fluid p-2 rounded-circle" style="height:200px; width:200px;cursor:pointer" onclick="alert('cicl');">
                    </div>
                    <div class="col" onclick="alert('cicl');" style="cursor:pointer">
                        <div class="card-body">
                            <h5 class="card-title student-fullname"> Edna Alexandra Lecea Contreras</h5>
                            <div class="card-subtitle">
                              <div class="text-white">Linkedin: <a href="https://www.linkedin.com/in/edna-lecea-contreras-9bbb9a261/">edna-lecea-contreras</a></div>
                            </div>
                            <div class="areas mt-1">
                              <button type="button" class="btn-vfx" disabled>Efectos Visuales</button>
                              <button type="button" class="btn-animation3D">Animación 3D</button>
                            </div>

                          </div>
                    </div>
                </div>
            </div>


            <div class="card col-12 col-md-4 studentsCards">
                <div class="d-lg-flex">
                    <div class="" style="background-color: #141424">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAJZZoEhCvLquyDxHONSY6Qbzp2yrXQs_fGFyUF-K3oKpfKOdAMeRMLl-OQestasHpspI&usqp=CAU" class="img-fluid p-2 rounded-circle" style="height:200px; width:200px;cursor:pointer" onclick="alert('cicl');">
                    </div>
                    <div class="col" onclick="alert('cicl');" style="cursor:pointer">
                        <div class="card-body">
                            <h5 class="card-title student-fullname"> Edna Alexandra Lecea Contreras</h5>
                            <div class="card-subtitle">
                              <div class="text-white">Linkedin: <a href="https://www.linkedin.com/in/edna-lecea-contreras-9bbb9a261/">edna-lecea-contreras</a></div>
                            </div>
                            <div class="areas mt-1">
                              <button type="button" class="btn-vfx" disabled>Efectos Visuales</button>
                              <button type="button" class="btn-animation3D">Animación 3D</button>
                              <button type="button" class="btn-animation2D">Animación 2D</button>
                              <button type="button" class="btn-databases">Bases de Datos</button>

                              <button type="button" class="btn-vfx" disabled>Efectos Visuales</button>
                              <button type="button" class="btn-animation3D">Animación 3D</button>
                              <button type="button" class="btn-animation2D">Animación 2D</button>
                              <button type="button" class="btn-databases">Bases de Datos</button>
                            </div>

                          </div>
                    </div>
                </div>
            </div>


        </div>

    </div>



</div>
@endsection
