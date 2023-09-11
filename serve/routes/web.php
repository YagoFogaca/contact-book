<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactBookController;
use Illuminate\Support\Facades\Route;

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

Route::controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('user.index');
    Route::get('/user/create', 'create')->name('user.create');
    Route::get('/logout', 'logout')->middleware('auth')->name('user.logout');
    Route::post('/auth', 'auth')->name('user.auth');
    Route::post('/user', 'store')->name('user.store');
});

Route::controller(ContactBookController::class)->group(function () {
    Route::get('/home', 'index')->middleware('auth')->name('contact-book.index');
    // Tirar -book
    Route::get('/contact/create', 'create')->middleware('auth')->name('contact-book.create');
    // Tirar -book
    Route::get('/contact/{contact}/edit', 'edit')->middleware('auth')->name('contact.edit');
    Route::patch('/contact/{id}', 'update')->middleware('auth')->name('contact.update');
    // Tirar -book
    Route::post('/contact', 'store')->middleware('auth')->name('contact-book.store');
    // Tirar -book
    Route::delete('/contact/{id}', 'destroy')->middleware('auth')->name('contact-book.destroy');
});
