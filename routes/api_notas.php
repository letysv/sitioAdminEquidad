<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotasController;

Route::get('/notas', [NotasController::class, 'apiNotas']);
Route::get('/nota/{id}', [NotasController::class, 'apiNota']);
