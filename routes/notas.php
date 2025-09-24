<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\NotasItemsController;

Route::group(['prefix' => 'notas', 'middleware' => ['auth']], function () {
    Route::get('/', [NotasController::class, 'index'])
        ->middleware('can:notas')
        ->name('notas.index');

    Route::post('/itemcreate', [NotasItemsController::class, 'create'])
        ->name('nota.item.create');

    Route::get('/create', [NotasController::class, 'create'])
        ->middleware('can:notas.create')
        ->name('notas.create');

    Route::get('/edit/{id}', [NotasController::class, 'edit'])
        ->middleware('can:notas.edit')
        ->name('notas.edit');

    Route::post('{id}', [NotasController::class, 'update'])
        ->middleware('can:notas.update')
        ->name('notas.update');

    Route::post('/', [NotasController::class, 'store'])
        ->name('notas.store');

    Route::post('/{id}/cambiaractivo', [NotasController::class, 'cambiarActivo'])
        ->name('notas.cambiar-activo');

    Route::delete('/item/{id}', [NotasItemsController::class, 'destroy'])
        ->name('item.destroy');
});
