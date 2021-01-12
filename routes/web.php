<?php

use Illuminate\Support\Facades\Route;
use App\Mail\WelcomeMail;

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
})->name('welcome');
Auth::routes();

Route::get('/index', function () {
    return view('index');
});

Route::get('/email', function () {
    Mail::to('emial@email.com')->send(new WelcomeMail());

    return new WelcomeMail();
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

Route::get('posty/public/{item}', [App\Http\Controllers\PostsController::class, 'public'])->name('posty/public');

Route::delete('posty/{item}', [App\Http\Controllers\PostsController::class, 'destroy'])->name('posty/delete');

Route::get('prace', [App\Http\Controllers\ShowController::class, 'works'])->name('prace');

Route::post('mail/store', [App\Http\Controllers\ShowController::class, 'store'])->name('mail/store');

Route::get('mail/index', [App\Http\Controllers\MailController::class, 'index'])->name('mail/index');