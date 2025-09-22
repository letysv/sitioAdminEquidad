    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\InformesController;
    use App\Http\Controllers\InformesItemsController;

    Route::group(['prefix' => 'informes', 'middleware' => ['auth']], function () {
    Route::get('/', [InformesController::class, 'index'])
        ->middleware('can:informes')
        ->name('informes.index');

    Route::post('/itemcreate', [InformesItemsController::class, 'create'])
        ->name('informes.item.create');
        
    Route::get('/create', [InformesController::class, 'create'])
        ->middleware('can:informes.create')
        ->name('informes.create');
        
    Route::get('/edit/{id}', [InformesController::class, 'edit'])
        ->middleware('can:informes.edit')
        ->name('informes.edit');
        
    Route::post('{id}', [InformesController::class, 'update'])
        ->middleware('can:informes.update')
        ->name('informes.update');

    Route::post('/', [InformesController::class, 'store'])
        ->name('informes.store');

    Route::post('/{id}/cambiaractivo', [InformesController::class, 'cambiarActivo'])
        ->name('informes.cambiar-activo');

    Route::delete('/item/{id}', [InformesItemsController::class, 'destroy'])
        ->name('informes.item.destroy');
});