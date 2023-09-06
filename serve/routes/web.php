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
    Route::get('/contact/create', 'create')->middleware('auth')->name('contact-book.create');
    Route::post('/contact', 'store')->middleware('auth')->name('contact-book.store');
});
