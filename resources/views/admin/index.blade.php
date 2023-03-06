@extends('struct')
@section('Content')
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
                    <li class="nav-item mx-auto" role="admin-index">
                        <button onclick="window.scrollTo(0, 0);" style="color:#000;" class="btn-secondary p-2" id="all-graduates-tab" data-bs-toggle="tab" data-bs-target="#all-graduates" type="button" role="tab" aria-controls="all-graduates" aria-selected="false">Egresados</button>
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
                                        <th>Imagen</th>
                                        <th>Empresa</th>
                                        <th>Linkedin</th>
                                        <th>Intereses</th>
                                        <th>Editar</th>
                                        <th>Borrar</th>
                                        <th>Info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> <img src="https://cdn2.coppel.com/wcsstore/AuroraStorefrontAssetStore/emarketing/OpenGraph/og_coppel.jpg" alt="" > </td>
                                        <td> Coppel </td>
                                        <td> <a href="" style="text-decoration: none;"> <i class="bi bi-linkedin" style="font-style:normal;"> Coppel </i></a> </td>
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
                                        <td colspan="12"> <a href="" > <i class="bi bi-plus-circle"> Agregar Empresa </i></a></td>
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
                                        <th>Intereses</th>
                                        <th>Editar</th>
                                        <th>Borrar</th>
                                        <th>Info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- img ... svg?seed=" Nombre del alumno "-->
                                        <td> <img src="https://api.dicebear.com/5.x/pixel-art/svg?seed=lmad&backgroundColor=b6e3f4" alt="avatar"/> </td>
                                        <td> Alumno </td>
                                        <td> <a href="" style="text-decoration: none;"> <i class="bi bi-linkedin" style="font-style:normal;"> Alumno </i></a> </td>
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
                                        <td colspan="12"> <a href="" > <i class="bi bi-plus-circle"> Agregar Alumno </i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="tab-pane show" id="all-graduates" aria-labelledby="all-students-tab">

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

                    </div>

                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
