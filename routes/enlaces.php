    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\EnlacesController;
    

    Route::group(['prefix' => 'enlaces', 'middleware' => ['auth']], function () {
    Route::get('/', [EnlacesController::class, 'index'])
        ->middleware('can:enlaces')
        ->name('enlaces.index');

    Route::get('/create', [EnlacesController::class, 'create'])
        ->middleware('can:enlaces.create')
        ->name('enlaces.create');
        
    Route::get('/edit/{id}', [EnlacesController::class, 'edit'])
        ->middleware('can:enlaces.edit')
        ->name('enlaces.edit');
        
    Route::post('{id}', [EnlacesController::class, 'update'])
        ->middleware('can:enlaces.update')
        ->name('enlaces.update');

    Route::post('/', [EnlacesController::class, 'store'])
        ->name('enlaces.store');
    
});