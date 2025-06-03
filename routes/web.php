<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicacionController;

Route::resource('publicaciones', PublicacionController::class);

Route::get('/', [PublicacionController::class, 'index']);