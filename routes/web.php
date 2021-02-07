<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacationController;
use App\Models\Salary;
use App\Models\Hour;
Use App\Models\User;
use App\Models\Vacation;


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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', function () {
     return view('authentication-login');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/authentication-register', function () {
    return view('authentication-register');
});

Route::get('/index', function () {
    return view('index');
});
Route::get('/promo', function () {
    return view('index');
});
Route::get('/course', function () {
    return view('index');
});

Route::get('profile/{id}', function ($id) {
    $user =App\Models\User::find($id);
    //$user =App\Models\User::getUser($id);
    echo $id->id;
    //return view('profile', $user);
});

Route::get('salary', function () {
    // $salario = UserSalary::where('NOUSUARIO',$_GET['userId'])->get();
    // dd($salario);
     //return view('salary',$salario);
     //return view('salary');
    $user = App\Models\Hour::first();
    echo $user->htname;

});

Route::get('/absence', function () {
    return view('absence');
});


// Route::get('vacation/{id}', function ($id) {
//     $vacation = Vacation::where('user', $id)->get();
//     return view('vacation', $vacation);
// });
// Route::resource(name:"vacations", controller:VacationController::class);

// Route::resource('companies', 'CompanyController');
// Route::resource('vacations', 'VacationController');


Route::get('/clocking', function () {
    return view('clocking');
});

Route::get('/book', function () {
    return view('book');
});

// Usuarios
Route::get('/users', [\App\Http\Controllers\UserController::class, 'getUsers']);

// Nuevo usuario
Route::get('/user/new', [\App\Http\Controllers\UserController::class, 'newUser']);

//Acceso a un usuario concreto
// Route::get('/user/{id}', function ($id) {
//     return "Mostrando usuario: {$id}";
// })->where('id', '[0-9]+');
Route::get('/user/{user}',[\App\Http\Controllers\UserController::class, 'getUser'])
    ->where('id', '[0-9]+');


