<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LactanciaController;

Route::get('/lactancias', [LactanciaController::class, 'apiLactancias']);
Route::get('/lactancia/{id}', [LactanciaController::class, 'apiLactancia']);
