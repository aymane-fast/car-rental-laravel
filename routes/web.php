<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[UserController::class , 'register'])->name('users.register');
Route::post('/register',[UserController::class , 'store'])->name('users.store');
Route::get('/login',[UserController::class , 'login'])->name('users.login');
Route::post('/login',[UserController::class , 'authenticate'])->name('users.authenticate');
Route::get('/dashboard', function () {
    return view('users.dashboard');
})->name('dashboard');
