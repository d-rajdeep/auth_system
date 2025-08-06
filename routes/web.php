<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



// Register
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register.page');
Route::post('/register', [UserController::class, 'register'])->name('register.store');

// Login
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.page');
Route::post('/login', [UserController::class, 'login'])->name('login.store');

// Logout
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Sample protected route
Route::get('/dashboard', function () {
    return 'Welcome, you are logged in!';
})->middleware('auth');


Route::get('/', function () {
    return view('welcome');
});
