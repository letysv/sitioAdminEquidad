    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\BibliotecaController;
    use App\Http\Controllers\BibliotecaItemsController;

    Route::group(['prefix' => 'biblioteca', 'middleware' => ['auth']], function () {
    Route::get('/', [BibliotecaController::class, 'index'])
        ->middleware('can:biblioteca')
        ->name('biblioteca.index');

    Route::post('/itemcreate', [BibliotecaItemsController::class, 'create'])
        ->name('biblioteca.item.create');
        
    Route::get('/create', [BibliotecaController::class, 'create'])
        ->middleware('can:biblioteca.create')
        ->name('biblioteca.create');
        
    Route::get('/edit/{id}', [BibliotecaController::class, 'edit'])
        ->middleware('can:biblioteca.edit')
        ->name('biblioteca.edit');
        
    Route::post('{id}', [BibliotecaController::class, 'update'])
        ->middleware('can:biblioteca.update')
        ->name('biblioteca.update');

    Route::post('/', [BibliotecaController::class, 'store'])
        ->name('biblioteca.store');

    Route::post('/{id}/cambiaractivo', [BibliotecaController::class, 'cambiarActivo'])
        ->name('biblioteca.cambiar-activo');

    Route::delete('/item/{id}', [BibliotecaItemsController::class, 'destroy'])
        ->name('biblioteca.item.destroy');
});