<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

require __DIR__ . '/api_equipo.php';
require __DIR__ . '/api_notas.php';
require __DIR__ . '/api_publicaciones.php';
require __DIR__ . '/api_categorias.php';
require __DIR__ . '/api_biblioteca.php';
require __DIR__ . '/api_efemerides.php';
require __DIR__ . '/api_informes.php';
require __DIR__ . '/api_enlaces.php';
require __DIR__ . '/api_actividades.php';