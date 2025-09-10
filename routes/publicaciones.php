    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\PublicacionesController;
    use App\Http\Controllers\PublicacionesItemsController;

    Route::group(['prefix' => 'publicaciones', 'middleware' => ['auth']], function () {
    Route::get('/', [PublicacionesController::class, 'index'])
        ->middleware('can:publicaciones')
        ->name('publicaciones.index');

    Route::post('/itemcreate', [PublicacionesItemsController::class, 'create'])
        ->name('publicaciones.item.create');
        
    Route::get('/create', [PublicacionesController::class, 'create'])
        ->middleware('can:publicaciones.create')
        ->name('publicaciones.create');
        
    Route::get('/edit/{id}', [PublicacionesController::class, 'edit'])
        ->middleware('can:publicaciones.edit')
        ->name('publicaciones.edit');
        
    Route::post('{id}', [PublicacionesController::class, 'update'])
        ->middleware('can:publicaciones.update')
        ->name('publicaciones.update');

    Route::post('/', [PublicacionesController::class, 'store'])
        ->name('publicaciones.store');

    Route::post('/{id}/cambiaractivo', [PublicacionesController::class, 'cambiarActivo'])
        ->name('publicaciones.cambiar-activo');

    Route::delete('/item/{id}', [PublicacionesItemsController::class, 'destroy'])
        ->name('publicaciones.item.destroy');
});