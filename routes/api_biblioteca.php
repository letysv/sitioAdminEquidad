<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BibliotecaController;

Route::get('/libros', [BibliotecaController::class, 'apiLibros']);
Route::get('/libro/{id}', [BibliotecaController::class, 'apiLibro']);