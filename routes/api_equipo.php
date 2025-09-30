<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;

Route::get('/equipos', [EquipoController::class, 'apiEquipos']);
Route::get('/equipo/{id}', [EquipoController::class, 'apiEquipo']);