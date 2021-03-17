<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsenceController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\VacationController;
use App\Http\Controllers\HomeController;
use App\Models\Salary;
use App\Models\Hour;
Use App\Models\User;
use App\Models\Vacation;
use App\Models\Post;


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

// con middleware nos aseguramos de que el usuario esté logueado, si no lo está, redirecciona al login
Route::get('/company/news', [App\Http\Controllers\CompanyController::class, 'getNews'])->middleware('auth');
Route::get('/company/course', [App\Http\Controllers\CompanyController::class, 'getCourses'])->middleware('auth');
Route::get('/company/promo', [App\Http\Controllers\CompanyController::class, 'getPromos'])->middleware('auth');

Route::resource('users', '\App\Http\Controllers\UserController')->middleware(EnsureTokenIsValid::class);
Route::resource('salary', '\App\Http\Controllers\SalaryController')->middleware('auth');
Route::resource('vacations', '\App\Http\Controllers\VacationController')->middleware('auth');
Route::resource('departments', '\App\Http\Controllers\DepartmentController')->middleware('admin');
Route::resource('hours', '\App\Http\Controllers\HourController')->middleware('admin');
Route::resource('absences', '\App\Http\Controllers\AbsenceController')->middleware('auth');
Route::resource('checks', '\App\Http\Controllers\CheckController')->middleware('auth');

Route::get('/profile', function () {
    return redirect()->action(
        [UserController::class, 'edit'], [Auth::user()->id]
    )->withoutMiddleware([EnsureTokenIsValid::class]);
});


Route::get('/index', function () {
    return redirect('/company/news');
});
Route::get('/home', function () {
    return redirect('/company/news');
});
