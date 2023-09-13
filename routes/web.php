<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PdfController;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//-------------------------------Routes du User---------------------------------------//
Route::resource('/users', \App\Http\Controllers\UserController::class)->except('show');
Route::put('/user/updatepassword/{user}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatepassword');

//----------------Route correspondant à AdresseController------------------------------//
Route::resource('/adresses', \App\Http\Controllers\AdresseController::class);

//------------------Route correspondant à RucherController-----------------------------//
Route::resource('/ruchers', \App\Http\Controllers\RucherController::class);

//------------------Route correspondant à RucheController------------------------------//
Route::resource('/ruche', \App\Http\Controllers\RucheController::class);

//------------------Route correspondant à VisiteController-----------------------------//
Route::resource('/visites', \App\Http\Controllers\VisiteController::class);

//------------------Route correspondant à PdfController -------------------------------//
Route::get('/pdf',  [PdfController::class,'index'])->name('pdf');

//------------------Route correspondant à RecolteController----------------------------//
Route::resource('/recoltes', \App\Http\Controllers\RecolteController::class);

//-----------------Route correspondant à l'administrateur------------------------------//
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('admin');

//------------------Route de la page de politique de confidentialité-------------------//
Route::get('/politique', [App\Http\Controllers\HomeController::class, 'politique'])->name('politique');     