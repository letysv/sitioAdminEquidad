<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActividadesRealizadasController;

Route::get('/actividades', [ActividadesRealizadasController::class, 'apiActividades']);
Route::get('/actividad/{id}', [ActividadesRealizadasController::class, 'apiActividad']);
