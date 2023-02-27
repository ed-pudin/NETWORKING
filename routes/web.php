<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CompanyController;

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


//Acceso todos inicio sesion
Route::resource('inicioSesion', LoginController::class, [
    //1. Vista inicio sesion
    'index' => 'inicioSesion.index',
    //2. Enviar request
    'store' => 'inicioSesion.store'
]);

Route::get('profile', function () {
    return view('company.profile');
});
Route::get('profileEst', function () {
    return view('students.companyProfile');
});
Route::get('catalogue', function () {
    return view('company.catalogue');
});


Route::group(['middleware' => 'isAdmin'], function () {





});

Route::group(['middleware' => 'isCompany'], function () {

    //Acceso todos inicio sesion
    Route::resource('empresa', CompanyController::class, [
        //1. Vista principal de empresa (cartas de estudiantes)
        'index' => 'empresa.index',
    ]);




});
