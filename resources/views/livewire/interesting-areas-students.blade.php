<div>
    @if(count($interests) != 0)
    <h5 class="text-center mt-5">
        <i class="bi bi-caret-left-fill" id="backIcon" style="cursor:pointer; text-shadow:none; display:none" wire:click="initialAreas"></i>
            Áreas de interes
        <i class="bi bi-gear-fill" id="configIcon" style="cursor:pointer; text-shadow:none" wire:click="configAreas"></i>
    </h5>
    <div class="d-flex flex-wrap justify-content-center">

        @foreach ( $interests as $interest)
            <div class="card col-12 col-md-3 studentsCards">
                <div class="d-lg-flex">
                <div class="col" >
                        <div class="card-body">
                            <div class="clickable"onclick="alert('cicl');" style="cursor:pointer">
                                <div class="d-flex justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-pc-display-horizontal my-2" viewBox="0 0 16 16">
                                        <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v7A1.5 1.5 0 0 0 1.5 10H6v1H1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5v-1h4.5A1.5 1.5 0 0 0 16 8.5v-7A1.5 1.5 0 0 0 14.5 0h-13Zm0 1h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5ZM12 12.5a.5.5 0 1 1 1 0 .5.5 0 0 1-1 0Zm2 0a.5.5 0 1 1 1 0 .5.5 0 0 1-1 0ZM1.5 12h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1ZM1 14.25a.25.25 0 0 1 .25-.25h5.5a.25.25 0 1 1 0 .5h-5.5a.25.25 0 0 1-.25-.25Z"/>
                                    </svg>
                                </div>
                                <h5 class="card-title text-center"> {{$interest->name}}</h5>
                            </div>
                            <div class="text-center">
                                @if ($isSetting == true)
                                    @php
                                        $original = App\Models\studentInterests::join('interests', 'interests.id', '=', 'student_interests.interests')->where('student', '=', $idStudent)->get();
                                    @endphp

                                    @foreach ($original as $item)
                                        @if ($interest->id == $item->id)
                                            <button style="color:#bf3ffd; cursor: pointer; text-decoration:underline;background-color:transparent; border:unset; " wire:click="deleteRegister({{ $item->id }})">ELIMINAR</button>
                                        @endif
                                    @endforeach

                                    @php

                                        $originalTemp= array(); $interestsTemp = array();

                                        foreach ($original as $item){
                                            array_push($originalTemp, $item->id);
                                        }

                                        foreach ($interests as $item){
                                            array_push($interestsTemp, $item->id);
                                        }

                                        $list = array_diff($interestsTemp, $originalTemp);
                                    @endphp

                                    @foreach ($list as $item)
                                        @if ($interest->id == $item)
                                            <button style="color:#bf3ffd; cursor: pointer; text-decoration:underline;background-color:transparent; border:unset;" wire:click="updateRegister({{ $item }})">AGREGAR</button>
                                        @endif
                                    @endforeach

                                @else
                                    <a href="{{route('empresa.index')}}">VER MAS</a>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @else
    <h5 class="text-center mt-5">Sin áreas de interes</h5>
    @endif
</div>
