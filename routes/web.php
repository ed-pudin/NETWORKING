<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'index']);

Route::get('cerrarSesion', [LoginController::class, 'logOut']
)->name('cerrarSesion')->middleware('logOut');


//Acceso todos inicio sesion
Route::resource('inicioSesion', LoginController::class, [
    //1. Vista inicio sesion
    'index' => 'inicioSesion.index',
    //2. Enviar request
    'store' => 'inicioSesion.store'
]);


Route::group(['middleware' => 'isAdmin'], function () {

    Route::resource('admin', AdminController::class, [
        //1. Vista principal de administrador (tab de alumnos y empresas)
        'index' => 'admin.index',
    ]);

    Route::resource('adminEmpresa', CompanyController::class, [
        //1. Vista principal de registro empresa
        'create' => 'adminEmpresa.create',
        //2. Guardar
        'store' => 'adminEmpresa.store',
        //3. Vista para editar
        //4. Guardar editar
        //5. Eliminar
        'destroy' => 'adminEmpresa.destroy'
    ]);

    Route::resource('adminEstudiante', StudentController::class, [
        //1. Vista principal de registro alumno
        'create'    => 'adminEstudiante.create',
        //2. Guardar
        'store'     => 'adminEstudiante.store',
        //3. Vista para editar
        //4. Guardar editar
        //5. Eliminar
        'destroy'   => 'adminEstudiante.destroy'
    ]);
});

Route::group(['middleware' => 'isCompany'], function () {

    Route::resource('empresa', CompanyController::class, [
        //1. Vista principal de empresa (cartas de estudiantes)
        'index' => 'empresa.index',
        //2. Vista perfil de una empresa
        'show' => 'empresa.show',
    ]);

    Route::resource('empresaEstudiante', StudentController::class, [
        //2. Vista principal de un estudiante desde una empresa
        'show' => 'empresaEstudiante.show',
    ]);

});

Route::group(['middleware' => 'isStudent'], function () {

    Route::resource('estudiante', StudentController::class, [
        //1. Vista principal de un estudiante (cartas de empresas)
        'index' => 'estudiante.index',
        //2. Vista perfil de un estudiante
        'show' => 'estudiante.show',
    ]);

    Route::resource('estudianteEmpresa', CompanyController::class, [
        //2. Vista principal de un estudiante desde una empresa
        'show' => 'empresa.show',
    ]);


});
