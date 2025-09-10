    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\UsuariosController;

    Route::group(['prefix' => 'usuarios', 'middleware' => ['auth']], function () {
    Route::get('/', [UsuariosController::class, 'index'])
        ->middleware('can:usuarios')
        ->name('usuarios.index');
        
    Route::get('/create', [UsuariosController::class, 'create'])
        ->middleware('can:usuarios.create')
        ->name('usuarios.create');
        
    Route::post('/', [UsuariosController::class, 'store'])
        ->name('usuarios.store');
        
    Route::get('/edit/{id}', [UsuariosController::class, 'edit'])
        ->middleware('can:usuarios.edit')
        ->name('usuarios.edit');
        
    Route::post('{id}', [UsuariosController::class, 'update'])
        ->middleware('can:usuarios.update')
        ->name('usuarios.update');
});