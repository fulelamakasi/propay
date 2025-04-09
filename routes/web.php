<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

Route::get('/home',[HomeController::class,'home'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/register',[LoginController::class,'register'])->name('register');

Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
