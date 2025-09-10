    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\PermisosController;

    Route::group(['prefix' => 'permisos', 'middleware' => ['auth']], function () {
        Route::get('/', [PermisosController::class, 'index'])
            ->middleware('can:permisos')
            ->name('permisos.index');

        Route::get('/create', [PermisosController::class, 'create'])
            ->middleware('can:permisos.create')
            ->name('permisos.create');

        Route::post('/', [PermisosController::class, 'store'])
            ->name('permisos.store');

        Route::get('/edit/{id}', [PermisosController::class, 'edit'])
            ->middleware('can:permisos.edit')
            ->name('permisos.edit');

        Route::post('{id}', [PermisosController::class, 'update'])
            ->middleware('can:permisos.update')
            ->name('permisos.update');
    });
