<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\UsuarioController;

Route::get('/', [PublicacionController::class, 'index'])->name('home');

Route::resource('publicaciones', PublicacionController::class);

Route::resource('usuarios', UsuarioController::class);
