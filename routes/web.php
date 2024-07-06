<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

if (auth()->check()) {
    Route::get('/dashboard', function () {
        // Only authenticated users can access this route
        dump(auth()->user());
        return view('dashboard');
    });
}
Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[UserController::class , 'register'])->name('users.register');
Route::post('/register',[UserController::class , 'store'])->name('users.store');
Route::get('/login',[UserController::class , 'login'])->name('users.login');
Route::post('/login',[UserController::class , 'authenticate'])->name('users.authenticate');
