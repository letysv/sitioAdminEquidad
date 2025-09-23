    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\EquipoController;
    

    Route::group(['prefix' => 'equipo', 'middleware' => ['auth']], function () {
    Route::get('/', [EquipoController::class, 'index'])
        ->middleware('can:equipo')
        ->name('equipo.index');

    Route::get('/create', [EquipoController::class, 'create'])
        ->middleware('can:equipo.create')
        ->name('equipo.create');
        
    Route::get('/edit/{id}', [EquipoController::class, 'edit'])
        ->middleware('can:equipo.edit')
        ->name('equipo.edit');
        
    Route::post('{id}', [EquipoController::class, 'update'])
        ->middleware('can:equipo.update')
        ->name('equipo.update');

    Route::post('/', [EquipoController::class, 'store'])
        ->name('equipo.store');
    
});