<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EfemeridesController;

Route::get('/efemerides', [EfemeridesController::class, 'apiEfemerides']);
Route::get('/efemeride/{id}', [EfemeridesController::class, 'apiEfemeride']);