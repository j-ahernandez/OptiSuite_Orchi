<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    // return redirect()->route('platform.login');
    // return redirect('/admin/login');
});