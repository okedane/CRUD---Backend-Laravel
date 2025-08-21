<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\web\FilmController;
use App\Http\Controllers\web\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('kategori',KategoriController::class);
Route::resource('film', FilmController::class);
Route::resource('user', UserController::class);