<div>

<form id="editarImagenEstudiante" enctype="multipart/form-data" action="{{route('editarImagen', $student->id)}}" method="post">
@method('PUT')

@csrf

    <div id="originalImg" class="col-12 text-center">
        <img style="object-fit: cover; height:200px; width:200px; border-radius:50%;"
        @if(is_null($student->image)) src="https://api.dicebear.com/5.x/pixel-art/svg?seed={{$student->fullName}}&backgroundColor=b6e3f4"
        @else src="{{asset("/studentImages/".$student->image)}}" @endif alt="avatar"/>
    </div>

    <div id="tempImg" class="col-12 text-center" style="display: none">
        <img style="object-fit: cover; height:200px; width:200px; border-radius:50%;"
            @if(is_null($student->image))
                src="https://api.dicebear.com/5.x/pixel-art/svg?seed={{$student->fullName}}&backgroundColor=b6e3f4"
            @else
                src="{{asset("/studentImages/".$student->image)}}"
            @endif
                name="regStudentImg" id="regStudentImg"
            alt="avatar"/>
    </div>

    <div class="text-center mt-2">

        <svg id="fEditImage" wire:click="editImage()" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="white" class="bi bi-pencil-fill" viewBox="0 0 16 16" style="cursor:pointer">
           <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
        </svg>


        <div class="mb-4" id="formEdit" style="display: none">
            <div class="d-flex justify-content-center" style="align-items: center;text-align-last: start;">
                <div class="mx-1" style="text-align-last: center;">
                    <a onclick="submitFormImg()"class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-check-lg"></i></a>
                </div>
                <div class="pt-2">
                    <div class="btn btn-primary btn-rounded" onclick="document.getElementById('regBtnStudentImg').click();">
                        <label class="form-label text-white m-1" for="regBtnStudentImg"><i class="bi bi-image-fill"></i></label>
                        <input accept="image/*" type="file" class="form-control d-none" name="regBtnStudentImg" id="regBtnStudentImg" onchange="readURL(this)"/>
                        <input name="originalImage" id="originalImage" type="text" value="" hidden>
                    </div>
                </div>
                <div class="mx-1" style="text-align-last: center;">
                    <a wire:click="stopEditing()" class="btn-table btn btn-secondary m-auto"><i class="bi bi-x-lg"></i></a>
                </div>
            </div>
        </div>

    </div>

</form>

    <h1 class="text-center">
        {{$student->fullName}}
    </h1>

    <div class="text-white text-center">LinkedIn: <br>

        <div id="notFormEditLinkedin">

            @if($oldLinkedin != null)
            <a target="_blank" href="{{$oldLinkedin}}" style="text-decoration: none;"> 
                <i class="bi bi-linkedin" style="font-style:normal;">
                    {{$student->fullName}}
                </i>
            </a>
            @else
            <h5 style="font-size:.9rem; ">No se ha registrado LinkedIn</h5>
            @endif
            <svg wire:click="editLinkedin()" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="white" class="bi bi-pencil-fill" viewBox="0 0 16 16" style="cursor:pointer">
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
            </svg>
        </div>

        <div class="mb-4" id="formEditLinkedin" style="display: none">
                <div class="d-flex justify-content-center" style="align-items: center;text-align-last: start;">
                    <div class="col-md-6 col-12 mx-1">
                        <div class="form-floating">
                            <input autocomplete="off" wire:model.lazy="oldLinkedin" name="editCompanyName" type="text" class="form-control" placeholder="LinkedIn" required>
                        </div>
                    </div>
                    <div class="mx-1" style="text-align-last: center;">
                        <a wire:click="saveEditing()" class="btn-table btn btn-primary col-12 m-auto" id="buttonEditA"><i class="bi bi-check-lg"></i></a>
                    </div>
                    <div class="mx-1" style="text-align-last: center;">
                        <a wire:click="stopEditing()" class="btn-table btn btn-secondary m-auto" id="buttonEditB"><i class="bi bi-x-lg"></i></a>
                    </div>
                </div>
        </div>
        
        <div id="modalChangePassword">
            <div id='containerCP'>
                <span target="_blank"  style="text-decoration: none;"> 
                    <i class="bi" style="font-style:normal;">
                        Cambiar contraseña
                    </i>
                </span>
                <svg id="editP" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="white" class="bi bi-pencil-fill" viewBox="0 0 16 16" style="cursor:pointer">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                </svg>
            </div>
        </div>
        <form id='submitFormPasswordUpdate' action="{{route('editarPassword', $student->id)}}" method="post">
        @method('PUT')

        @csrf
            <div class="mb-4" id="formEditPassword" style="display: none">
                    <div class="d-flex justify-content-center" style="align-items: center;text-align-last: start;">
                        <div class="col-md-6 col-12 mx-1">
                            <div class="form-floating">
                                <input autocomplete="off" id='inptNewPassword' name="editPassword" type="text" class="form-control" placeholder="Nueva contraseña" required>
                            </div>
                        </div>
                        <div class="mx-1" style="text-align-last: center;">
                            <a onclick="submitFormPassword()" class="btn-table btn btn-primary col-12 m-auto" id="buttonEditA"><i class="bi bi-check-lg"></i></a>
                        </div>
                        <div class="mx-1" style="text-align-last: center;">
                            <a id='stopEditing' class="btn-table btn btn-secondary m-auto" id="buttonEditB"><i class="bi bi-x-lg"></i></a>
                        </div>
                    </div>
            </div>
        </form>
    </div>
</div>
