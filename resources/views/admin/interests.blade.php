@extends('struct')
@section('Content')

<script type="text/javascript">
    @if(session()->get('status') == "Interés registrado")
    document.addEventListener("DOMContentLoaded", function(){
        Swal.fire({
        position: 'center',
        icon: 'success',
        iconColor: '#0de4fe',
        title: `{{ session()->get('status') }}`,
        showConfirmButton: false,
        timer: 1500
        })

    });
    @endif
    @if(session()->get('status') == "Hubo un problema en el registro")
    document.addEventListener("DOMContentLoaded", function(){
        Swal.fire({
        position: 'center',
        icon: 'error',
        iconColor:'#a70202',
        title: `{{ session()->get('status') }}`,
        showConfirmButton: false,
        timer: 1500
        })

    });
    @endif
    @if(session()->get('status') == "Interés eliminado")
    document.addEventListener("DOMContentLoaded", function(){
        Swal.fire({
        position: 'center',
        icon: 'success',
        iconColor: '#0de4fe',
        title: `{{ session()->get('status') }}`,
        showConfirmButton: false,
        timer: 1500
        })

    });
    @endif
    @if(session()->get('status') == "Hubo un problema en la eliminación")
    document.addEventListener("DOMContentLoaded", function(){
        Swal.fire({
        position: 'center',
        icon: 'error',
        iconColor:'#a70202',
        title: `{{ session()->get('status') }}`,
        showConfirmButton: false,
        timer: 1500
        })

    });
    @endif
    @if(session()->get('status') == "El interés pertenece a alguien y no puede ser eliminado")
    document.addEventListener("DOMContentLoaded", function(){
        Swal.fire({
        position: 'center',
        icon: 'info',
        title: `{{ session()->get('status') }}`,
        showConfirmButton: false,
        timer: 1500
        })

    });
    @endif
</script>

<div class="background container-fluid min-vh-100">
    <div class="col-12 col-md-9 mx-auto">
        <div class="row pt-5">
            <h1 class="text-center"> Intereses </h1>
        </div>
        <form id="form" method="POST" enctype="multipart/form-data" action="{{route('adminInterests.store')}}">
            @csrf
            <div class="input-group mb-3">
                <input name="interest" id="interest" type="text" class="form-control" placeholder="Nombre del interés" required/>
                <button type="submit" class="btn-secondary">Añadir</button>
            </div>
        </form>

            <table class="table" id="table">
                <tbody id="tbody">
                @foreach ($interests as $interest)
                <form id="delete" method="post" enctype="multipart/form-data" action="{{route('adminInterests.destroy', [$interest->id])}}">
                @method('DELETE')
                @csrf
                <tr>
                      <td>{{$interest->name}}</td>
                      <td><button type="submit" class="btn-primary">Eliminar</button></td>
                  </tr>
                </form>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
