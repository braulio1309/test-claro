<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EmailsController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('user', UsersController::class);
Route::resource('email', EmailsController::class);
Route::get('/estados/show/{id}', [App\Http\Controllers\EstadosController::class, 'show'])->name('estados.show');
Route::get('/ciudades/show/{id}', [App\Http\Controllers\CiudadesController::class, 'show'])->name('ciudades.show');
