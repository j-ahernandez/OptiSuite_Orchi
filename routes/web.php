<?php

use App\Http\Controllers\BujeLCController;
use App\Http\Controllers\BujeLLController;
use App\Http\Controllers\TipoHojaVehiculoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CodigoHojaController;

Route::get('/', function () {
    // Redirigir solo si el usuario no está autenticado
    return Auth::check() ? redirect('/admin/main') : redirect('/admin');
});

// Ruta para obtener el token CSRF
Route::get('/obtener-csrf-token', function () {
    return response()->json([
        'csrfToken' => csrf_token(),
    ]);
});

// Rutas para obtener imágenes
Route::get('/obtener-imagen-tipo-hoja/{id}', [TipoHojaVehiculoController::class, 'obtenerImagenTipoHoja']);
Route::get('/obtener-imagen-buje-lc/{id}', [BujeLCController::class, 'obtenerImagenBujeLC']);
Route::get('/obtener-imagen-buje-ll/{id}', [BujeLLController::class, 'obtenerImagenBujeLL']);

// Ruta para formar el codigo en Hoja de Resortes
Route::get('/obtener-codigo-tipo-vehiculo/{id}', [CodigoHojaController::class, 'obtenerCodigoTipoVehiculo']);
