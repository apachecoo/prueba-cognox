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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

 

Route::get('/', function () {
    return view('auth.loginCognox');
});

Route::get('/login', function () {
    return view('auth.loginCognox');
})->name('login');

 Route::post('/login-cognox', [App\Http\Controllers\Auth\LoginCognoxController::class, 'login'])->name('login.cognox');
 Route::post('/logout-cognox', [App\Http\Controllers\Auth\LoginCognoxController::class, 'logout'])->name('logout.cognox');
 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');