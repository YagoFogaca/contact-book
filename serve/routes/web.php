<?php

use App\Http\Controllers\UserController;
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
    Route::get('/teste', 'teste')->middleware('auth')->name('user.teste');
    Route::get('/user/create', 'create')->name('user.create');
    Route::post('/auth', 'auth')->name('user.auth');
    Route::post('/user', 'store')->name('user.store');
});
