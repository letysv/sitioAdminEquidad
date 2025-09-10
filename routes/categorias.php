    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\CategoriasController;
    

    Route::group(['prefix' => 'categorias', 'middleware' => ['auth']], function () {
    Route::get('/', [CategoriasController::class, 'index'])
        ->middleware('can:categorias')
        ->name('categorias.index');

    Route::get('/create', [CategoriasController::class, 'create'])
        ->middleware('can:categorias.create')
        ->name('categorias.create');
        
    Route::get('/edit/{id}', [CategoriasController::class, 'edit'])
        ->middleware('can:categorias.edit')
        ->name('categorias.edit');
        
    Route::post('{id}', [CategoriasController::class, 'update'])
        ->middleware('can:categorias.update')
        ->name('categorias.update');

    Route::post('/', [CategoriasController::class, 'store'])
        ->name('categorias.store');
    
});