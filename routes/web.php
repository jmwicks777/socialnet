<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'createUser'])->name('register.submit');
Route::get('/login', [UserController::class, 'login'])->name('login.form');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login.submit');
