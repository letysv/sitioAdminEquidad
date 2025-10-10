<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnlacesController;

Route::get('/enlaces', [EnlacesController::class, 'apiEnlaces']);
Route::get('/enlace/{id}', [EnlacesController::class, 'apiEnlace']);