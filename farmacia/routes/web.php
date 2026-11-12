<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicamentoController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return view('layouts.index');
    })->name('home');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::resource('catalogo', MedicamentoController::class)
        ->parameters(['catalogo' => 'medicamento'])
        ->names('catalogo');


    Route::get('/proveedores', function () {
        return view('layouts.proveedores');
    })->name('proveedores');

    Route::get('/empleados', function () {
        return view('layouts.empleados');
    })->name('empleados');
});