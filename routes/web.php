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

Route::get('/index', function () {
    return view('index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('rezerwacje', [App\Http\Controllers\RezerwacjaController::class, 'index'])->name('rezerwacje');

Route::get('rezerwacje/create', [App\Http\Controllers\RezerwacjaController::class, 'create'])->name('rezerwacje/create');

Route::post('rezerwacje/store', [App\Http\Controllers\RezerwacjaController::class, 'store'])->name('rezerwacje/store');

Route::delete('rezerwacje/{item}', [App\Http\Controllers\RezerwacjaController::class, 'destroy'])->name('rezerwacje/delete');

Route::get('rezerwacje/accept/{item}', [App\Http\Controllers\RezerwacjaController::class, 'accept'])->name('rezerwacje/accept');

Route::get('rezerwacje/archiwum', [App\Http\Controllers\RezerwacjaController::class, 'archive'])->name('rezerwacje/archiwum');

Route::get('rezerwacje/edit/{item}', [App\Http\Controllers\RezerwacjaController::class, 'edit'])->name('rezerwacje/edit');

Route::put('rezerwacje/update/{item}', [App\Http\Controllers\RezerwacjaController::class, 'update'])->name('rezerwacje/update');

Route::get('posty', [App\Http\Controllers\PostsController::class, 'index'])->name('posty');

Route::post('posty/store',  [App\Http\Controllers\PostsController::class, 'store'])->name('posty/store');

Route::get('psoty/public/{item}', [App\Http\Controllers\PostsController::class, 'public'])->name('posty/public');

Route::delete('posty/{item}', [App\Http\Controllers\PostsController::class, 'destroy'])->name('posty/delete');