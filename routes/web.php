<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacationController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('auth.login');
    //return view('profile');
});

//Es obligatorio estar logueado para ver cualqueir dato de la web.
//Deshabilitamos la opcion de registrar porque no es una acción posiblepara cualquier usuario
Auth::routes(['register'=>false]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('profile');
// Route::get('/profile/{id}', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/index', [App\Http\Controllers\HomeController::class, 'company'])->name('company');
// Route::get('/course', [App\Http\Controllers\HomeController::class, 'company'])->name('company');
// Route::get('/promo', [App\Http\Controllers\HomeController::class, 'company'])->name('company');
//Route::get('/salary', [App\Http\Controllers\HomeController::class, 'salary'])->name('index');
//Route::get('/absence', [App\Http\Controllers\HomeController::class, 'index'])->name('absence');

Route::get('/index', function () {
    return view('index');
    //return view('profile');
});

Route::get('/course', function () {
    return view('course');
    //return view('profile');
});

Route::get('/promo', function () {
    return view('promo');
    //return view('profile');
});

Route::get('/profile', function () {
    return redirect('/users/'.Auth::user()->id.'/edit');
    //return view('profile');
});

// Route::get('/', function () {
//      return view('authentication-login');
// });

// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Route::get('/authentication-register', function () {
//     return view('authentication-register');
// });

// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/home', function () {
//     return view('index');
// });
// Route::get('/index', function () {
//     return view('index');
// });
// Route::get('/promo', function () {
//     return view('index');
// });
// Route::get('/course', function () {
//     return view('index');
// });

// Route::get('profile/{id}', function ($id) {
//     $user =App\Models\User::find($id);
//     //$user =App\Models\User::getUser($id);
//     echo $id->id;
//     //return view('profile', $user);
// });

Route::get('/salary', function () {
    // $salario = UserSalary::where('NOUSUARIO',$_GET['userId'])->get();
//     // dd($salario);
//      //return view('salary',$salario);
      return view('salary');
     //$user = App\Models\Hour::first();
     //echo $user->htname;

 });

 Route::get('/absence', function () {
     return view('absence');
 });

 Route::get('/vacation', function () {
    return view('vacation');
});

Route::get('/clocking', function () {
    return view('clocking');
});

Route::get('/book', function () {
    return view('book');
});

// Route::get('/salary', function () {
//      return view('salary');
// });

// Route::get('vacation/{id}', function ($id) {
//     $vacation = Vacation::where('user', $id)->get();
//     return view('vacation', $vacation);
// });
// Route::resource(name:"vacations", controller:VacationController::class);

// Route::resource('companies', 'CompanyController');
// Route::resource('vacations', 'VacationController');


// Route::get('/clocking', function () {
//     return view('clocking');
// });

// Route::get('/book', function () {
//     return view('book');
// });


// Route::get('/users', function () {

// });
// UserController
// Usuarios

//De esta manera creamos todas las rutas necesarias para acceder al controlador.
//Route::resource('user', [\App\Http\Controllers\UserController::class]);


// });

//Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);

// // Nuevo usuario
//Route::get('/user/create', [\App\Http\Controllers\UserController::class, 'create']);

//Route::resource('users', [\App\Http\Controllers\UserController::class]);

//De esta manera, accedemos a todas las rutas de usuarios
Route::resource('users', '\App\Http\Controllers\UserController');


//Route::resource('users', '\App\Http\Controllers\Admin\ProfileController');

//Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
//Route::get('/users/create',  [\App\Http\Controllers\UserController::class, 'create']);

// //Acceso a un usuario concreto
// // Route::get('/user/{id}', function ($id) {
// //     return "Mostrando usuario: {$id}";
// // })->where('id', '[0-9]+');
// Route::get('/user/{user}',[\App\Http\Controllers\UserController::class, 'getUser'])
//     ->where('id', '[0-9]+');


