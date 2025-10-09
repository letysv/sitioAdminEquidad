<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BibliotecaController;

Route::get('/biblioteca', [BibliotecaController::class, 'apiBibliotecas']);
Route::get('/bibliotecas/{id}', [BibliotecaController::class, 'apiBiblioteca']);