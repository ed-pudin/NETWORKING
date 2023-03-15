
<div class="background-2 container-fluid min-vh-100">

    <div class="container col-md-10 col-sm-12 d-flex justify-content-center">

          <input type="text" class="form-control" name="search" id="search" placeholder="Búsqueda" required autocomplete="false" wire:model="searchTxt" wire:keyup="search">

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

            <div class="all-areas">
                @foreach ($allInterests as $singleInterest)
                    <button type="button" wire:click="addFilter(`{{$singleInterest->name}}`,{{$loop->index}})" id="{{$loop->index}}" class="btn-primary" >{{$singleInterest->name}}</button>
                @endforeach
            </div>
            <hr class="" style="border: 1px solid; border-image: linear-gradient(to right, #39f6e4, #a7ee54); border-image-slice: 1; border-radius:50%; opacity:100%">

            <div class="selected-area" id="selected-area">

            </div>
        </div>

        <div class="d-flex flex-wrap justify-content-center">
            @if (count($students)==0)
                <h5>No hay estudiantes</h5>
            @endif

            @foreach ($students as $student)
                <div class="card col-12 col-md-4 studentsCards">
                    <div class="d-lg-flex">
                        <div class="" style="background-color: #141424" >
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAJZZoEhCvLquyDxHONSY6Qbzp2yrXQs_fGFyUF-K3oKpfKOdAMeRMLl-OQestasHpspI&usqp=CAU" class="img-fluid p-2 rounded-circle" style="height:200px; width:200px;cursor:pointer" onclick="alert('cicl');">
                        </div>
                        <div class="col" onclick="alert('cicl');" style="cursor:pointer">
                            <div class="card-body">
                                <h5 class="card-title student-fullname"> {{$student->fullName}}</h5>
                                <div class="card-subtitle">
                                <div class="text-white">Linkedin: <a href="{{$student->linkedin}}">{{$student->linkedin}}</a></div>
                                </div>
                                <div class="all-areas mt-1">
                                    @php
                                        $interests = new App\Models\studentInterests;
                                        $interests = App\Models\studentInterests::join('interests', 'interests.id', '=', 'student_interests.interests')
                                                                                ->where('student', '=', $student->id)->get();
                                    @endphp

                                @if (count($interests) == 0)
                                    <h5 style="font-size:.9rem; ">No hay intereses</h5>
                                @endif
                                @foreach ($interests as $interest )
                                    <button type="button" class="btn-primary" disabled>{{$interest->name}}</button>
                                @endforeach

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</div>


