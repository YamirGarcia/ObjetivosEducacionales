<?php

use Illuminate\Support\Facades\Route;
use App\Models\Carrera;

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

Route::get('/carrera', function () {
    return view('Objetivos.carrera');
})->name('carrera');

Route::get('/insertar', function () {
    $carrera = new Carrera;
    $carrera->carrera = "Sistemas";
    $carrera->planEstudios = "ASDF-2022";
    $carrera->save();
});