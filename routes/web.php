<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/loginSave',[AuthController::class,'loginSave'])->name('login.save');
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/registerSave',[AuthController::class,'registerSave'])->name('register.save');

Route::middleware(['IsValidUser', 'prevent-back-history'])->group(function () {
    Route::get('/',[UserController::class,'dashboard'])->name('dashboard');
    Route::get('/logout',[UserController::class,'logout'])->name('logout');
});
