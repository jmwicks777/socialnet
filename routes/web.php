<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('check.authenticated')->group(function (){
Route::get('/social-net', [UserController::class, 'index'])->name('social-net.index');});
Route::get('/social-net/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/social-net/register', [AuthController::class, 'createUser'])->name('register.submit');
Route::get('/social-net/login', [UserController::class, 'login'])->name('login.form');
Route::post('/social-net/login', [AuthController::class, 'loginUser'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::put('/profile/update', [UserController::class, 'updateBioUser'])->name('profile.update');
