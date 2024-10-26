<?php

use App\Http\Controllers\BujeLCController;
use App\Http\Controllers\BujeLLController;
use App\Http\Controllers\TipoHojaVehiculoController;
use App\Orchid\Screens\Production\ProductionOrdenDetailListScren;
use App\Orchid\Screens\Production\ProductionOrdenListScren;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;
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

// Rutas para obtener la descripción en la Hoja de Resortes
Route::get('/obtener-material-combinado-material/{id}', [CodigoHojaController::class, 'obtenerMaterialCombinadoMaterial']);
Route::get('/obtener-inches-material-grapa/{id}', [CodigoHojaController::class, 'obtenerInchesMaterialGrapa']);
Route::get('/obtener-nombre-corto-vehiculo/{id}', [CodigoHojaController::class, 'obtenerNombreCortoVehiculo']);

// web.php

// Ruta para la lista de órdenes de producción
Route::screen('/production-orders', ProductionOrdenListScren::class)
    ->name('platform.production.orders')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->push('Inicio', route('platform.main'))  // Enlace a la pantalla principal
        ->push('Órdenes de Producción', route('platform.production.orders')));  // Nombre de la lista

// Ruta para el detalle de una orden de producción específica
Route::screen('/production-orders/{id}', ProductionOrdenDetailListScren::class)
    ->name('platform.production.orders.detail')
    ->breadcrumbs(fn(Trail $trail, $id) => $trail
        ->parent('platform.production.orders')  // Volver a la lista de órdenes
        ->push('Detalle Órdenes de Producción', route('platform.production.orders.detail', $id)));  // Enlace a los detalles
