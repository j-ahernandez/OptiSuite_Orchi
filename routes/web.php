<?php

use Illuminate\Support\Facades\Auth;  // Importar la facade de Auth
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Redirigir solo si el usuario no está autenticado
    return Auth::check() ? redirect('/admin/main') : redirect('/admin');
});
