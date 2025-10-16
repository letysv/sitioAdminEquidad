    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\LactanciaController;
    use App\Http\Controllers\LactanciaItemsController;

    Route::group(['prefix' => 'lactancia', 'middleware' => ['auth']], function () {
    Route::get('/', [LactanciaController::class, 'index'])
        ->middleware('can:lactancia')
        ->name('lactancia.index');

    Route::post('/itemcreate', [LactanciaItemsController::class, 'create'])
        ->name('lactancia.item.create');
        
    // Route::get('/create', [LactanciaController::class, 'create'])
    //     ->middleware('can:lactancia.create')
    //     ->name('lactancia.create');
        
    Route::get('/edit/{id}', [LactanciaController::class, 'edit'])
        ->middleware('can:lactancia.edit')
        ->name('lactancia.edit');
        
    Route::post('{id}', [LactanciaController::class, 'update'])
        ->middleware('can:lactancia.update')
        ->name('lactancia.update');

    Route::post('/', [LactanciaController::class, 'store'])
        ->name('lactancia.store');
    
    Route::delete('/item/{id}', [LactanciaItemsController::class, 'destroy'])
        ->name('lactancia.item.destroy');
});