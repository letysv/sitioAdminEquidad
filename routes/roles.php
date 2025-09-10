    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\RolesController;

    Route::group(['prefix' => 'roles', 'middleware' => ['auth']], function () {
        Route::get('/', [RolesController::class, 'index'])
            ->middleware('can:roles')
            ->name('roles.index');

        Route::get('/create', [RolesController::class, 'create'])
            ->middleware('can:roles.create')
            ->name('roles.create');

        Route::post('/', [RolesController::class, 'store'])
            ->name('roles.store');

        Route::get('/edit/{id}', [RolesController::class, 'edit'])
            ->middleware('can:roles.edit')
            ->name('roles.edit');

        Route::post('{id}', [RolesController::class, 'update'])
            ->middleware('can:roles.update')
            ->name('roles.update');
    });
