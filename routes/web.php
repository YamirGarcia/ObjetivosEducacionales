<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreraController;

//agreagmos los controladors de permisos y roles
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;


Route::get('/aravel', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('home');
});

// Route::get('/', function () {
//     return view('Objetivos.login');
// });
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/menu', function () {
    return view('Objetivos.menu');
})->name('menu');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/agregarUsuario/{id}', [App\Http\Controllers\CarreraController::class, 'agregar_usuario'])->name('agregarUser');
Route::delete('/eliminarAtributo/{id}', [App\Http\Controllers\CarreraController::class, 'eliminarAtributo'])->name('eliminarAtributo');
Route::delete('/eliminarObjetivo/{id}', [App\Http\Controllers\CarreraController::class, 'eliminarObjetivo'])->name('eliminarObjetivo');

Route::group(['middleware' => ['auth']], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('carreras', CarreraController::class);


    // Route::get('/carrera', [CarreraController::class, 'verCarreras'])->name('carrera');
    
    // Route::post('/carrera', [CarreraController::class, 'guardarCarrera'])->name('carrera');
    
    // Route::patch('/carrera/{id}', [CarreraController::class, 'editarCarrera'])->name('editarCarrera');
    
    // Route::delete('/carrera/{id}', [CarreraController::class, 'eliminarCarrera'])->name('eliminarCarrera');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
