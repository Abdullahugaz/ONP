<?php

use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutManager;
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
    return view('login');
})->name('login');


 Route::get('/login', [AutManager::class, 'login'])->name(name:'login');

 Route::post('/login', [AutManager::class, 'loginPost'])->name(name:'login.post');

 Route::get('/registration', [AutManager::class, 'registration'])->name(name:'registration');
 Route::post('/registration', [AutManager::class, 'registrationPost'])->name(name:'registration.post');


Route::get('/home', [AutManager::class, 'home'])->middleware('auth')->name('home');


 Route::get('/logout', [AutManager::class, 'logout'])->name('logout');
