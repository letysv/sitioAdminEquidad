<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InformesController;

Route::get('/informes', [InformesController::class, 'apiInformes']);
Route::get('/informe/{id}', [InformesController::class, 'apiInforme']);