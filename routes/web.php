<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\web\FilmController;
use App\Http\Controllers\web\KategoriController;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->group(function () {

    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/login-proses', [AuthController::class, 'login_proses'])->name('login.proses');

    Route::get('forgot', [AuthController::class, 'forgot'])->name('forgot');
    Route::post('forgot-proses', [AuthController::class, 'forgot_proses'])->name('forgot-proses');
    Route::get('verify-code', [AuthController::class, 'verify_code'])->name('verify-code');
    Route::post('verify-code-proses', [AuthController::class, 'verify_code_proses'])->name('verify-code-proses');
    Route::get('reset-password', [AuthController::class, 'reset_password'])->name('reset-password');
    Route::post('reset-password-proses', [AuthController::class, 'reset_password_proses'])->name('reset-password-proses');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', function () {
        return view('welcome');
    });


    Route::resource('kategori', KategoriController::class);
    Route::resource('film', FilmController::class);
    Route::resource('user', UserController::class);
});
