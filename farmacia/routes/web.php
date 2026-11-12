<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.index');
});

Route::get('/catalogo', function () {
    return view('layouts.catalogo');
});

Route::get('/empleados', function () {
    return view('layouts.empleados');
});

Route::get('/login', function () {
    return view('layouts.login');
});

Route::get('/proveedores', function () {
    return view('layouts.proveedores');
});

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
});






