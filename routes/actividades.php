    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ActividadesRealizadasController;
    use App\Http\Controllers\ActividadesRealizadasItemsController;

    Route::group(['prefix' => 'actividades', 'middleware' => ['auth']], function () {
    Route::get('/', [ActividadesRealizadasController::class, 'index'])
        ->middleware('can:actividades')
        ->name('actividades.index');

    Route::post('/itemcreate', [ActividadesRealizadasItemsController::class, 'create'])
        ->name('actividades.item.create');
        
    Route::get('/create', [ActividadesRealizadasController::class, 'create'])
        ->middleware('can:actividades.create')
        ->name('actividades.create');
        
    Route::get('/edit/{id}', [ActividadesRealizadasController::class, 'edit'])
        ->middleware('can:actividades.edit')
        ->name('actividades.edit');
        
    Route::post('{id}', [ActividadesRealizadasController::class, 'update'])
        ->middleware('can:actividades.update')
        ->name('actividades.update');

    Route::post('/', [ActividadesRealizadasController::class, 'store'])
        ->name('actividades.store');

    Route::post('/{id}/cambiaractivo', [ActividadesRealizadasController::class, 'cambiarActivo'])
        ->name('actividades.cambiar-activo');

    Route::delete('/item/{id}', [ActividadesRealizadasItemsController::class, 'destroy'])
        ->name('actividades.item.destroy');
});