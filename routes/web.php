<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreraController;


Route::get('/aravel', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('home');
});

Route::get('/', function () {
    return view('Objetivos.login');
});

Route::get('/menu', function () {
    return view('Objetivos.menu');
})->name('menu');

Route::get('/carrera', [CarreraController::class, 'verCarreras'])->name('carrera');

Route::post('/carrera', [CarreraController::class, 'guardarCarrera'])->name('carrera');

Route::delete('/carrera/{id}', [CarreraController::class, 'eliminarCarrera'])->name('eliminarCarrera');