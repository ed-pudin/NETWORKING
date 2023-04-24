<div class="background-2 container-fluid min-vh-100">

    <div class="container col-md-10 col-sm-12 d-flex justify-content-center">

          <input type="text" class="form-control" name="search" id="search" placeholder="Búsqueda" required autocomplete="false"  wire:model="searchTxt" wire:keyup="search">

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
            @if (count($companies)==0)
                <h5>No hay empresas</h5>
            @endif

            @foreach ($companies as $company)
                <div class="card col-12 col-md-4 studentsCards">
                    <div class="d-lg-flex">
                        <div class="col" onclick="window.location.href = '{{route('verEmpresa', $company->id)}}';" style="cursor:pointer">
                            <div class="card-body">
                                <h5 class="card-title student-fullname"> {{$company->fullName}}</h5>
                                <div class="card-subtitle">
                                <div class="text-white">
                                    @if($company->linkedin != null)
                                    LinkedIn: <a href="{{$company->linkedin}}">
                                    {{$company->fullName}}
                                    </a>
                                    @else
                                        <h5 style="font-size:.9rem; ">No se ha registrado LinkedIn</h5>
                                    @endif
                                </div>
                                </div>
                                <div class="all-areas mt-1">
                                    @php
                                        $interests = new App\Models\companyInterests;
                                        $interests = App\Models\companyInterests::join('interests', 'interests.id', '=', 'company_interests.interests')
                                                                                ->where('company', '=', $company->id)->get();
                                    @endphp
                                @if (count($interests) == 0)
                                    <h5 style="font-size:.9rem; ">No hay intereses</h5>
                                @endif
                                @foreach ($interests as $interest )
                                    <button type="button" class="btn-primary my-1" disabled>{{$interest->name}}</button>
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
