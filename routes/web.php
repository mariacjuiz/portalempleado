<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/authentication-login', function () {
    return view('authentication-login');
});

Route::get('/authentication-register', function () {
    return view('authentication-register');
});

Route::get('/index', function () {
    return view('index');
});

// Usuarios
Route::get('/users', [UserController::class, 'getUsers']);

// Nuevo usuario
Route::get('/user/new', [UserController::class, 'newUser']);

//Acceso a un usuario concreto
// Route::get('/user/{id}', function ($id) {
//     return "Mostrando usuario: {$id}";
// })->where('id', '[0-9]+');
Route::get('/user/{user}',[UserController::class, 'getUser'])
    ->where('id', '[0-9]+');


