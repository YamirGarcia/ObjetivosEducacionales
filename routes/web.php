<?php

use Illuminate\Support\Facades\Route;


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