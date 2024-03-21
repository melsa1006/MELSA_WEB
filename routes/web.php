<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContenController;
use App\Http\Controllers\LoginController;

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

Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,  'login'])->name('login.proses')->middleware('guest');
Route::get('/logout', [LoginController:: class, 'logout'])->name('logout');
Route::get('/home', [ContenController:: class, 'index'])->name('home.index')->middleware('auth');
Route::resource('mapel', MapelController::class);

