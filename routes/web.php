<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
Route::resource('/ruches', \App\Http\Controllers\RucheController::class);

//------------------Route correspondant à PdfController -------------------------------//
Route::get('/pdf', [PdfController::class,'index']);

//------------------Route correspondant à RecolteController----------------------------//
Route::resource('/recoltes', \App\Http\Controllers\RecolteController::class);

