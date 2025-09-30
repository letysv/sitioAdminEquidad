<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicacionesController;

Route::get('/publicaciones', [PublicacionesController::class, 'apiPublicaciones']);
Route::get('/publicacion/{id}', [PublicacionesController::class, 'apiPublicacion']);