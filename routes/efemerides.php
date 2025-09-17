    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\EfemeridesController;
    use App\Http\Controllers\EfemeridesItemsController;

    Route::group(['prefix' => 'efemerides', 'middleware' => ['auth']], function () {
    Route::get('/', [EfemeridesController::class, 'index'])
        ->middleware('can:efemerides')
        ->name('efemerides.index');

    Route::post('/itemcreate', [EfemeridesItemsController::class, 'create'])
        ->name('efemerides.item.create');
        
    Route::get('/create', [EfemeridesController::class, 'create'])
        ->middleware('can:efemerides.create')
        ->name('efemerides.create');
        
    Route::get('/edit/{id}', [EfemeridesController::class, 'edit'])
        ->middleware('can:efemerides.edit')
        ->name('efemerides.edit');
        
    Route::post('{id}', [EfemeridesController::class, 'update'])
        ->middleware('can:efemerides.update')
        ->name('efemerides.update');

    Route::post('/', [EfemeridesController::class, 'store'])
        ->name('efemerides.store');

    Route::delete('/item/{id}', [EfemeridesItemsController::class, 'destroy'])
        ->name('efemerides.item.destroy');
});