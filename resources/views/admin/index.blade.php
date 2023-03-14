@extends('struct')
@section('Content')


<script type="text/javascript">
    @if(session()->get('status') == "Empresa registrada")
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

    @if(session()->get('status') == "Alumno registrado")
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

    @if(session()->get('status') == "Se eliminó correctamente")
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
            icon: 'success',
            iconColor: '#0de4fe',
            title: `{{ session()->get('status') }}`,
            showConfirmButton: false,
            timer: 1500
            })

        });
    @endif

</script>
    @php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    @endphp

<script>

    function confirmDialog(triggerBtnId) {
        Swal.fire({
            title: '¿Confirmar cambios?',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(triggerBtnId).click();
            }
        })
    }
</script>

<div class="background-2 container-fluid min-vh-100">

    <div class="">
        <div class="container-fluid">
            <div class="row navbar sticky-top" style="top: 80px; background: #000;">
                <ul class="nav nav-tabs" id="tabAdminIndex" role="admin-index">
                    <li class="nav-item mx-auto" role="admin-index">
                        <button onclick="window.scrollTo(0, 0);" style="color:#000;" class="btn-secondary active p-2" id="admin-index-companies" data-bs-toggle="tab" data-bs-target="#all-companies" type="button" role="tab" aria-controls="all-companies" aria-selected="true">Empresas</button>
                    </li>
                    <li class="nav-item mx-auto" role="admin-index">
                        <button onclick="window.scrollTo(0, 0);" style="color:#000;" class=" btn-secondary p-2" id="all-students-tab" data-bs-toggle="tab" data-bs-target="#all-students" type="button" role="tab" aria-controls="all-students" aria-selected="false">Alumnos</button>
                    </li>
                </ul>
            </div>
            <div class="row" >
                <div class="tab-content">
                    <div class="tab-pane show active" id="all-companies" role="tabpanel" aria-labelledby="admin-index-companies">

                        <div class="table-responsive">
                            <table class="table" style="text-align-last:center;">
                                <thead>
                                    <tr>
                                        <th>Empresa</th>
                                        <th>Linkedin</th>
                                        <th>Correo</th>
                                        <th>Contraseña</th>
                                        <th>Intereses</th>
                                        <th>Editar</th>
                                        <th>Borrar</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($companies as $cmpy)
                                        <tr>
                                            <td> {{$cmpy->fullName}} </td>
                                            <td> <a target="_blank" href="{{$cmpy->linkedin}}" style="text-decoration: none;"> <i class="bi bi-linkedin" style="font-style:normal;">  {{$cmpy->fullName}} </i></a> </td>
                                            <td>
                                                @php
                                                    $user = new App\Models\User;
                                                    $user = App\Models\User::join('companies', 'companies.user', '=', 'users.id')
                                                                                            ->where('companies.user', '=', $cmpy->user)->first();
                                                @endphp
                                                <p>{{$user->email}}</p>
                                            </td>
                                            <td>
                                                <p>{{$user->password}}</p>
                                            </td>
                                            <td>
                                                @php
                                                $interests = new App\Models\companyInterests;
                                                $interests = App\Models\companyInterests::join('interests', 'interests.id', '=', 'company_interests.interests')
                                                                                        ->where('company', '=', $cmpy->id)->get();
                                                    @endphp
                                                @if (count($interests) == 0)
                                                    <h5 style="font-size:.9rem; ">No hay intereses</h5>
                                                @endif
                                                @foreach ($interests as $interest )
                                                    <p class="mb-0">{{$interest->name}}</p>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="#" class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-pencil"></i></a>
                                            </td>
                                            <td>
                                                <form action="{{route('adminEmpresa.destroy', [$cmpy->id])}}" method="POST" hidden>
                                                    @method('DELETE')
                                                    @csrf
                                                        <button id="delete_{{$cmpy->id}}" type="submit"> DESTROY </button>
                                                </form>
                                                <a onclick="confirmDialog(`delete_{{$cmpy->id}}`)" class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td colspan="12"> <a href="{{route('adminEmpresa.create')}}" > <i class="bi bi-plus-circle"> Agregar Empresa </i></a></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="tab-pane show" id="all-students" aria-labelledby="all-students-tab">

                        <div class="table-responsive">
                            <table class="table" style="text-align-last:center;">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Alumno</th>
                                        <th>Linkedin</th>
                                        <th>Correo</th>
                                        <th>Contraseña</th>
                                        <th>Intereses</th>
                                        <th>Borrar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)

                                        <tr>
                                            <!-- img ... svg?seed=" Nombre del alumno "-->
                                            <td> <img @if(is_null($student->image)) src="https://api.dicebear.com/5.x/pixel-art/svg?seed={{$student->fullName}}&backgroundColor=b6e3f4" @else src="{{asset('storage/studentImages/'.$student->image)}}" @endif alt="avatar"/> </td>
                                            <td> {{$student->fullName}} </td>
                                            <td> <a href="{{$student->linkedin}}" style="text-decoration: none;"> <i class="bi bi-linkedin" style="font-style:normal;"> {{$student->fullName}} </i></a> </td>
                                            <td>
                                                @php
                                                    $user = new App\Models\User;
                                                    $user = App\Models\User::join('students', 'students.user', '=', 'users.id')
                                                                                            ->where('students.user', '=', $student->user)->first();
                                                @endphp
                                                <p>{{$user->email}}</p>
                                            </td>
                                            <td>
                                                <p>{{$user->password}}</p>
                                            </td>
                                            <td>
                                                @php
                                                $interests = new App\Models\studentInterests;
                                                $interests = App\Models\studentInterests::join('interests', 'interests.id', '=', 'student_interests.interests')
                                                                                        ->where('student', '=', $student->id)->get();
                                                    @endphp
                                                @if (count($interests) == 0)
                                                    <h5 style="font-size:.9rem; ">No hay intereses</h5>
                                                @endif
                                                @foreach ($interests as $interest )
                                                    <p class="mb-0">{{$interest->name}}</p>
                                                @endforeach
                                            </td>
                                            <td>
                                                <form action="{{route('adminEstudiante.destroy', [$student->id])}}" method="POST" hidden>
                                                    @method('DELETE')
                                                    @csrf
                                                        <button id="delete_{{$student->id}}" type="submit"> DESTROY </button>
                                                </form>
                                                <a onclick="confirmDialog(`delete_{{$student->id}}`)" class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-trash"></i></a>
                                            </td>
                                        </tr>

                                    @endforeach
                                    <tr>
                                        <td colspan="12"> <a href="{{route('adminEstudiante.create')}}" > <i class="bi bi-plus-circle"> Agregar Alumno </i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    {{--  <div class="tab-pane show" id="all-graduates" aria-labelledby="all-students-tab">

                        <div class="table-responsive">
                            <table class="table" style="text-align-last:center;">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Egresado</th>
                                        <th>Linkedin</th>
                                        <th>Intereses</th>
                                        <th>Editar</th>
                                        <th>Borrar</th>
                                        <th>Info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- img ... svg?seed=" Nombre del Egresado "-->
                                        <td> <img src="https://api.dicebear.com/5.x/pixel-art/svg?seed=lmad&backgroundColor=b6e3f4" alt="avatar"/> </td>
                                        <td> Egresado </td>
                                        <td> <a href="" style="text-decoration: none;"> <i class="bi bi-linkedin" style="font-style:normal;"> Egresado </i></a> </td>
                                        <td> <a href="" style="text-decoration: none;"> <i class="bi bi-search" style="font-style:normal;"> Intereses </i></a> </td>
                                        <td>
                                            <a href="#" class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-pencil"></i></a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-trash"></i></a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn-table btn btn-primary col-12 m-auto"><i class="bi bi-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="12"> <a href="" > <i class="bi bi-plus-circle"> Agregar Egresado </i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>  --}}

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
