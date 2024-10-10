<?php

use App\Http\Controllers\TipoHojaVehiculoController;
use Illuminate\Support\Facades\Auth;  // Importar la facade de Auth
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BujeLCController;
use App\Http\Controllers\BujeLLController;

Route::get('/', function () {
    // Redirigir solo si el usuario no está autenticado
    return Auth::check() ? redirect('/admin/main') : redirect('/admin');
});

Route::get('/obtener-csrf-token', function () {
    return response()->json([
        'csrfToken' => csrf_token(),
    ]);
});

Route::get('/obtener-imagen-tipo-hoja/{id}', [TipoHojaVehiculoController::class, 'obtenerImagenTipoHoja']);
Route::get('/obtener-imagen-buje-lc/{id}', [BujeLCController::class, 'obtenerImagenBujeLC']);
Route::get('/obtener-imagen-buje-ll/{id}', [BujeLLController::class, 'obtenerImagenBujeLL']);