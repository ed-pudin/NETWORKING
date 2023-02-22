@extends('company.struct')
@section('Content')
<div class="background container-fluid min-vh-100">
    <div class="netw-inicio min-vh-80" style="">
        <div class="row" >
            <div class="col-md-7 col-12" style="
            align-self: center;
            text-align: -webkit-center;">
                <img class="img img-fluid p-5 rounded-circle" src="https://placehold.co/450x450" alt="EXPO LMAD 2023">
            </div>

            <div class="col-md-5 col-12 py-lg-0 py-5 px-5" style="align-self: center;">
                <div class="row">
                    <div class="col-12 justify-content-center text-center my-5">
                        <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:-webkit-xxx-large">Información Básica</h1>
                    </div>

                    <div class="justify-content-center">

                        <div class="col-md-10 my-4 mx-auto">
                            <div class="" syle="transform-origin: unset;">
                                <input type="text" class="form-control text-center" name="companyName" id="companyName_Profile" placeholder="Clave de inicio de sesión">
                            </div>
                        </div>

                    </div>

                    <div class="justify-content-center">

                        <div class="col-md-10 my-4 mx-auto">
                            <div class="" syle="transform-origin: unset;">
                                <input type="password" class="form-control text-center" name="companyPass" id="companyPass_Profile" placeholder="Contraseña">
                            </div>
                        </div>

                    </div>

                    <div class="d-flex justify-content-center my-4">
                        <button type="submit" class="btn btn-primary col-md-6">Modificar Datos?</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection