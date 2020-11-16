<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('rezerwacje', [App\Http\Controllers\RezerwacjaController::class, 'index'])->name('rezerwacje');

Route::get('rezerwacje/create', [App\Http\Controllers\RezerwacjaController::class, 'create'])->name('rezerwacje/create');

Route::post('rezerwacje/store', [App\Http\Controllers\RezerwacjaController::class, 'store'])->name('rezerwacje/store');

Route::delete('rezerwacje/{item}', [App\Http\Controllers\RezerwacjaController::class, 'destroy'])->name('rezerwacje/delete');

Route::get('rezerwacje/accept/{item}', [App\Http\Controllers\RezerwacjaController::class, 'accept'])->name('rezerwacje/accept');

Route::get('rezerwacje/archiwum', [App\Http\Controllers\RezerwacjaController::class, 'archive'])->name('rezerwacje/archiwum');