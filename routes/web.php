<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserInterestController;
use App\Http\Middleware\EnsureAuthIsValid;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/home',[LoginController::class,'home'])->name('home');
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/register',[LoginController::class,'register'])->name('register');

Route::middleware([EnsureAuthIsValid::class])->group(function () {
    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
    Route::get('/interests',[InterestController::class,'index']);
    Route::get('/interests/create',[InterestController::class,'create']); 
    Route::post('/interests',[InterestController::class,'store']); 
    Route::get('/interests/{id}',[InterestController::class,'show']);
    Route::get('/interests/{id}/edit',[InterestController::class,'edit']);
    Route::put('/interests/{id}',[InterestController::class,'update']);
    Route::delete('/interests/{id}',[InterestController::class,'destroy'])->name('interests.destroy');

    Route::get('/languages',[LanguageController::class,'index']);
    Route::get('/languages/create',[LanguageController::class,'create']); 
    Route::post('/languages',[LanguageController::class,'store']); 
    Route::get('/languages/{id}',[LanguageController::class,'show']);
    Route::get('/languages/{id}/edit',[LanguageController::class,'edit']);
    Route::put('/languages/{id}',[LanguageController::class,'update']);
    Route::delete('/languages/{id}',[LanguageController::class,'destroy'])->name('languages.destroy');

    Route::get('/user_interest',[UserInterestController::class,'index']);
    Route::get('/user_interest/create',[UserInterestController::class,'create']); 
    Route::post('/user_interest',[UserInterestController::class,'store']); 
    Route::get('/user_interest/{id}',[UserInterestController::class,'show']);
    Route::get('/user_interest/{id}/edit',[UserInterestController::class,'edit']);
    Route::put('/user_interest/{id}',[UserInterestController::class,'update']);
    Route::delete('/user_interest/{id}',[UserInterestController::class,'destroy'])->name('user_interest.destroy');
    Route::get('/user_interest/{user_id}/byUser',[UserInterestController::class,'showAllUserInterestsByUser']);

    Route::get('/users',[UserController::class,'index']);
    Route::get('/users/create',[UserController::class,'create']); 
    Route::post('/users',[UserController::class,'store']); 
    Route::get('/users/{id}',[UserController::class,'show']);
    Route::get('/users/{id}/edit',[UserController::class,'edit']);
    Route::put('/users/{id}',[UserController::class,'update']);
    Route::delete('/users/{id}',[UserController::class,'destroy'])->name('users.destroy');
});

