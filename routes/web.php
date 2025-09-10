<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcomeEquidad');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/assets/iconos/{filename}', function ($filename) {
        $path = storage_path('app/public/assets/iconos/' . $filename);
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        return response($file)->header('Content-Type', $type);
    })->name('image.preview');


    require __DIR__ . '/usuarios.php';
    require __DIR__ . '/categorias.php';
    require __DIR__ . '/publicaciones.php';
    require __DIR__ . '/biblioteca.php';
    require __DIR__ . '/roles.php';
    require __DIR__ . '/permisos.php';
});
