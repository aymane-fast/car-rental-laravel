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
Route::get('/dashboard',[UserController::class , 'dashboard'])->name('dashboard');
Route::get('/logout',[UserController::class , 'logout'])->name('users.logout');
Route::get('/reset-password',[UserController::class , 'resetPasswordForm'])->name('users.resetPassForm');
Route::put('/reset-password',[UserController::class , 'resetPassword'])->name('users.resetPass');