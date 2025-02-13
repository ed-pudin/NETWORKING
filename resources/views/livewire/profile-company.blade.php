<div>

    <div class="text-white text-center">LinkedIn: <br>
        <div id="notFormEditLinkedin">
           @if($oldLinkedin != null)
            <a target="_blank" href="{{$oldLinkedin}}" style="text-decoration: none;"> <i class="bi bi-linkedin" style="font-style:normal;">
            {{$company->fullName}}
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
    </div>
</div>
